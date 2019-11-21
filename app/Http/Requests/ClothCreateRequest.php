<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class RoomCreateRequest extends BaseFormRequest
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
            'name' => 'required|max:255',
            'product_code' => 'required',
            'cost' => 'required',
            'selling_price' => 'required',
            'brand_id' => 'required|int'
        ];
    }

    protected function prepareForValidation()
    {
        $this->sanitize(['name', 'product_code']);
    }
}
