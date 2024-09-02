<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // check is admin or no
        // road 1
        // return Auth::check() && Auth::user()->roles_name == 'Admin';
// road 2
        return auth()->user()->can('create', Book::class);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'author' => 'required|string|min:3|max:40',
            'category' => 'required|string|min:3|max:15',
            'available' => 'required|string|min:3|max:15',
            'description' => 'required|string',
            // the published_at is now create
            // 'published_at' => 'required|date',
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

