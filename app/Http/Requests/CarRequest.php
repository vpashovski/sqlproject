<?php

namespace App\Http\Requests;

class CarRequest extends Request
{
    protected $modelName = 'car';

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
            'brand'     => 'required|max:255',
            'model'     => 'required|max:255',
            'number'    => 'required|max:255',
//            'image_id'  => 'integer|exists:images,id',
        ];
    }
}
