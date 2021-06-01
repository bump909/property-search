<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'location_search' => 'nullable|string|min:2|max:255',
            'near_beach' => 'sometimes|boolean',
            'accepts_pets' => 'required|boolean',
            'sleeps' => 'required|integer|min:1|max:20',
            'beds' => 'required|integer|min:1|max:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }
}
