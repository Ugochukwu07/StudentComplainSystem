<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\User;
use App\Models\Office;
use App\Models\Complain;
use App\Service\SMSService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\Complain\AttendMail;

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

    public function attendSave(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'required|string'
        ]);

        $complain = Complain::where('id', $id)->update([
            'remarks' => $request->remarks,
            'resolved_by' => auth()->user()->id,
            'status' => true
        ]);

        if(!$complain)
            return back()->with('error', 'Something went wrong while updating remarks');


        $student = User::find($request->student_id);

        Mail::to($student)->send(new AttendMail(Complain::find($id), $student));

        (new SMSService())->sendSMSTermil($student->profile->phone_number, 'Your Complain about ' . $complain->title . ' has been resolved. Remarks: ' . $complain->remarks);

        return redirect()->route('admin.complain.index', ['type' => 'attended'])->with('success', 'Complain Attended Successfully');
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
