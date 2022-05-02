<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            'type' => 'required|integer',
            'content' => 'nullable|string'
        ];
    }

    /**
     * Prepare inputs for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->toBoolean($this->active),
            'type' => $this->toInteger($this->type),
        ]);
    }

    /**
     * Convert to boolean
     *
     * @param $value
     * @return boolean
     */
    private function toBoolean($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }

        /**
     * Convert to integer
     *
     * @param $value
     * @return boolean
     */
    private function toInteger($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
    }
}
