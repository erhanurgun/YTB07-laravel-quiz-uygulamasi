<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'image|nullable|max:1024|mimes:svg,png,jpg,jpeg,gif',
            'question' => 'required|min:3',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'correct_answer' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Soru fotoğrafı',
            'question' => 'Soru',
            'answer1' => '1. cevap',
            'answer2' => '2. cevap',
            'answer3' => '3. cevap',
            'answer4' => '4. cevap',
            'correct_answer' => 'Doğru cevap',
        ];
    }
}
