<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function getSectionContent($section)
    {
        switch ($section) {
            case 'stationery':
                return view('dashboard.sections.stationery'); 
            case 'orders':
                return view('dashboard.sections.orders'); 
            case 'users':
                return view('dashboard.sections.users');
            default:
                return response('Section not found', 404);
        }
    }
}
