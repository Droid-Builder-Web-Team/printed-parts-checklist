<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\DataTables\DroidDataTable;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getUsersDataTable(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.list');
    }

    public function getDroidsDataTable(DroidDataTable $dataTable)
    {
        return $dataTable->render('admin.droids.list');
    }
}
