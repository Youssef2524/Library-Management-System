<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('book'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:55',
            'author' => 'sometimes|string|min:3|max:55',
            'category' => 'sometimes|string|min:3|max:15',
            'description' => 'sometimes|string|max:200',
                        // the published_at is now update
            // 'published_at' => 'sometimes|date',
        ];
    }
    protected function failedValidation(\Illuminate\contracts\Validation\Validator $validator) 
    { 
    throw new HttpResponseException(response()->json([ 
    'status'=>'error', 
    'message'=>'Please check the input', 
    'errors'=>$validator->errors(), 
    ])); 
    
    }
    public function attributes()
{
    return [
        'title' => 'اسم الكتاب',
        'author' => 'اسم المؤلف',
        'description' => 'الوصف',
        'category' => 'الفئة',
    ];
}
public function messages()
{
    return [
        'title.required' => 'يرجى إدخال :attribute.',
        'author.required' => 'يرجى ادخال :attribute.',
        'description.required' => 'يرجى ادخال :attribute.',
        'category.required' => 'يرجى ادخال :attribute.',
    ];
}
}
