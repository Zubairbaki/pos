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
                                <a href="{{ route('add.permission') }}" class="btn btn-primary waves-effect waves-light">Add
                                    Permission</a>

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
                            <h4 class="header-title">All Permission </h4>
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
                                        <th>Permission Name</th>
                                        <th>Group Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($permission as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->group_name }}</td>

                                            <td><a href="{{ route('edit.permission', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                                <a href="{{ route('delete.permission', $item->id) }}"
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
