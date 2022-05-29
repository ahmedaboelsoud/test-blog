<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $post = $this->route()->parameter('post');

            $rules = [
                'post' => 'required|unique:posts,title,' . $post->id
            ];


        }//end of if

        return $rules;
    }
}


// 'email' => 'required|email|unique:users,id,' . auth()->user()->id,
