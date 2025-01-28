<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $branches = Branch::orderBy('status')->get();
    return view('admin.pages.branch.index', compact('branches'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.pages.branch.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(BranchRequest $request)
  {
    try {
      Branch::create($request->all());
      toastr()->success('Data has been saved successfully!');
    } catch (\Throwable $th) {
      throw $th;
    }
    return redirect()->route('admin.branch.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Branch $branch)
  {
    return view('admin.pages.branch.edit', compact('branch'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(BranchRequest $request, Branch $branch)
  {
    try {
      $branch->update($request->all());
      toastr()->success('Data has been updated successfully!');
    } catch (\Throwable $th) {
      throw $th;
    }
    return redirect()->route('admin.branch.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Branch $branch)
  {
    try {
      $branch->delete();
      toastr()->success('Data has been deleted successfully!');
    } catch (\Throwable $th) {
      throw $th;
    }
    return back();
  }

  public function changeStatus(Request $request)
  {
    $branch = Branch::findOrFail($request->id);
    $branch->status = ($request->status == 'true') ? 'active' : 'inactive';
    $branch->update();
    return response()->json(['message' => 'Status has been changed successfully!']);
  }
}
