<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Team\Team;
use App\Models\Team\TeamTranslation;

class TeamRequest extends FormRequest
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
            // 'name'=>'required',
            // 'position'=>'required|min:10|max:255',
            // 'qoute'=>'required|min:10|max:255',
            // 'locale'=>'required',

            'photo' => 'required',
            'facebook'=> 'required|string',
            'twitter'=> 'required|string',
            'instagram'=> 'required|string',
            'linkedin'=> 'required|string',
            // 'is_active' => 'required|in:0,1'
        ];
    }
    public function messages()
    {
        return [

            'required'=>'this field is required',
            // 'in'=>'this field must be 0 (is not active) or 1 (is active)',

            'name.min' => 'Your Team\'s name  Is Too Short',

            'position.min' => 'Your team position\'s Is Too Short',
            'position.max' => 'Your team position\'s Is Too Short',

            'qoute.min' => 'Your team qoute\'s Is Too Long',
            'qoute.max' => 'Your team qoute\'s Is Too Long',

        ];
    }
}
