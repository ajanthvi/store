<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseFormRequest extends FormRequest
{

    /**
     * success response method.
     *
     * @param $validator
     * @param string $message
     * @return void
     */
    public function sendResponseError($validator, $message = '')
    {
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $validator->errors()
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }

    /**
     * Remove html tags
     *
     * @param array $fields
     * @param null $allowedTags
     * @return void
     */
    public function sanitize($fields, $allowedTags = null)
    {
        $input = $this->all();
        foreach ($input as $key => $val){
            if(in_array($key, $fields)){
                $input[$key] = strip_tags(html_entity_decode(str_replace('&nbsp;', '', $val)), $allowedTags);
            }
        }
        $this->replace($input);
    }
}
