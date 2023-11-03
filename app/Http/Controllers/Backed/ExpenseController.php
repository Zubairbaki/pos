<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{
   public function AddExpense(){

    return view("backend.expense.add_expense");

   }

   public function StoreExpense(Request $request){

    Expense::insert([
        'details'=>$request->details,
        'amount'=>$request->amount,
        'month'=>$request->month,
        'year'=> $request->year,
        'date'=> $request->date,
        'created_at'=> Carbon::now(),
    ]);

    return redirect()->route('add.expense')->with('message','Succussfully Done');
   }

   public function TodayExpense(){

    $date =date('d-m-Y');
    $today= Expense::where('date',$date)->get();

    return view("backend.expense.today_expense",compact('today'));


   }
   public function EditExpense($id){
    $expense = Expense::findOrFail($id);
    return view('backend.expense.edit_expense',compact('expense'));
   }
   public function UpdateExpense(Request $request){

    $expense= $request->id;

    Expense::findOrFail($expense)->update([
        'details'=>$request->details,
        'amount'=>$request->amount
    ]);
    return redirect()->route('add.expense')->with('message','succusfully done');
   }

   public function MonthExpense(){

    $month =date('F');
    $monthexpense= Expense::where('month',$month)->get();

    return view("backend.expense.month_expense",compact('monthexpense'));
   }

   public function YearExpense(){

    $Year =date('Y');
    $yearexpense= Expense::where('Year',$Year)->get();

    return view("backend.expense.year_expense",compact('yearexpense'));

   }


}
