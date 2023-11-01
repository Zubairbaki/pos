<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employ;
use App\Models\PaySalary;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SalaryController extends Controller
{
    public function AddAdvanceSalary()
    {

        $alldata = Employ::latest()->get();
        return view('backend.salary.Add_advance_salary', compact('alldata'));
    }

    public function AddAdvanceStore(Request $request)
    {

        $validation = $request->validate([
            'month' => 'required',
            'Year' => 'required',

        ]);
        $month = $request->month;
        $employee_id = $request->employee_id;

        $advance = AdvanceSalary::where('month', $month)
            ->where('employee_id', $employee_id)->first();

            if ($advance ===null) {

                AdvanceSalary::insert([
                    'employee_id'=>$request->employee_id,
                    'month'=>$request->month,
                    'Year'=>$request->Year,
                    'Advance_salary'=>$request->Advance_salary,
                    'created_at'=>Carbon::now()
                 ]);
                 $notification = array(
                     'message' => ' Advance salary paid succusfully',
                     'alert_type' => 'success'
                 );
                 return redirect()->back()->with($notification);


            }else{

                $advance->update([
                    'Advance_salary' => $advance->Advance_salary + $request->Advance_salary,]
                );
                $notification = [
                    'message' => 'Advance salary updated successfully',
                    'alert_type' => 'success',
                ];
                return redirect()->back()->with($notification);


            }



    }

    public function AllAdvanceSalary(){

        $alldataget= AdvanceSalary::latest()->get();
        return view('backend.salary.all_advance_salary',compact('alldataget'));
    }

    public function EditAdvanceSalary($id){

        $alldata = Employ::latest()->get();

        $advance=AdvanceSalary::FindOrFail($id);

        return view('backend.salary.edit_advance_salary',compact('advance','alldata'));
    }
    public function AdvanceSalaryUpdate(Request $request){

        $salary_id = $request->id;

        AdvanceSalary::FindOrFail($salary_id)->update([
            'employee_id'=>$request->employee_id,
            'month'=>$request->month,
            'Year'=>$request->Year,
            'Advance_salary'=>$request->Advance_salary,
            'created_at'=>Carbon::now()
         ]);
         $notification = array(
             'message' => ' Advance salary paid succusfully',
             'alert_type' => 'success'
         );
         return redirect()->route('all.advance.salary')->with($notification);
    }

    public function DeleteSalary($id) {

            $salary= AdvanceSalary::findOrFail($id);

            $salary->delete();

            $notification = [
                'message' => 'Employ deleted successfully',
                'alert_type' => 'success'
            ];

            return redirect()->route('all.advance.salary')->with($notification);

        }


        //Pay Salary mthods start
        public function PaySalary(){
            $alldataemploy = Employ::with('advance')->get();
            $month = date('F', strtotime('-1 month'));
            $salaries = PaySalary::where('salart_month', $month)->pluck('employee_id')->toArray();

            // echo '<pre>';
            // echo $alldataemploy;
            // echo '</pre>';
            // die();


            return view('backend.salary.Pay_salary',compact('alldataemploy', 'salaries'));
        }

        public function PayNowSalary($id){

            $employsalary= Employ::findOrFail($id);
            return view('backend.salary.paid_salary', compact('employsalary'));

        }

        public function EmployeSalaryStore(Request $request, $id){
            $employee_id=$request->id;
            $isrecord = PaySalary::where('salart_month', $request->month)->where('employee_id', $employee_id)->get();
            if ($isrecord->count() == 0) {
                PaySalary::insert([
                    'employee_id'=> $employee_id,
                    'salart_month'=> $request->month,
                    'paid_amount'=> $request->paid_amount,
                    'Advance_salary'=> $request->Advance_salary,
                    'due_salary'=> $request->due_salary,
                    'created_at'=> Carbon::now(),
                ]);
                return redirect()->route("pay.salary")->with('message', 'Successfully Paid');
            }else {
                return redirect()->route("pay.salary")->with('message', 'Already Paid');

            }

        }

        public function MonthSalary(){

            $getdata= PaySalary::latest()->get();
            return view('backend.salary.month_salary',compact('getdata'));
        }
    }

