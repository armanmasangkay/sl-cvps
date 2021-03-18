<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function __construct()
    {
        $this->redirect=route('admin.create');
    }

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
       
        // $this->redirectRoute=route('admin.create');
    
        return [
            'first_name'            =>      'required',
            'last_name'             =>      'required',
            'username'              =>      'required|unique:users,username',
            'password'              =>      'required|min:4',
            'confirm_password'      =>      'required',
            'municipality'          =>      'required',
        ];
    }
}
