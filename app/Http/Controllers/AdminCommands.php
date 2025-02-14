<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminCommands extends Controller
{
  public function index(){
    return view("admin.pages.command.index");
  }

  public function runCommand(Request $request)
  {
    $request->validate([
      'command' => 'required|string'
    ]);

    try {
      Artisan::call($request->command);
      return response()->json([
        'status' => 'success',
        'message' => 'Command executed successfully!'
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => 'Error executing command: ' . $e->getMessage()
      ]);
    }
  }
}
