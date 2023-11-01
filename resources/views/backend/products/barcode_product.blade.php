@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Bar Code Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">





                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Product Code</label>
                            <h3>{{ $product->product_code }}</h3>

                        </div>
                    </div> <!-- end row -->

                    @php

                        $generator =  new \Picqer\Barcode\BarcodeGeneratorHTML();
                    @endphp

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Product Barcode</label>
                                <h3>{!! $generator->getBarcode($product->product_code, $generator::TYPE_CODE_128) !!}</h3>


                            </div>
                        </div> <!-- end row -->



                    </div>
                    <!-- end settings content-->


                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->



    </div> <!-- content -->
@endsection
