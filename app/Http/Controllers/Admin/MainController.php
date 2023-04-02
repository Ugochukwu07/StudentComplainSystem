<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Service\Admin\MainService;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function overview()
    {
        $data = (new MainService())->overviewData();
        return view('admin.overview', $data);
    }
}
