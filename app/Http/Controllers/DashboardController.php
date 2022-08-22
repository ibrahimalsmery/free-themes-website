<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index_page()
    {
        $page_title = $this->pageTitle('Dashboard');
        $page_content_title = 'Dashboard';
        return view('dashboard.dashboard', compact('page_title', 'page_content_title'));
    }
}
