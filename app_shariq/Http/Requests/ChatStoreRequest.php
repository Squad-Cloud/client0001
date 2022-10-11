<?php

namespace App\Http\Requests;

use Froiden\LaravelInstaller\Request\CoreRequest;
use Illuminate\Foundation\Http\FormRequest;

class ChatStoreRequest extends CoreRequest
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
        $rules = [
            'user_id' => 'required_if:user_type,employee',
            'admin_id' => 'required_if:user_type,admin',
        ];

        if($this->added_files == 0)
        {
            $rules ['message'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'user_id.required_if' => 'Select a user to send the message',
            'client_id.required_if' => 'Select a client to send the message',
        ];
    }

}
