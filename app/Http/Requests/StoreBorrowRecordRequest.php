<?php

namespace App\Http\Requests;

use App\Models\BorrowRecord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBorrowRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create', BorrowRecord::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_id' => 'required|exists:books,id',
            // 'user_id' => 'required|exists:users,id',
            // 'borrowed_at' => 'required|date',
            // 'due_date' => 'required|date|after_or_equal:borrowed_at',
            // 'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
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

    protected function passedValidation() 
{ 

$this->merge([ 
'information borrow'=>$this->input('book_id').'_'.$this->input('user_id'), 
]);
    
}

public function attributes()
{
    return [
        'book_id' => 'رقم الكتاب',
        // 'user_id' => 'رقم المستخدم',
    ];
}
public function messages()
{
    return [
        'book_id.required' => 'يرجى إدخال :attribute.',
        // 'user_id.required' => 'يرجى ادخال :attribute.',
    ];
}
}

