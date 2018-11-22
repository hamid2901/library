<?php namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.book.edit', $this->book);
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
            'availability_id' => ['nullable', 'integer'],
            'image_dir' => ['nullable', 'string'],
            'isbn' => ['nullable', 'string'],
            'publisher_id' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            'issue_date' => ['nullable', 'string'],
            'cover' => ['nullable', 'integer'],
            'format_id' => ['nullable', 'integer'],
            'pages' => ['nullable', 'integer'],
            'weight' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            
        ];
    }
}
