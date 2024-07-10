<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class createProfileRequest extends FormRequest
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
            // 'first_name' => 'required',
            // 'last_name' => 'required' , 
            // 'gender' => 'required' , 
            // 'phone_number' => 'required' , 
            // 'date_of_birth' => 'required' , 
            // 'city' => 'required',
            // 'military_check' => 'required',
            // 'work_email' => 'required',
            // 'portfolio_link' => '',
            // 'facebook_link' => '',
            // 'github_link' => '',
            // 'linkedin_link' => '',
            // 'image' => ''
            ];
    }
}
