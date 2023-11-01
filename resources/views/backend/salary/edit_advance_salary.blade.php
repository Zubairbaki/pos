@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Edit Advance Salary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form method="POST" action="{{ route('advance.salary.update',['id'=>$advance->id]) }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Employ experience</label>

                                <select name="employee_id" class="form-select" id="example-select">
                                    <option selected="">Select Employee</option>
                                    @foreach ($alldata as $item)
                                        <option value="{{ $item->id }}" {{$item->id == $advance->employee_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach

                                </select>


                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="month" class="form-label">Salary Month</label>
                                <select name="month" class="form-select" id="month">
                                    <option value="Jan" {{$advance->month == 'Jan' ? 'selected' : ''}}>Jan</option>
                                    <option value="Feb" {{$advance->month == 'Feb' ? 'selected' : ''}}>Feb</option>
                                    <option value="March" {{$advance->month == 'March' ? 'selected' : ''}}>March</option>
                                    <option value="Apr" {{$advance->month == 'Apr' ? 'selected' : ''}}>Apr</option>
                                    <option value="May" {{$advance->month == 'May' ? 'selected' : ''}}>May</option>
                                    <option value="Jun" {{$advance->month == 'Jun' ? 'selected' : ''}}>Jun</option>
                                    <option value="Jul" {{$advance->month == 'Jul' ? 'selected' : ''}}>Jul</option>
                                    <option value="Aug" {{$advance->month == 'Aug' ? 'selected' : ''}}>Aug</option>
                                    <option value="Sep" {{$advance->month == 'Sep' ? 'selected' : ''}}>Sep</option>
                                    <option value="Oct" {{$advance->month == 'Oct' ? 'selected' : ''}}>Oct</option>
                                    <option value="Nov" {{$advance->month == 'Nov' ? 'selected' : ''}}>Nov</option>
                                    <option value="Dec" {{$advance->month == 'Dec' ? 'selected' : ''}}>Dec</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Year" class="form-label">Salary Year</label>
                                <select name="Year" class="form-select" id="Year">
                                    <option value="2022" {{$advance->Year == '2022' ? 'selected' : ''}}>2022</option>
                                    <option value="2023" {{$advance->Year == '2023' ? 'selected' : ''}}>2023</option>
                                    <option value="2024" {{$advance->Year == '2024' ? 'selected' : ''}}>2024</option>
                                    <option value="2025" {{$advance->Year == '2025' ? 'selected' : ''}}>2025</option>
                                    <option value="2026" {{$advance->Year == '2026' ? 'selected' : ''}}>2026</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label"> Advance salary</label>
                                <input type="text" name="Advance_salary" value="{{$advance->Advance_salary}}"
                                    class="form-control @error('Advance_salary') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('Advance_salary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div> <!-- end row -->


                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                class="mdi mdi-content-save"></i> Save</button>
                    </div>
                </form>
            </div>
            <!-- end settings content-->


        </div>
    </div> <!-- end card-->

    </div> <!-- end col -->
    </div>
    <!-- end row-->



    </div> <!-- content -->
@endsection
