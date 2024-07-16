<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class UserChartController extends Controller
{
    public function userChart()
    {
        // Fetch user data for the user chart
        $usersByDay = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                          ->groupBy('date')
                          ->get();

        $totalUsers = User::count();
        $labels = $usersByDay->pluck('date');
        $userCreations = $usersByDay->pluck('count');
        $totalUsersData = collect([$totalUsers])->pad(count($labels), $totalUsers)->toArray();

        return view('Charts.userchart', compact('labels', 'userCreations', 'totalUsersData'));
    }
}
