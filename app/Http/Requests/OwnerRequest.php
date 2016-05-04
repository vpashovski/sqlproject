<?php

namespace App\Http\Requests;

class OwnerRequest extends Request
{
    protected $modelName = 'owner';

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
            'firstname'     => 'required|max:255',
            'lastname'      => 'required|max:255',
            'email'         => 'required|max:255|email',
            'image_id'  => 'integer|exists:images,id',
        ];
    }
}
