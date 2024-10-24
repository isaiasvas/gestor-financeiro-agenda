<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'start' => 'date_format:Y-m-d H:i:s|before:end|required',
            'end' => 'date_format:Y-m-d H:i:s|after:start|required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Preencha o campo Titulo!',
            'title.min' => 'Titulo necessita de pelo menos 03 caracteres!',
            'start.date_format' => 'Preencha uma Data com valor valido',
            'start.before' => 'A Data Inicial precisa ser menor que a Data Final',
            'end.date_format' => 'Preencha uma Data com valor valido',
            'end.after' => 'A Data Final precisa ser maior que a Data Inicial',
        ];
    }
}
