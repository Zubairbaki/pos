<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Attandance;
use App\Models\Employ;
use Illuminate\Http\Request;

class AttandanceController extends Controller
{
    public function index()
    {

        $attendanceRecords = Attandance::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('backend.attendance.index', compact('attendanceRecords'));
    }

    public function create()
    {
        // Add code to retrieve a list of employees for the attendance form
        $employees = Employ::all();
        return view('backend.attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {

        Attandance::where('date',date('Y-m-d',strtotime($request->date)))->delete(['date'=> date('Y-m-d')]);
        $countemploy=count($request->employee_id);

        for ($i=0; $i <$countemploy ; $i++) {
            // $attand_status='attand_status' .$i;
            $attend=  new Attandance();
            $attend->date=date('Y-m-d', strtotime($request->date));
            $attend->employee_id=$request->employee_id[$i];
            $attend->attand_status = $request['attand_status' .$i];
            $attend->save();
            # code...
        }
        return redirect()->route('attendance.index')->with('message','Attendance record created successfully');

    }

    public function Edit($date)
    {
        $attendanceRecord = Attandance::where('date',$date)->get();
        $employees = Employ::all(); // You may need to pass employee data for the edit form
        return view('backend.attendance.edit', compact('attendanceRecord', 'employees'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'clock_in' => 'nullable|date_format:H:i',
            'clock_out' => 'nullable|date_format:H:i',

            'status' => 'required|in:Present,Absent,Late,Vacation,Sick,Custom',
        ]);

        $attendanceRecord = Attandance::find($id);
        $attendanceRecord->update($validatedData);

        return redirect()->route('attendance.index')->with('success', 'Attendance record updated successfully');
    }

    public function View($date){

        $details = Attandance::where('date',$date)->get();
       // You may need to pass employee data for the edit form
        return view('backend.attendance.view', compact('details'));

    }
}
