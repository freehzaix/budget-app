<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password2' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le champs nom est requis.',
            'prenom.required' => 'Le champs prenom est requis.',
            'email.required' => 'Le champs email est requis.',
            'email.email' => 'Le champs email est incorrect.',
            'email.unique' => 'L\'adresse mail existe déjà.',
            'password.required' => 'Le mot de passe est requis.',
            'password2.required' => 'La confirmation du mot de passe est requis.',
        ];
    }

}
