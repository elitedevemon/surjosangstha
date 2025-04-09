<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
      'group_id' => 'required|exists:groups,id',
      'code' => 'required|integer|unique:customers,code',
      'name' => 'required|string',
      'address' => 'required|string',
      'phone' => 'required|string|unique:customers,phone',
      'status' => 'required|in:active,inactive',
    ];
  }
}
