<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'thing_id' => 'required|exists:things,id',
            'quantity' => 'required|numeric',
            'total' => 'numeric',
            'status' => 'in:menunggu_konfirmasi,dikonfirmasi', // Adjust the values based on your actual status options
        ];
        
    }
}
