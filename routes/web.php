<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backed\AttandanceController;
use App\Http\Controllers\Backed\CatagoryController;
use App\Http\Controllers\Backed\CostomerController;
use App\Http\Controllers\Backed\EmployController;
use App\Http\Controllers\Backed\ExpenseController;
use App\Http\Controllers\Backed\PosController;
use App\Http\Controllers\Backed\ProductController;
use App\Http\Controllers\Backed\SalaryController;
use App\Http\Controllers\Backed\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout.page');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/store', [AdminController::class, 'StoreProfile'])->name('admin.profile_store');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

});
Route::middleware('auth')->group(function () {
    Route::get('/all/employ', [EmployController::class, 'AllEmploy'])->name('all.employ');
    Route::get('/add/employ', [EmployController::class, 'ADDEmploy'])->name('add.employe');
    Route::post('/store/employ', [EmployController::class, 'StoreEmploy'])->name('employe.store');
    Route::get('/Edit/employ/{id}', [EmployController::class, 'EditEmploy'])->name('edit.employ');
    Route::post('/update/employ', [EmployController::class, 'UpdateEmploy'])->name('update.employ');
    Route::get('/delete/employ{id}', [EmployController::class, 'DeleteEmploy'])->name('delet.employ');


});

Route::middleware('auth')->group(function () {
    Route::get('/all/costomer', [CostomerController::class, 'AllCostomer'])->name('all.costomer');
    Route::get('/add/costomer', [CostomerController::class, 'ADDCostomer'])->name('add.costomer');
    Route::post('/store/costomer', [CostomerController::class, 'StoreCostomer'])->name('store.costomer');
    Route::get('/Edit/costomer/{id}', [CostomerController::class, 'EditCostomer'])->name('edit.costomer');
    Route::post('/update/costomer', [CostomerController::class, 'UpdateCostomer'])->name('update.costomer');
    Route::get('/delete/costomer{id}', [CostomerController::class, 'DeleteCostomer'])->name('delet.costomer');


});
Route::middleware('auth')->group(function () {
    Route::get('/all/supplier', [SupplierController::class, 'AllSupplier'])->name('all.supplier');
    Route::get('/add/supplier', [SupplierController::class, 'ADDSupplier'])->name('add.supplier');
    Route::post('/store/supplier', [SupplierController::class, 'StoreSupplier'])->name('store.supplier');
    Route::get('/edit/supplier/{id}', [SupplierController::class, 'EditSupplier'])->name('edit.supplier');
    Route::post('/update/supplier', [SupplierController::class, 'UpdateSupplier'])->name('update.supplier');
    Route::get('/delete/supplier{id}', [SupplierController::class, 'DeleteSupplier'])->name('delet.supplier');
    Route::get('/details/supplier{id}', [SupplierController::class, 'DetailsSupplier'])->name('details.supplier');


});
Route::middleware('auth')->group(function () {
    Route::get('/add/advance/salary', [SalaryController::class, 'AddAdvanceSalary'])->name('add.advance.salary');
    Route::post('/advance/salary/store', [SalaryController::class, 'AddAdvanceStore'])->name('advance.salary.store');
    Route::get('/all/advance/salary', [SalaryController::class, 'AllAdvanceSalary'])->name('all.advance.salary');
    Route::get('/edit/advance/salary/{id}', [SalaryController::class, 'EditAdvanceSalary'])->name('edit.advance.salary');
    Route::post('/advance/salary/update', [SalaryController::class, 'AdvanceSalaryUpdate'])->name('advance.salary.update');
    Route::get('/detete/salary/{id}', [SalaryController::class, 'DeleteSalary'])->name('delete.salary');



});

//pay salary all route
Route::middleware('auth')->group(function () {
    Route::get('/pay/salary', [SalaryController::class, 'PaySalary'])->name('pay.salary');
    Route::get('/pay/Now/salary/{id}', [SalaryController::class, 'PayNowSalary'])->name('pay.now');
    Route::post('/employ/salary/store/{id}', [SalaryController::class, 'EmployeSalaryStore'])->name('employ.salary.store');
    Route::get('/month/salary', [SalaryController::class, 'MonthSalary'])->name('month.salary');

});
Route::middleware('auth')->group(function () {
    Route::get('/atn/list', [AttandanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/create', [AttandanceController::class, 'create'])->name('attendance.create');
    Route::get('attendance/edit/{date}',[AttandanceController::class, 'Edit'])->name('attendance.edit');

    Route::post('/attendance', [AttandanceController::class, 'store'])->name('attendance.store');
    Route::patch('/attendance/{id}', [AttandanceController::class, 'update'])->name('attendance.update');

    Route::get('attendance/view/{date}',[AttandanceController::class, 'View'])->name('attendance.view');

});
Route::middleware('auth')->group(function () {
    Route::get('/all/catagory', [CatagoryController::class, 'AllCatagory'])->name('all.catagory');
    Route::post('/store/catagory', [CatagoryController::class, 'StoreCatagory'])->name('store.catagroy');
    Route::get('/edit/catagory{id}', [CatagoryController::class, 'EditCatagory'])->name('edit.catagory');
    Route::post('/Update/catagory', [CatagoryController::class, 'UpdateCatagory'])->name('update.catagory');
    Route::get('/delete/catagory{id}', [CatagoryController::class, 'DeleteCatagory'])->name('delete.catagory');


});
Route::middleware('auth')->group(function () {
    Route::get('/all/product', [ProductController::class, 'AllProduct'])->name('all.product');
    Route::get('/add/product', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store/product', [ProductController::class, 'AddStore'])->name('product.store');
    Route::get('/edit/product{id}', [ProductController::class, 'EditProducts'])->name('edit.products');
    Route::get('/delete/product{id}', [ProductController::class, 'deleteProducts'])->name('delete.products');
    Route::post('/update/product', [ProductController::class, 'UpdateStore'])->name('product.update');
    Route::get('/barcod/product{id}', [ProductController::class, 'Barcode'])->name('barcode.products');
    Route::get('/import/product', [ProductController::class, 'ImportProduct'])->name('import.product');
    Route::get('/export', [ProductController::class, 'Export'])->name('Export');
    Route::post('/import', [ProductController::class, 'Import'])->name('import');





});
Route::middleware('auth')->group(function () {
    Route::get('/add/expense', [ExpenseController::class, 'AddExpense'])->name('add.expense');
    Route::post('/store/expense', [ExpenseController::class, 'StoreExpense'])->name('expense.store');
    Route::get('/today/expense', [ExpenseController::class, 'TodayExpense'])->name('today.expense');
    Route::get('/edit/expense{id}', [ExpenseController::class, 'EditExpense'])->name('edit.expense');
    Route::post('/update/expense', [ExpenseController::class, 'UpdateExpense'])->name('update.expense');
    Route::get('/month/expense', [ExpenseController::class, 'MonthExpense'])->name('month.expense');
    Route::get('/year/expense', [ExpenseController::class, 'YearExpense'])->name('year.product');





});
Route::middleware('auth')->group(function () {
    Route::get('/pos', [PosController::class, 'Pos'])->name('pos');






});



require __DIR__.'/auth.php';
