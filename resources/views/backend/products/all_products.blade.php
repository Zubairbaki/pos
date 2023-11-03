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
                                <a href="{{ route('add.product') }}" class="btn btn-blue rounded-pill waves-effect waves-light" style="margin-right: 10px;">Add Product</a>
                                <a href="{{ route('import.product') }}" class="btn btn-danger rounded-pill waves-effect waves-light" style="margin-right: 10px;">Import Xls</a>
                                <a href="{{ route('Export') }}" class="btn btn-warning rounded-pill waves-effect waves-light">Export Product</a>
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
                            <h4 class="header-title">All costomer </h4>
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
                                        <th>Catagory </th>
                                        <th>Supplier </th>
                                        <th>Code</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item->product_image) }}"
                                                    style="width:50px;
                                            height:40px;"</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->catagory->catagory_name }}</td>
                                            <td>{{ $item->supplier->name }}</td>
                                            <td>{{ $item->product_code }}</td>
                                            <td>{{ $item->selling_price }}</td>



                                            <td><a href="{{ route('edit.products', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light"> <i class="fe-edit-1"></i></a>
                                            <a href="{{ route('barcode.products', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-info"> <i class="fe-globe"></i></a>
                                                <a href="{{ route('delete.products', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete"><i class="fe-delete"></i></a>
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
