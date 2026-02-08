<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        // إذا تريد السماح لكل المستخدمين (أو ضع شرط auth)
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'job' => 'nullable|string|max:100',
            'for_program' => 'nullable|boolean',
            'password' => 'required|string|min:6',
            'dob' => 'nullable|date',
            'user_date' => 'nullable|date',
            'user_time' => 'nullable|date_format:Y-m-d H:i:s',
            'created_by' => 'nullable|exists:users,id',
        ];
    }
}
