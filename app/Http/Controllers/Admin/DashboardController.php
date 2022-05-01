<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Return the admin dashboard
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke()
    {
        return view('admin.dashboard');
    }
}
