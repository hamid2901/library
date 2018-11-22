<?php namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.user.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', Rule::unique('Users', 'email'), 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'image_name' => ['nullable', 'string'],
            'role_id' => ['required', 'integer'],
            'status_id' => ['required', 'integer'],
            'confirm' => ['required', 'integer'],
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
            'university' => ['nullable', 'string'],
            'birthdate' => ['nullable', 'string'],
            'sex' => ['required', 'integer'],
            'city' => ['nullable', 'string'],
            'street' => ['nullable', 'string'],
            'plate' => ['nullable', 'integer'],
            'alley' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'activated' => ['required', 'boolean'],
            'forbidden' => ['required', 'boolean'],
            'language' => ['required', 'string'],
            
        ];
    }
}
