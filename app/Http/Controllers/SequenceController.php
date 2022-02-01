<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SequenceController extends Controller
{
  public function index() {
    return view('sequence');
  }
  public function generate() {
    $python = 'python';
    $command = 'bash -c "cd scripts/sequence && '.$python.' char-lstm.py"';
    $output = shell_exec($command);
    return response()->json(['text' => $output]);
  }
}
