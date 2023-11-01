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
                                <a href="{{ route('add.costomer') }}" class="btn btn-primary waves-effect waves-light">Add
                                    Employs</a>

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
                            <h4 class="header-title">All Supplier </h4>
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($allsupplier as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><img src="{{ asset($item->image) }}"
                                                    style="width:50px;
                                            height:40px;"</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->type }}</td>

                                            <td><a href="{{ route('edit.supplier', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                                <a href="{{ route('delet.supplier', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a>
                                                <a href="#"
                                                    class="btn btn-success rounded-pill waves-effect waves-light"
                                                    id="" data-bs-toggle="modal"
                                                    data-bs-target="#modal_{{ $item->id }}">Details</a>
                                                {{-- <a href="{{ route('details.supplier', $item->id) }}"
                                                        class="btn btn-success rounded-pill waves-effect waves-light"
                                                        id="">Details</a> --}}
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

            @foreach ($allsupplier as $key => $item)
            {{-- <h1>{{$item->id}}</h1> --}}
                <div class="modal fade" id="modal_{{ $item->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12 col-xl-12">



                                    {{-- <form method="POST" enctype="multipart/form-data">
                                        @csrf --}}
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Supplier
                                            Details
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Supplier Name</label>
                                                    <p class="text-danger">{{ $item->name }}</p>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier email</label>
                                                    <p class="text-danger">{{ $item->email }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier phone</label>
                                                    <p class="text-danger">{{ $item->phone }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier address</label>
                                                    <p class="text-danger">{{ $item->address }}</p>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label"> Supplier shopname</label>
                                                    <p class="text-danger">{{ $item->shopname }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier
                                                        account_holder</label>
                                                    <p class="text-danger">{{ $item->account_holder }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier
                                                        account_number</label>
                                                    <p class="text-danger">{{ $item->account_number }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier type</label>

                                                    <p class="text-danger">{{ $item->type }}</p>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier bank_name</label>
                                                    <p class="text-danger">{{ $item->bank_name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier bank_branch</label>
                                                    <p class="text-danger">{{ $item->bank_branch }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier city</label>
                                                    <p class="text-danger">{{ $item->city }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Supplier Image</label>
                                                    <p class="text-danger">{{ $item->Image }}</p>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <img id="showImage" src="{{ asset($item->image) }}"
                                                            class="rounded-circle avatar-lg img-thumbnail"
                                                            alt="profile-image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    {{-- </form> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> <!-- container -->

    </div> <!-- content -->



    </div>
@endsection
