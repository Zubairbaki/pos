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
                            <h4 class="page-title">Datatables</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">All Advance Salary </h4>

                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S1</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Month</th>
                                            <th>Advance</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($alldataget as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($item->employee->image) }}"
                                                        style="width:50px;
                                                height:40px;"</td>
                                                <td>{{ $item['employee']['name'] }}</td>
                                                <td>{{ $item->month }}</td>
                                                <td>

                                                    @if ($item->Advance_salary)
                                                    {{ $item->Advance_salary }}
                                               @else
                                                   <p>0</p>
                                               @endif

                                                </td>
                                                <td>{{ $item['employee']['salary'] }}</td>

                                                <td><a href="{{ route('edit.advance.salary', $item->id) }}"
                                                        class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                                    <a href="{{ route('delete.salary', $item->id) }}"
                                                        class="btn btn-danger rounded-pill waves-effect waves-light"
                                                        id="delete">Delete</a>
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
