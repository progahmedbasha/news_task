<?php

namespace App\Http\Requests\News;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title'=> 'required|min:2|max:400',
            'content' => 'required|max:100000',
            'publish_date' => 'required',
            'user_id' => 'required',
        ];
    }
}
