<?php namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNews extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.news.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'title' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image_dir' => ['nullable', 'string'],
            'user_id' => ['required', 'integer'],
            'confirm' => ['required', 'integer'],
            
        ];
    }
}