<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Admin\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $groups = Groups::with(['customer:id,group_id'])->where('employee_id', Auth::user()->employee_id)->get();
    // return $groups;
    return view('employee.pages.groups.index', compact('groups'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(GroupRequest $request)
  {
    try {
      Groups::create($request->all());
      toastr()->success('Group has been created successfully');
      return redirect()->route('employee.group.index')->with('success', 'Group has been created successfully');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Groups $group)
  {
    return view('employee.pages.groups.edit', compact('group'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Groups $group)
  {
    try {
      $group->update($request->all());
      toastr()->success('Group edited successfully');
      return redirect()->route('employee.group.index');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('employee.pages.groups.create');
  }


  public function changeStatus(Request $request)
  {
    $group = Groups::findOrFail($request->id);
    $group->status = ($request->status == 'true') ? 'active' : 'inactive';
    $group->update();
    return response()->json(['message' => 'Status has been changed successfully!']);
  }
}
