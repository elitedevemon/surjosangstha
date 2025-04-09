<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Admin\Groups;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $groups = Groups::with(['employee:id,name', 'branch:id,branch_name', 'customer:id,group_id'])->get();
    // return $groups;
    return view('admin.pages.groups.index', compact('groups'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $branches = Branch::all();
    $employees = Employee::all();
    return view('admin.pages.groups.create', compact(['branches', 'employees']));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(GroupRequest $request)
  {
    try {
      Groups::create($request->all());
      toastr()->success('Group has been created successfully');
      return redirect()->route('admin.group.index')->with('success', 'Group has been created successfully');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Groups $group)
  {
    $branches = Branch::all();
    $employees = Employee::all();
    return view('admin.pages.groups.edit', compact(['group','branches','employees']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Groups $group)
  {
    try {
      $group->update($request->all());
      toastr()->success('Group edited sucessfully');
      return redirect()->route('admin.group.index');
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Groups $group)
  {
    try {
      $group->delete();
      toastr()->success('Group deleted successfully');
      return back();
    } catch (\Throwable $th) {
      toastr()->error('Something went wrong');
      return back();
    }
  }

  public function changeStatus(Request $request){
    $group = Groups::findOrFail($request->id);
    $group->status = ($request->status == 'true') ? 'active' : 'inactive';
    $group->update();
    return response()->json(['message' => 'Status has been changed successfully!']);
  }
}
