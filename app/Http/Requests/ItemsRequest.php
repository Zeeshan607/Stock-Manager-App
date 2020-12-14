<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'itemName'=>'required',
                    "itemAmount"=>'required',
                    'brand_id'=>'required',
                    'modal_id'=>'required',

                ];
                break;

            case 'PUT':
                return [
                    'itemName'=>'required|string|max:100',
                    "itemAmount"=>'required',
                    'brand_id'=>'required',
                    'modal_id'=>'required'
                ];
                break;
        }
    }
}
