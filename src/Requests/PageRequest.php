<?php

namespace ToiLaDev\Page\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->input('id', null);
        return [
            'name' => 'required',
            'slug' => 'required|unique:casts,slug' . (empty($id)?',NULL,id,deleted_at,NULL':",{$id},castable_id,deleted_at,NULL"),
            'title' => 'required|unique:pages,title' . (empty($id)?',NULL,id,deleted_at,NULL':",{$id},id,deleted_at,NULL"),
            'excerpt' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  __('This is a required field.'),
            'slug.required' =>  __('This is a required field.'),
            'slug.unique' =>  __('Slug already exists.'),
            'title.required' =>  __('This is a required field.'),
            'title.unique' =>  __('Title already exists.'),
            'excerpt.required' =>  __('This is a required field.'),
            'body.required' =>  __('This is a required field.'),
        ];
    }

}