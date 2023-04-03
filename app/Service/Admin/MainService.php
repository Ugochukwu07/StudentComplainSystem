<?php
namespace App\Service\Admin;

use stdClass;
use App\Models\User;
use App\Models\Office;
use App\Models\Faculty;
use App\Models\Complain;
use App\Models\Department;

class MainService{
    public function overviewData()
    {
        $offices = Office::all();
        $departments = Department::all();
        $complains = Complain::all();
        $faculties = Faculty::all();
        $students = User::where('admin', 0)->get();

        $data = new stdClass;
        $data->complain_completed_count = Complain::where('status', 1)->count();
        $data->complain_pending_count = Complain::where('status', 0)->count();

        return compact('offices', 'complains', 'departments', 'faculties', 'data', 'students');
    }
}
