<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return ['content_test' => 'required|min:2',];
    }

    public function messages()
    {
        return [
           'content_test.required' => '内容不能为空',
            'content_test.min' => '内容长度不能小于2'
        ];
    }
}
