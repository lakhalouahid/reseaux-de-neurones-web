<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZombieController extends Controller
{

  public function index() {
    return view('zombie');
  }
  public function predict(Request $request)
  {
    $dataset = $request->dataset;
    $x1 = $request->x1;
    $x2 = $request->x2;
    $python = 'python';
    $command = 'bash -c "cd scripts/zombie && '.$python.' zombie.py -d ' . $dataset . ' --x1 ' . $x1 . ' --x2 ' . $x2 . '"';
    $output = shell_exec($command);
    $prob = 0;
    if ($output>=0.5){
      $result = 1;
      $prob = $output;
    } else {
      $result = 0;
      $prob = 1 - $output;
    }
    return response()->json(['result' => $result, 'prob' => $prob]);
  }

}
