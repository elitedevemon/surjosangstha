<?php

use App\Http\Controllers\Admin\BlockODController;
use App\Http\Controllers\Admin\DailyReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ODReportController;
use App\Http\Controllers\AdminCommands;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Employee\BlockCustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\EmployeeDpsController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
  if (Auth::check()) {
    if (Auth::user()->role === 'admin') {
      return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role === 'employee') {
      return redirect()->route('employee.dashboard');
    }
  }
  return redirect()->route('login');
})->name('welcome');

// Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// Route::view('/index', 'frontend/index');

// Route::middleware('auth')->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

// admin routes
Route::controller(DashboardController::class)->prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function(){
  Route::get('/', 'index')->name('dashboard');

  # employee related routes
  Route::get('/employee-list', 'employeeList')->name('employee.list');
  Route::resource('employee', EmployeeController::class);
  #salary info
  Route::resource('salary-info', EmployeeSalaryController::class)->except('show', 'create', 'destroy', 'store');

  # branch related routes
  Route::resource('branch', BranchController::class)->except('show');
  Route::post('branch/change/status/', [BranchController::class, 'changeStatus'])->name('branch.change.status');

  # designation related routes
  Route::resource('designation', EmployeeDesignationController::class)->except('show');
  Route::post('designation/change/status/', [EmployeeDesignationController::class, 'changeStatus'])->name('designation.change.status');

  # DPS related routes
  Route::get('/employee-dps', [EmployeeDpsController::class, 'index'])->name('dps.index');
  Route::get('/employee-dps/create', [EmployeeDpsController::class, 'create'])->name('dps.create');
  Route::post('/employee-dps/store', [EmployeeDpsController::class, 'store'])->name('dps.store');
  Route::post('/employee-dps/info', [EmployeeDpsController::class, 'info'])->name('dps.info');

  # Commands
  Route::prefix('commands')->name('command.')->controller(AdminCommands::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/artisan/run', 'runCommand')->name('run.artisan');
  });

  # Attendance related routes
  Route::get('/attendance', [\App\Http\Controllers\Admin\AttendanceController::class, 'index'])->name('attendance.index');
  Route::get('/attendance/settings', [\App\Http\Controllers\Admin\AttendanceController::class, 'settings'])->name('attendance.settings');
  Route::put('/attendance/settings/update', [\App\Http\Controllers\Admin\AttendanceController::class, 'updateSettings'])->name('attendance.settings.update');

  # Groups related routes
  Route::resource('group', GroupController::class)->except('show');
  Route::post('group/change/status/', [GroupController::class, 'changeStatus'])->name('group.change.status');

  # Customers related routes
  Route::resource('customer', CustomerController::class)->except('show');
  Route::post('customer/change/status/', [CustomerController::class, 'changeStatus'])->name('customer.change.status');

  # Target related routes
  Route::get('/target', [\App\Http\Controllers\Admin\TargetController::class, 'index'])->name('target.index');
  Route::post('target/check', [\App\Http\Controllers\Admin\TargetController::class, 'check'])->name('target.check');
  Route::post('/target/store', [\App\Http\Controllers\Admin\TargetController::class, 'store'])->name('target.store');

  # Report related route
  Route::prefix('reports')->name('report.')->group(function(){
    # daily report
    Route::get('daily-report', [DailyReportController::class,'index'])->name('daily-report');

    # block od
    Route::get('block-od', [BlockODController::class,'index'])->name('block-od');

    # od reports
    Route::get('od-report', [ODReportController::class, 'index'])->name('od-report');
  });

});

// employee routes
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function(){
  Route::get('/', function(){
    $attendance = Auth::user()->attendance()->whereDate('created_at', now())->whereNull('punch_out_time')->first();
    return view('employee.index', compact('attendance'));
  })->name('dashboard');

  # attendance related routes
  Route::post('/attendance/punch-in', [\App\Http\Controllers\Employee\AttendanceController::class, 'punchIn'])->name('attendance.punch-in');
  Route::post('/attendance/punch-out', [\App\Http\Controllers\Employee\AttendanceController::class, 'punchOut'])->name('attendance.punch-out');

  # group related routes
  Route::get('/group', [\App\Http\Controllers\Employee\GroupController::class, 'index'])->name('group.index');
  Route::get('/group/create', [\App\Http\Controllers\Employee\GroupController::class, 'create'])->name('group.create');
  Route::post('/group/store', [\App\Http\Controllers\Employee\GroupController::class, 'store'])->name('group.store');
  Route::get('/group/edit/{group}', [\App\Http\Controllers\Employee\GroupController::class, 'edit'])->name('group.edit');
  Route::put('/group/update/{group}', [\App\Http\Controllers\Employee\GroupController::class, 'update'])->name('group.update');
  Route::post('group/change/status/', [\App\Http\Controllers\Employee\GroupController::class, 'changeStatus'])->name('group.change.status');

  # customer related routes
  Route::resource('customer', \App\Http\Controllers\Employee\CustomerController::class)->except('show', 'destroy');
  Route::post('customer/change/status/', [CustomerController::class, 'changeStatus'])->name('customer.change.status');
  Route::get('customer/block_od', [BlockCustomerController::class, 'index'])->name('customer.block-od');
});
