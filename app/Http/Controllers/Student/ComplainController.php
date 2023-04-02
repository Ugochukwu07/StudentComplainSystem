<?php

namespace App\Http\Controllers\Student;

use App\Models\Office;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Student\NewComplainMail;
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
            case 'attended':
                $complains = $complain->where('status', 1)->get();
                break;

            default:
            $complains = $complain->get();
                break;
        }

        return view('student.complain.index', compact('complains'));

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
            'office_id' => 'required|numeric|exists:offices,id'
        ]);

        $complain = Complain::create([
            'title' => $request->title,
            'complain' => $request->complain,
            'office_id' => $request->office_id,
            'student_id' => auth()->user()->id,
            'ref' => (new ComplainService())->assignRef(),
        ]);

        Mail::to(auth()->user())->send(new NewComplainMail($complain));

        return redirect()->route('student.complain.index', ['type', 'all'])->with('success', 'Complain Made Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
