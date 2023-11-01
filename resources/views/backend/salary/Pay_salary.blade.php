@extends('admin_desbord')

@section('contant')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.advance.salary') }}"
                                    class="btn btn-primary waves-effect waves-light">Add Advance
                                    salary</a>

                            </ol>
                        </div>
                        <h4 class="page-title">All Pay Salary</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="header-title">{{date('F', strtotime('-1 month'))}} </h4>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S1</th>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Month</th>
                                        <th>Advance</th>
                                        <th>Salary</th>
                                        <th>due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($alldataemploy as $key => $employee)
                                        <tr>
                                            <td>{{ $key +1  }}</td>
                                            <td>{{ $employee->id  }}</td>
                                            <td><img src="{{ asset($employee->image) }}"
                                                    style="width:50px;
                                            height:40px;"</td>
                                            <td>{{ $employee->name }}</td>
                                            <td><span
                                                    class="badge bg-info">{{ date('F', strtotime('-1 month')) }}</span>{{ $employee->month }}
                                            </td>
                                            <td>

                                                {{-- @if ($employee->advance)
                                                 {{ $employee->advance->Advance_salary }} --}}

                                                 @php
                                                    $total_advance = 0;
                                                     foreach ($employee->advance as $adv) {
                                                        if ($adv->Advance_salary) {
                                                            $total_advance = $adv->Advance_salary + $total_advance;
                                                        }
                                                     }
                                                 @endphp
                                                 {{$total_advance}}
                                            {{-- @else
                                                <p>0</p>
                                            @endif --}}

                                            </td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>
                                                @php
                                                $amount = 0;
                                                if ($total_advance && $employee->salary) {
                                                    $numericPrice = intval(str_replace(['$', ','], '', $employee->salary));
                                                    $amount = $numericPrice - $total_advance;
                                                }
                                                @endphp
                                                <strong style="color:#fff;">{{round($amount)}}</strong>
                                            </td>

                                            <td>
                                                @if(in_array($employee->id, $salaries))
                                                    <a class="btn btn-success rounded-pill waves-effect waves-light">Paid</a>
                                                @else
                                                    <a href="{{ route('pay.now', $employee->id) }}"
                                                        class="btn btn-blue rounded-pill waves-effect waves-light">Pay Now</a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->




        </div> <!-- container -->

    </div> <!-- content -->



    </div>
@endsection
