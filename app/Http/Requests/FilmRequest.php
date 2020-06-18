<?php

namespace App\Http\Requests;

class FilmRequest extends BaseRequest
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
            'id' => 'nullable',
            'name' => 'required',
            'description' => 'required',
            'release' => 'required',
            'date' => 'required',
            'rating' => 'required',
            'ticket' => 'required',
            'price' => 'required',
            'country' => 'required',
            'genre' => 'required',
            'photo' => 'required',
        ];
    }
}
