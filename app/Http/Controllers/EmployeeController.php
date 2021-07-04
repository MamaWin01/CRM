<?php

namespace App\Http\Controllers;

use App\Models\Prospects;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Prospects $prospects)
    {
        return view('employee.index', compact('prospect'));
    }
}
