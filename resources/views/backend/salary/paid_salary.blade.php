@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Paid Salary </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form method="POST" action="{{ route('employ.salary.store',$employsalary->id) }}">
                    @csrf
                    {{-- <input type="hidden" name="employee_id"> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Employ Name</label>

                                <p>{{ $employsalary->name }}</p>

                                </select>


                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Salary Month </label>

                                <p>{{ date('F', strtotime('-1 month')) }}</p>
                                <input type="hidden" name="month" value="{{ date('F', strtotime('-1 month')) }}">


                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label"> Employ Salary </label>

                                <p>{{ $employsalary->salary }}</p>
                                <input type="hidden" name="paid_amount" value="{{ $employsalary->salary }}">



                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label"> Advance Salary<br> </label><br>

                                @php
                                    $total_advance = 0;

                                    $total_advance = 0;
                                    foreach ($employsalary->advance as $adv) {
                                        if ($adv->Advance_salary) {
                                            $total_advance = $adv->Advance_salary + $total_advance;
                                        }
                                    }
                                @endphp
                                {{ $total_advance }}

                                <input type="hidden" name="Advance_salary" value="{{ $total_advance }}">




                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label"> due Amount<br> </label><br>


                                @php
                                    $amount = 0;
                                    if ($total_advance && $employsalary->salary) {
                                        $numericPrice = intval(str_replace(['$', ','], '', $employsalary->salary));
                                        $amount = $numericPrice - $total_advance;
                                    }
                                @endphp
                                <strong style="color:#fff;">{{ round($amount) }}</strong>

                                <input type="hidden" name="due_salary" value="{{ round($amount) }}">



                            </div>
                        </div>




                    </div> <!-- end row -->


                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                class="mdi mdi-content-save"></i> Paid Salary</button>
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
