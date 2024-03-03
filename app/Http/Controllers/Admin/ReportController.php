<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getLocationReport()
    {
        return view('admin.reports.location_report');
    }
}
