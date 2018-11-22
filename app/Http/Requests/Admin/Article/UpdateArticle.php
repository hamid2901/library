<?php namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.article.edit', $this->article);
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
            'publish_date' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'article_filename' => ['nullable', 'string'],
            'confirm' => ['nullable', 'integer'],
            
        ];
    }
}