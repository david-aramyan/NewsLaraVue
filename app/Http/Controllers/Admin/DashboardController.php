<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
  /**
   * DashboardController constructor.
   */
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  /**
   * Dashboard view
   *
   * @return View
   */
  public function index() : View
  {
    return view('admin.dashboard');
  }
}
