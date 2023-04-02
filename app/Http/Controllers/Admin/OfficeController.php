<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Office\AddOfficeRequest;
use App\Http\Requests\Admin\Office\EditOfficeRequest;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::orderBy('created_at', 'desc')->get();

        return view('admin.office.index', compact('offices'));
    }

    public function add()
    {
        $faculties = Faculty::all();
        $departments = Department::all();

        return view('admin.office.add', compact('faculties', 'departments'));
    }

    public function addSave(AddOfficeRequest $request)
    {
        $office = Office::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'faculty_id' => $request->faculty_id,
            'address' => $request->address,
            'active' => true
        ]);

        if($office != null){
            flash()->addSuccess('Office created successfully');
            return redirect()->route('admin.office.all');
        }

        return back()->with('error', 'Something went wrong, Please try again later');
    }

    public function edit($id)
    {
        $faculties = Faculty::all();
        $departments = Department::all();

        $office = Office::find($id);

        return view('admin.office.add', compact('faculties', 'departments', 'office'));
    }

    public function editSave($id, EditOfficeRequest $request)
    {
        $request->validate([
            'name' => 'unique:offices,name,'.$id
        ]);

        $office = Office::where('id', $id)->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'faculty_id' => $request->faculty_id,
            'address' => $request->address,
            'active' => $request->active
        ]);

        if($office){
            flash()->addSuccess('Office updated successfully');
            return redirect()->route('admin.office.all');
        }

        return back()->with('error', 'Something went wrong, Please try again later');
    }

    public function delete($id, $soft = true)
    {
        $office = Office::find($id);
        if($soft)
            $office->active = true;
            $office->save();
            return back()->with('success', 'Office Deactivated Successfully');

        $office->delete();
        return back()->with('success', 'Office Deleted Successfully');
    }
}
