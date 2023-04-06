<?php

namespace App\Http\Controllers\Student;

use stdClass;
use App\Models\User;
use App\Models\Office;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Student\NewComplainMail;
use App\Service\SMSService;
use App\Service\Student\ComplainService;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        $complain = Complain::where('student_id', auth()->user()->id);
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

        $data->complain_count = Complain::where('student_id', auth()->user()->id)->count();
        $data->complain_completed_count = Complain::where('student_id', auth()->user()->id)->where('status', 1)->count();
        $data->complain_pending_count = Complain::where('student_id', auth()->user()->id)->where('status', 0)->count();

        $offices = Office::all();

        return view('student.complain.index', compact('complains', 'data', 'offices'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offices = Office::all();
        return view('student.complain.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'complain' => 'required|string',
            'office_id' => 'required|numeric|exists:offices,id',
        ]);

        $complain = Complain::create([
            'title' => $request->title,
            'complain' => $request->complain,
            'office_id' => $request->office_id,
            'student_id' => auth()->user()->id,
            'ref' => (new ComplainService())->assignRef(),
            'resolved_by' => 0
        ]);

        $user = User::find(auth()->user()->id);
        Mail::to($user)->send(new NewComplainMail($complain));

        if(!empty($user->profile->phone_number)){
            // (new SMSService())->sendSMS($user->profile->phone_number, 'We have received Your Complain. Ref:' . $complain->ref);
            (new SMSService())->sendSMSTermil($user->profile->phone_number, 'We have received Your Complain. Ref:' . $complain->ref);
        }

        return redirect()->route('student.complain.index', ['type', 'all'])->with('success', 'Complain Made Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offices = Office::all();
        $complain = Complain::find($id);
        return view('student.complain.view', compact('offices', 'complain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'complain' => 'required|string',
            'office_id' => 'required|numeric|exists:offices,id'
        ]);

        $complain = Complain::where('id', $id)->update([
            'title' => $request->title,
            'complain' => $request->complain,
            'office_id' => $request->office_id,
            'student_id' => auth()->user()->id,
        ]);

        return redirect()->route('student.complain.index', ['type', 'all'])->with('success', 'Complain Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $complain = Complain::find($id);
        $complain->delete();

        return back()->with('success', 'Complain Deleted Successfully');
    }
}
