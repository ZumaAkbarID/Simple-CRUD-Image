<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'dataProduct' => Product::with('user')->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->limit(5)->get(),
            'totalProduct' => Product::get()->count(),
            'totalUser' => User::get()->count()
        ];
        return view('Dashboard.dashboard', $data);
    }
}
