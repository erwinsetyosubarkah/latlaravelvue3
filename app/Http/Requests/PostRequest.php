<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
      $rules = [
        'title' => ['required'],
        'image' => ['required'],
        'content' => ['required']
      ];

      return $rules;
    }

    /**
   * Get custom messages for validator errors.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'title.required' => 'Judul diperlukan',
      'image.required' => 'Image diperlukan',
      'content.required' => 'Konten diperlukan'
    ];
  }

}
