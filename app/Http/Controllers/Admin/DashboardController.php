<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\DataTables\DroidDataTable;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Return the admin dashboard
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke(UserDataTable $userDataTable, DroidDataTable $droidDataTable)
    {
        return $userDataTable->render('admin.dashboard');
    }
}
