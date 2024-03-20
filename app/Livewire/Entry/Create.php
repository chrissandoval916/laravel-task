<?php

namespace App\Livewire\Entry;

use Carbon\Carbon;
use App\Models\Entry;
use Livewire\Component;
use App\Livewire\Forms\EntryForm;
use Illuminate\Validation\ValidationException;

class Create extends Component
{
    public EntryForm $form;

    public int $currentStep = 1;

    public bool $showMarriageSection = false;

    public array $stepsInfo = [
        1 => [
            'title' => 'User info',
            'description' => 'Personal Info and Location',
        ],
        2 => [
            'title' => 'Relationship status',
            'description' => 'Current or Previous Relationship Status',
        ]
    ];

    public function nextStep(): void
    {
        if ($this->currentStep < count($this->stepsInfo) && $this->validateStep()) {
            $this->currentStep++;
        }
    }

    public function prevStep(): void
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    /**
     * Handle an incoming registration form submit.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save()
    {
        try {
            $this->form->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $stepNumsExceptLast = array_slice(array_keys($this->stepsInfo), 0, -1);

            //Go through each step numbers to see if we have an error for that page (except last page)
            foreach($stepNumsExceptLast as $stepNum) {
                $stepErrorKeys = $this->form->getStepErrorKeys($stepNum);

                //If errors() databag has errors on this current page number, show that page to the user
                if (!empty(array_intersect($stepErrorKeys, array_keys($e->errors())))) {
                    $this->currentStep = $stepNum;
                }
            }

            //Proceed as normal by re-throwing the error
            throw $e;
        }

        $formData = $this->form->except('bMonth', 'bDay', 'bYear', 'mMonth', 'mDay', 'mYear');
        $birthDateData = $this->form->only('bMonth', 'bDay', 'bYear');
        $marriageDateData = $this->form->only('mMonth', 'mDay', 'mYear');
        $birthDate = Carbon::createFromDate($birthDateData['bYear'], $birthDateData['bMonth'], $birthDateData['bDay']);
        $marriageDate = $formData['isMarried']
            ? Carbon::createFromDate($marriageDateData['mYear'], $marriageDateData['mMonth'], $marriageDateData['mDay'])
            : null;

        //Check birthdate is not in the future. Should be caught already by step validation, but do it again just in case
        if ($birthDate->gt(Carbon::now())) {
            $this->currentStep = 1;
            throw ValidationException::withMessages(['form.bYear' => 'Birthday cannot occur in the future']);
        }

        if (!empty($marriageDate)) {
            $eighteenDate = $birthDate->addYears(18);

            //Check marriage date is not in the future
            if ($marriageDate->gt(Carbon::now())) {
                throw ValidationException::withMessages(['form.mYear' => 'Marriage cannot occur in the future']);
            }

            //Check if the user is married and younger than 18 (cant accept any marriage from minor)
            if ($eighteenDate->gt(Carbon::now())) {
                throw ValidationException::withMessages(['form.mYear' => 'You are not eligible to apply because you are under 18 and married.']);
            }

            //Check to see if the marriage occured before user was 18 years old
            if ($marriageDate->lt($eighteenDate)) {
                throw ValidationException::withMessages(['form.mYear' => 'You are not eligible to apply because your marriage occurred before your 18th birthday.']);
            }
        }

        $newEntry = Entry::create([
            'first_name' => $formData['firstName'],
            'last_name' => $formData['lastName'],
            'address' => $formData['address'],
            'city' => $formData['city'],
            'country' => $formData['country'],
            'birthdate' => $birthDate,
            'is_married' => $formData['isMarried'],
            'marriage_date' => $marriageDate,
            'marriage_country' => $formData['marriageCountry'],
            'is_widowed' => !$formData['isMarried'] ? $formData['isWidowed'] : null,
            'is_separated' => !$formData['isMarried'] ? $formData['isSeparated'] : null,
        ]);

        $this->form->reset();

        return $this->redirect("/entry/{$newEntry->id}");
    }

    private function validateStep()
    {
        return $this->form->validateStep($this->currentStep);
    }

}
