<?php

namespace Modules\Foods\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoodsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'price'=>'required|numeric|min:0'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Nama Harus di Isi',
            'price.required'=>'Harga Harus di isi',
            'price.min'=>'Min Harga 0',
            'price.numeric'=>'Harga tidak boleh huruf'
        ];
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
}
