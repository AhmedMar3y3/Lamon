<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> ["required","string","max:255"],
            "IP_address"=> ["required","string","max:15"],
            "model"=> ["required","string", "max:30"],
        ];
    }
}
