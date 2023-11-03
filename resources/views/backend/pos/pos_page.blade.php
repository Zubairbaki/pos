@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pos</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-6">
                <div class="card text-center">
                    <div class="card-body">


                    </div>
                </div> <!-- end card -->

            </div> <!-- end col-->

            <div class="col-lg-6 col-xl-6">

                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>S1</th>
                            <th>Image</th>
                            <th>Name</th>

                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($product as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><img src="{{ asset($item->product_image) }}"
                                        style="width:50px;
                                height:40px;"</td>
                                <td>{{ $item->product_name }}</td>
                                  <td></td>




                                  <td>
                                    <button type="submit" style='font-size:20px; color:#000;'>
                                        <i class="fas fa-plus-square"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>




        </div>
    </div> <!-- end card-->

    </div> <!-- end col -->
    </div>
    <!-- end row-->



    </div> <!-- content -->
@endsection
