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
                            <h4 class="header-title"> Pending Due </h4>
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
                                        <th>Order Date</th>
                                        <th>Payment</th>
                                        <th>Invoice</th>
                                        <th>Pay</th>
                                        <th>Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($alldata as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item->Customer->image) }}"
                                                    style="width:50px;
                                            height:40px;"</td>
                                            <td>{{ $item->Customer->name }}</td>
                                            <td>{{ $item->order_date }}</td>
                                            <td>{{ $item->payment_status }}</td>
                                            <td>{{ $item->invoice_number }}</td>
                                            <td>{{ $item->pay }}</td>
                                            <td> <span class="btn btn-warning waves-effect waves-light">{{ round($item->due)}} </span> </td>

                                            <td><a href="{{ route('order.details', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light"> Details</a>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#signup-modal"  id="{{$item->id}}" onclick="orderDue(this.id)">
                                                   Pay due</button>

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

    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">

                    <form class="px-3" action="{{route('update.due')}}" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="order_id">
                        <input type="hidden" name="pay" id="pay">


                        <div class="mb-3">
                            <label for="username" class="form-label">Pay Now</label>
                            <input class="form-control" type="test" name="due" id="due"
                               >
                        </div>










                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Update due</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">

    function orderDue(id){
        $.ajax(
            {
                type: 'GET',
                url:'/order/due/'+id,
                datatype:'json',
                success:function(data){
                    // console.log(data)
                    $('#due').val(data.due);
                    $('#pay').val(data.pay);
                    $('#order_id').val(data.id);
                }
            }
        )
    }
    </script>
@endsection
