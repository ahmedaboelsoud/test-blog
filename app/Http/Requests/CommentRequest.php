<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $comment = $this->route()->parameter('comment');

            $rules = [
                'comment' => 'required|unique:categories,name,' . $comment->id
            ];


        }//end of if

        return $rules;
    }
}


// 'email' => 'required|email|unique:users,id,' . auth()->user()->id,
