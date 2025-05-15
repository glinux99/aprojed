<?php

namespace App\Http\Controllers\Admin\operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function achat()
    {
        return view('admin.system.operations.achat');
    }
    public function vente()
    {
        return view('admin.system.operations.ventes');
    }
    public function transformation()
    {
        return view('admin.system.operations.transformation');
    }
}
