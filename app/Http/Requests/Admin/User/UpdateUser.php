<?php namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.user.edit', $this->user);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'email' => ['sometimes', 'email', Rule::unique('Users', 'email')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'image_name' => ['nullable', 'string'],
            'role_id' => ['sometimes', 'integer'],
            'status_id' => ['sometimes', 'integer'],
            'confirm' => ['sometimes', 'integer'],
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
            'university' => ['nullable', 'string'],
            'birthdate' => ['nullable', 'string'],
            'sex' => ['sometimes', 'integer'],
            'city' => ['nullable', 'string'],
            'street' => ['nullable', 'string'],
            'plate' => ['nullable', 'integer'],
            'alley' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'activated' => ['sometimes', 'boolean'],
            'forbidden' => ['sometimes', 'boolean'],
            'language' => ['sometimes', 'string'],
            
        ];
    }
}
