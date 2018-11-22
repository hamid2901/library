<?php namespace App\Http\Requests\Admin\Factor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateFactor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.factor.edit', $this->factor);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'borrow_status' => ['nullable', 'integer'],
            'quantity' => ['nullable', 'integer'],
            'borrow_date' => ['nullable', 'string'],
            'reserve_date' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            
        ];
    }
}
