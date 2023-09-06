<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'invoice_number' => 'required|string',
            'customer_id' => 'required|exists:customers,id', // Assuming foreign key constraint.
            'discount' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'status' => 'required|in:pending,cancelled,paid',
            'total_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
        ];
    }
}
