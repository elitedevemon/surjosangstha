<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRegisterRequest extends FormRequest
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
    $rules = [
      'name' => 'required|string',
      'email' => 'required|email',
      'own_village' => 'required|string',
      'own_union' => 'required|string',
      'own_post_office' => 'required|string',
      'own_thana' => 'required|string',
      'own_district' => 'required|string',
      'own_phone' => 'required|string',
      'own_nid' => 'required|integer',
      'dob' => 'required|date',
      'own_photo' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=480,max_height=600',
      'own_nid_front' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      'own_nid_back' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      'father_name' => 'required|string',
      'father_phone' => 'nullable|string',
      'father_nid' => 'required|string',
      'mother_name' => 'required|string',
      'mother_phone' => 'nullable|string',
      'mother_nid' => 'required|string',
      'guarantor_1_name' => 'required|string',
      'guarantor_1_phone' => 'required|string',
      'guarantor_1_nid' => 'required|string',
      'guarantor_1_photo' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=480,max_height=600',
      'guarantor_1_nid_front' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      'guarantor_1_nid_back' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      'nominee_name' => 'required|string',
      'nominee_phone' => 'required|string',
      'nominee_nid' => 'required|string',
      'nominee_relation' => 'required|string',
      'nominee_photo' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=480,max_height=600',
      'nominee_nid_front' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      'nominee_nid_back' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      'employee_code' => 'required|string',
      'basic_salary' => 'required|integer',
      'application_date' => 'required|date',
      'joining_date' => 'required|date',
    ];

    if ($this->input('multiple_guarantor') == 'on') {
      $rules += [
        'guarantor_2_name' => 'required|string',
        'guarantor_2_phone' => 'required|string',
        'guarantor_2_nid' => 'required|string',
        'guarantor_2_village' => 'required|string',
        'guarantor_2_union' => 'required|string',
        'guarantor_2_post_office' => 'required|string',
        'guarantor_2_thana' => 'required|string',
        'guarantor_2_district' => 'required|string',
        'guarantor_2_photo' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=480,max_height=600',
        'guarantor_2_nid_front' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
        'guarantor_2_nid_back' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1020,max_height=650',
      ];
    }
    return $rules;
  }
}
