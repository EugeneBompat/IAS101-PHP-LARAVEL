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
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/', // Only letters and spaces
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'string',
                'unique:users,email', // Prevent duplicate emails
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^()_+\-=\[\]{};:\'",.<>\/\\|`~])[A-Za-z\d@$!%*?&#^()_+\-=\[\]{};:\'",.<>\/\\|`~]/', // At least one lowercase, uppercase, number, and special character
            ],
            'password_confirmation' => [
                'required',
                'same:password',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name must not exceed 255 characters.',
            'name.regex' => 'Name can only contain letters and spaces.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 255 characters.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'password_confirmation.required' => 'Password confirmation is required.',
            'password_confirmation.same' => 'Password confirmation does not match.',
        ];
    }

    /**
     * Prepare the data for validation.
     * This sanitizes input to prevent XSS and SQL injection.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags(trim($this->name ?? '')),
            'email' => filter_var(trim($this->email ?? ''), FILTER_SANITIZE_EMAIL),
            'password' => $this->password, // Don't sanitize password, just validate
            'password_confirmation' => $this->password_confirmation,
        ]);
    }
}
