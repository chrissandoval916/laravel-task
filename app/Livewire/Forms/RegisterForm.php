<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required')]
    public $firstName = '';

    #[Validate('required')]
    public $lastName = '';

    #[Validate('required')]
    public $address = '';

    #[Validate('required')]
    public $city = '';

    #[Validate('required')]
    public $country = '';

    #[Validate('required')]
    public $birthDate = '';

    #[Validate('required')]
    public $isMarried = false;

    public $marriageDate = '';

    public $marriageCountry = '';

    public $isWidowed = false;

    public $isSeparated = false;
}
