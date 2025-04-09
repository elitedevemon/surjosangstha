<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
      'branch_id' => 'required|exists:branches,id',
      'employee_id' => 'required|exists:employees,id',
      'group_code' => 'required|integer',
      'group_name' => 'required|string',
      'group_address' => 'required|string',
      'status' => 'required|in:active,inactive',
    ];
  }
}
