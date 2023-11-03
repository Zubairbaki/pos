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
                                <a href="{{ route('add.expense') }}" class="btn btn-primary waves-effect waves-light">Add
                                    Expense</a>

                            </ol>
                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @php
            $Year=date('Y');
            $Yearmonth= App\Models\Expense::where('Year',$Year)->sum('amount');
        @endphp

            <div class="row">
                <div class="col-12">
                    <div class="card">



                        <div class="card-body">
                            <h4 class="header-title">Year Expense </h4>
                            <h4> Total : ${{$Yearmonth}}

                            </h4>
                            <p class="text-muted font-13 mb-4">
                                DataTables has most features enabled by default, so all you need to do to use it with your
                                own tables is to call the construction
                                function:
                                <code>$().DataTable();</code>.
                            </p>



                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S1</th>

                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Month</th>
                                        <th>Year</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($yearexpense as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->month }}</td>
                                            <td>{{ $item->year }}</td>



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
