<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'max:9999999999999'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],
        [
            'required' => 'O campo :attribute é obrigatório',
            'name.max' => 'O nome tem o tamanho máximo de 255 caracteres',
            'phone.max' => 'O telefone só pode conter no máximo 14 dígitos',
            'phone.integer' => 'O telefone só pode conter números',
            'unique' => 'O email informado já está em uso',
            'email' => 'Email inválido',
            'mimes' => 'A foto deve possuir no máximo 1MB'
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
