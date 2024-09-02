<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\User;
use App\Vehicle;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.index', [
            'users' => count(User::all()),
            'vehicles' => count(Vehicle::all()),
            'deleted_users' => count(User::onlyTrashed()->get()),
            'deleted_vehicles' => count(Vehicle::onlyTrashed()->get()),
        ]);
    }
}
