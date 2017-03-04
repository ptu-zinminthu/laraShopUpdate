<?php

namespace App\Http\Requests;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UpdateProductRequest extends FormRequest
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
              'title' => 'required | max:255',
        ];
    }
}
