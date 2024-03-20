<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;

class EntryForm extends Form
{
    #[Validate]
    public $firstName = '';

    #[Validate]
    public $lastName = '';

    #[Validate]
    public $address = '';

    #[Validate]
    public $city = '';

    #[Validate]
    public $country = '';

    #[Validate]
    public $bMonth = '';

    #[Validate]
    public $bDay = '';

    #[Validate]
    public $bYear = '';

    #[Validate]
    public $isMarried = false;

    #[Validate]
    public $mMonth = '';

    #[Validate]
    public $mDay = '';

    #[Validate]
    public $mYear = '';

    #[Validate]
    public $marriageCountry = '';

    #[Validate]
    public $isWidowed = false;

    #[Validate]
    public $isSeparated = false;

    private array $stepRules = [
        1 => [
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'bMonth' => 'required',
            'bDay' => 'required',
            'bYear' => 'required',
        ],
        2 => [
            'isMarried' => 'required|boolean',
            'mMonth' => 'required_if:isMarried,true',
            'mDay' => 'required_if:isMarried,true',
            'mYear' => 'required_if:isMarried,true',
            'marriageCountry' => 'required_if:isMarried,true',
            'isWidowed' => 'required_if:isMarried,false|boolean',
            'isSeparated' => 'required_if:isMarried,false|boolean',
        ],
    ];

    public function rules()
    {
        $fullRuleSet = [];

        foreach($this->stepRules as $rules) {
            $fullRuleSet = array_merge($fullRuleSet, $rules);
        }

        return $fullRuleSet;
    }

    public function validationAttributes()
    {
        return [
            'bMonth' => 'birth month',
            'bDay' => 'birth day',
            'bYear' => 'birth year',
            'mMonth' => 'marriage month',
            'mDay' => 'marriage day',
            'mYear' => 'marriage year',
        ];
    }

    public function messages()
    {
        return [
            'isMarried.required' => 'Please select yes or no for current marriage status',
            'isWidowed.required' => 'Please select yes or no for current widow status',
            'isSeparated.required' => 'Please select yes or no for current separation status',
        ];
    }

    public function validateStep(int $stepNumber)
    {
        $ruleSet = $this->stepRules[$stepNumber];

        try {
            $this->validate($ruleSet, $this->messages(), $this->validationAttributes());

            if ($stepNumber === 1) {
                $birthDateData = $this->only('bMonth', 'bDay', 'bYear');
                $birthDate = Carbon::createFromDate($birthDateData['bYear'], $birthDateData['bMonth'], $birthDateData['bDay']);

                //Check birthdate is not in the future
                if ($birthDate->gt(Carbon::now())) {
                    throw ValidationException::withMessages(['form.bYear' => 'Birthday cannot occur in the future']);
                }
            }

            return true;
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        }
    }

    public function getStepErrorKeys(int $stepNumber)
    {
        $keys = array_keys($this->stepRules[$stepNumber]);

        //We need to append 'form.' to each keyname as thats what the wire:model values expect
        foreach($keys as $k => $value) {
            $keys[$k] = 'form.' . $value;
        }

        return $keys;
    }
}
