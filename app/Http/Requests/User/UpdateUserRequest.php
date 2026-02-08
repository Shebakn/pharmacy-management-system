<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        // يمكن تعديل الشرط حسب نظام الصلاحيات
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'job' => 'nullable|string|max:100',
            'for_program' => 'nullable|boolean',
            'password' => 'nullable|string|min:6',
            'dob' => 'nullable|date',
            'user_date' => 'nullable|date',
            'user_time' => 'nullable|date_format:Y-m-d H:i:s',
            'created_by' => 'nullable|exists:users,id',
        ];
    }
}
