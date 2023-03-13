<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Droid;

class AdminController extends Controller
{
    public function getUsersDataTable(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.list');
    }

    public function getDroidsDataTable()
    {
        $droids = Droid::whereNull('deleted_at')->get();
        return view('admin.droids.list', [
            'droids' => $droids,
        ]);
    }
}
