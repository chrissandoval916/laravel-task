<?php

namespace App\Http\Controllers;

use App\Livewire\Forms\RegisterForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Livewire\Component;

class RegisterController extends Component
{
    public RegisterForm $form;

    /**
     * Display the registration forum view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration form submit.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/
    }
}
