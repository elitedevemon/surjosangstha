<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRegisterRequest;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeeDesignation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('admin.pages.employee.details');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $branches = Branch::where('status', 'active')->get();
    $designations = EmployeeDesignation::where('status', 'active')->get();
    return view('admin.pages.employee.create', compact(['branches', 'designations']));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(EmployeeRegisterRequest $request)
  {
    // Get only the necessary fields from the request
    $employeeData = $request->only([
      'employee_code',
      'email',
      'dob',
      'employee_designation_id',
      'branch_id',
      'name',
      'father_name',
      'mother_name',
      'application_date',
      'joining_date'
    ]);

    // Create the employee
    $employee = Employee::create($employeeData);

    // Create employee contact info
    $employee->contact()->create($request->only([
      'own_phone',
      'own_nid',
      'father_phone',
      'father_nid',
      'mother_phone',
      'mother_nid',
      'guarantor_1_phone',
      'guarantor_1_nid',
      'guarantor_2_phone',
      'guarantor_2_nid',
      'nominee_phone',
      'nominee_nid'
    ]));

    // Create employee address
    $employee->address()->create($request->only([
      'own_village',
      'own_union',
      'own_post_office',
      'own_thana',
      'own_district',
      'father_village',
      'father_union',
      'father_post_office',
      'father_thana',
      'father_district',
      'mother_village',
      'mother_union',
      'mother_post_office',
      'mother_thana',
      'mother_district',
      'guarantor_1_name',
      'guarantor_1_village',
      'guarantor_1_union',
      'guarantor_1_post_office',
      'guarantor_1_thana',
      'guarantor_1_district',
      'guarantor_2_name',
      'guarantor_2_village',
      'guarantor_2_union',
      'guarantor_2_post_office',
      'guarantor_2_thana',
      'guarantor_2_district',
      'nominee_relation',
      'nominee_name',
      'nominee_village',
      'nominee_union',
      'nominee_post_office',
      'nominee_thana',
      'nominee_district'
    ]));

    // Handle file uploads
    $images = [
      'own_photo',
      'father_photo',
      'mother_photo',
      'guarantor_1_photo',
      'nominee_photo',
      'own_nid_front',
      'father_nid_front',
      'mother_nid_front',
      'guarantor_1_nid_front',
      'nominee_nid_front',
      'own_nid_back',
      'father_nid_back',
      'mother_nid_back',
      'guarantor_1_nid_back',
      'nominee_nid_back'
    ];

    $uploadFiles = [];
    foreach ($images as $image) {
      if ($request->hasFile($image)) {
        $uploadFiles[$image] = image($request->file($image), $image);
      }
    }

    // If multiple guarantors, handle additional file uploads
    if ($request->multiple_guarantor) {
      $additionalGuarantorImages = [
        'guarantor_2_photo',
        'guarantor_2_nid_front',
        'guarantor_2_nid_back'
      ];

      foreach ($additionalGuarantorImages as $image) {
        if ($request->hasFile($image)) {
          $uploadFiles[$image] = image($request->file($image), $image);
        }
      }
    }

    // Create employee upload file
    $employee->upload_file()->create($uploadFiles);

    $house_route_allowance = $request->basic_salary * 35/100;
    $medical_allowance = ceil($request->basic_salary * 10/100);
    $phone_bill = ceil($request->basic_salary * 20/100);
    $festival_bonus = ceil($request->basic_salary * 50/100);
    $total_salary = $house_route_allowance * 2 + $medical_allowance + $phone_bill + $request->basic_salary;

    $employee->salary()->create([
      'basic_salary' => $request->basic_salary,
      'house_rent' => $house_route_allowance,
      'medical_allowance' => $medical_allowance,
      'route_allowance' => $house_route_allowance,
      'phone_bill' => $phone_bill,
      'festival_bonus' => $festival_bonus,
      'total_salary' => $total_salary
    ]);

    toastr()->success('Employee has been created successfully');
    return back();
  }

  /**
   * Display the specified resource.
   */
  public function show(Employee $employee)
  {
    return view('admin.pages.employee.details');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Employee $employee)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Employee $employee)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Employee $employee)
  {
    //
  }
}
