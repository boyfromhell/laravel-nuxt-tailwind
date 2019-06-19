<?php

namespace App\Http\Requests;

use App\Models\Data;
use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->data
            ? $this->user()->can('update', $this->data)
            : $this->user()->can('store', Data::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->layout->rules();
    }
}
