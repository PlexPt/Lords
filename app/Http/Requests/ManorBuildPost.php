<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManorBuildPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $comment = Comment::find($this->route('comment')); // Get 'comment' route's params.
//        return $comment && $this->user()->can('update', $comment);

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userId' => 'require|numeric',
            'xAxis' => 'require|numeric',
            'yAxis' => 'require|numeric',
            'buildXAxis' => 'numeric',
            'buildYAxis' => 'numeric',
        ];
    }
}
