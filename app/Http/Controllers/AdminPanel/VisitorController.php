<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vsitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {

       $visitors_today = Vsitor::where('created_at',Carbon::now()->today())->get();
      $visitos = Vsitor::all();
      $users = User::whereIn('user_type',['customer','store_admin'])->where('created_at',Carbon::now()->today())->count();

      return view('AdminPanel.visitors.index')
      ->with('visitors', $visitos)
      ->with('users', $users)
      ->with('visitors_today', $visitors_today);
    }

}
