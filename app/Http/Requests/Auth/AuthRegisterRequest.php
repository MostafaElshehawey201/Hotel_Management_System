<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRegisterRequest extends FormRequest
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
            "name" => "required|string|min:3|max:255",
            "email" => "required|email|unique:users,email",
            "phone" => "required|digits_between:10,15,unique:users,phone",
            "password" => "required|string|min:8|confirmed",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => __('validation.name.required'),
            "name.string" => __('validation.name.string'),
            "name.min" => __('validation.name.min'),
            "name.max" => __('validation.name.max'),
            "email.required" => __('validation.email.required'),
            "email.email" => __('validation.email.email'),
            "email.unique" => __('validation.email.unique'),
            "phone.required" => __('validation.phone.required'),
            "phone.digits_between" => __('validation.phone.digits_between'),
            "phone.unique" => __('validation.phone.unique'),
            "password.required" => __('validation.password.required'),
            "password.string" => __('validation.password.string'),
            "password.min" => __('validation.password.min'),
            "password.confirmed" => __('validation.password.confirmed'),
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = [];
        foreach ($validator->errors()->getMessages() as $key => $values) {
            $errors[$key] = [
                $values,
            ];
            break;
        }
        throw new HttpResponseException(
            response()->json([
                "success" => false,
                "data" => null,
                "errors" => $errors,
            ], 422)
        );
    }
}
