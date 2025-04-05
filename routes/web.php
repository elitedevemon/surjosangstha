<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminCommands;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\EmployeeDpsController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\ProfileController;
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
  Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
  Route::get('/attendance/settings', [AttendanceController::class, 'settings'])->name('attendance.settings');
  Route::put('/attendance/settings/update', [AttendanceController::class, 'updateSettings'])->name('attendance.settings.update');

});

Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function(){
  // Route::view('/', 'employee.index')->name('dashboard');
  Route::get('/', function(){
    $attendance = Auth::user()->attendance()->whereDate('created_at', now())->whereNull('punch_out_time')->first();
    return view('employee.index', compact('attendance'));
  })->name('dashboard');
  Route::post('/attendance/punch-in', [\App\Http\Controllers\Employee\AttendanceController::class, 'punchIn'])->name('attendance.punch-in');
  Route::post('/attendance/punch-out', [\App\Http\Controllers\Employee\AttendanceController::class, 'punchOut'])->name('attendance.punch-out');
});
