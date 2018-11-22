<?php namespace App\Http\Requests\Admin\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMessage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.message.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
            'content' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'admin_id' => ['nullable', 'integer'],
            'create_at' => ['nullable', 'string'],
            
        ];
    }
}
