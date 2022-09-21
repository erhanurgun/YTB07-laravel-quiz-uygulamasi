<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
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
        $extra = '';
        if (!request('has_finished')) {
            $extra = 'nullable|';
        }
        return [
            'title' => 'required|min:3|max:200',
            'description' => 'max:1000',
            'finished_at' => $extra . 'after:' . now(),
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Başlık',
            'description' => 'Açıklama',
            'finished_at' => 'Bitiş tarihi',
        ];
    }
}
