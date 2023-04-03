<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Office;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainController extends Controller
{
    public function index($type)
    {
        $complain = new Complain();
        switch ($type) {
            case 'all':
                $complains = $complain->get();
                break;
            case 'pending':
                $complains = $complain->where('status', 0)->get();
                break;
            case 'completed':
                $complains = $complain->where('status', 1)->get();
                break;

            default:
            $complains = $complain->get();
                break;
        }

        $data = new stdClass;

        $data->complain_count = Complain::count();
        $data->complain_completed_count = Complain::where('status', 1)->count();
        $data->complain_pending_count = Complain::where('status', 0)->count();

        $offices = Office::all();

        return view('admin.complain.index', compact('complains', 'data', 'offices'));
    }

    public function attend($id)
    {
        return view('admin.complain.attend', [
            'complain' => Complain::find($id),
            'offices' => Office::all()
        ]);
    }

    public function student($student_id, $type)
    {
        $complain = Complain::where('student_id', $student_id);
        switch ($type) {
            case 'all':
                $complains = $complain->get();
                break;
            case 'pending':
                $complains = $complain->where('status', 0)->get();
                break;
            case 'completed':
                $complains = $complain->where('status', 1)->get();
                break;

            default:
            $complains = $complain->get();
                break;
        }


        $data = new stdClass;

        $data->complain_count = Complain::where('student_id', $student_id)->count();
        $data->complain_completed_count = Complain::where('student_id', $student_id)->where('status', 1)->count();
        $data->complain_pending_count = Complain::where('student_id', $student_id)->where('status', 0)->count();

        $offices = Office::all();

        return view('admin.complain.index', compact('complains', 'data', 'offices'));

    }
}
