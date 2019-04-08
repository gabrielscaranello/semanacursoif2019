<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cronogram;

class CronogramController extends Controller
{
  public function list()
  {
      $cronogram = Cronogram::where('status', 1)->get();
      if ($cronogram) {
          return ['status' => 'success', 'data' => $cronogram];
      }
      return ['status' => 'error'];
  }

  public function getItem(Request $request)
  {
      $cronogram = Cronogram::where(['status' => 1, 'id' => $request->id])->first();
      if ($cronogram) {
          return ['status' => 'success', 'data' => $cronogram];
      }
      return ['status' => 'error'];
  }

  public function store(Request $request)
  {
      $data = $request->all();
      if (Cronogram::create($data)) {
          return ['status' => 'success'];
      }
      return ['status' => 'error'];
  }

  public function update(Request $request)
  {
      $data = $request->all();
      $cronogram = Cronogram::where('id', $request->id)->first();
      if ($cronogram->update($data)) {
          return ['status' => 'success'];
      }
      return ['status' => 'error'];
  }

  public function delete(Request $request)
  {
      $data = $request->all();
      $cronogram = Cronogram::where('id', $request->id)->first();
      $cronogram->status = -1;
      if ($cronogram->update($data)) {
          return ['status' => 'success'];
      }
      return ['status' => 'error'];
  }
}
