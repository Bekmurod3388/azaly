@extends('admin.master')
@section('content')

    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 100; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


    <div class="col-md-12">

        {{--  Xaridlar: ( index )--}}
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Xaridlar:</h2>
                            <p id="pbi"></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th> Kontragent</th>
                            <th> Omborxona</th>
                            <th> Umumiy Baxosi</th>
                            <th> Vaqti</th>

                            <th class="" style="width: 30%">Amallar</th>
                        </tr>
                        @foreach ($purchases as $key => $purchase)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @foreach($agent as $w)
                                        @if($w->id == $purchase->kontragent_id )
                                            {{ $w->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($ware as $w)
                                        @if($w->id == $purchase->warehouse_id )
                                            {{ $w->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $purchase->AllSum }}</td>
                                <td>{{ $purchase->created_at }}</td>

                                <td>
                                    @can('product-list')

                                        <a class="btn btn-info"
                                           href="{{ route('admin.return.index', ['id' => $purchase->id],) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="container">
                        <div class="row justify-content-center">
                            @if ($purchases->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $purchases->links() }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                <br><br><br>
            </div>
        </div>

        @include('admin.menu.maxsulotlar')


    </div>

@endsection




@section('script')

    @if(session('success'))
        <script>
            swal({
                icon: 'success',
                text: 'Muvaffaqqiyatli bajarildi',
                confirmButtonText: 'Continue',
            })
        </script>
    @endif

    <script>
        var modal_1 = document.getElementById("myModal_1");
        // var modal_1 = document.getElementById("myModal_1");
        var modal1_1 = document.getElementById("myModal1_1");
        var modal = document.getElementById("myModal");
        var modal1 = document.getElementById("myModal1"); /// Return
        var modal2 = document.getElementById("myModal2");
        var modal5 = document.getElementById("myModal5");

        var btn1 = document.getElementById("myBtn1");
        var btn = document.getElementById("myBtn");

        var span0 = document.getElementsByClassName("close")[0];
        var span01 = document.getElementsByClassName("close")[1];

        var products = @json($products);
        var product_all = @json($product_all);
        var purchases = @json($purchases);
        var product_log_all = @json($product_log_all);

        console.log(product_log_all);

        span0.onclick = function () {
            modal1.style.display = "none";
        }
        span01.onclick = function () {
            modal2.style.display = "none";
        }


        function edit(id) {

            for (let i = 0; i < products.length; i++) {
                if (id == products[i]['id']) {
                    $('#namee').val(products[i]['name']);
                    $('#codee').val(products[i]['code']);
                    $('#artikule').val(products[i]['artikul']);
                    $('#statuse').val(products[i]['status']);
                    $('#cotegory_ide').val(products[i]['category_id']);
                }
            }

            for (let i = 0; i < product_log_all.length; i++) {
                if (id == product_log_all[i]['product_id']) {
                    $('#counte').val(product_log_all[i]['count']);
                    $('#sum_camee').val(product_log_all[i]['sum_came']);
                    $('#sum_selle').val(product_log_all[i]['sum_sell']);
                    $('#sum_sell_optome').val(product_log_all[i]['sum_sell_optom']);
                    $('#count_sell_optome').val(product_log_all[i]['count_sell_optom']);
                    $('#kontragent_ide').val(product_log_all[i]['kontragent_id']);
                    $('#shelf_ide').val(product_log_all[i]['shelf_id']);
                }
            }
            // alert(id);

            $('#editForm').attr('action', '/admin/products/' + id);
            modal1.style.display = "block";
        }


        function show(id) {
            modal2.style.display = "block";

            for (let i = 0; i < products.length; i++) {
                if (id == products[i]['id']) {
                    $('#name1').text(products[i]['name']);
                    $('#code1').text(products[i]['code']);
                    $('#artikul1').text(products[i]['artikul']);
                    $('#status1').text(products[i]['status']);
                    $('#cotegory_id1').text(products[i]['category_id']);
                }
            }

            for (let i = 0; i < product_log_all.length; i++) {
                if (id == product_log_all[i]['product_id']) {
                    $('#count1').text(product_log_all[i]['count']);
                    $('#sum_came1').text(product_log_all[i]['sum_came']);
                    $('#sum_sell1').text(product_log_all[i]['sum_sell']);
                    $('#sum_sell_optom1').text(product_log_all[i]['sum_sell_optom']);
                    $('#count_sell_optom1').text(product_log_all[i]['count_sell_optom']);
                    $('#kontragent_id1').text(product_log_all[i]['kontragent_id']);
                    $('#shelf_id1').text(product_log_all[i]['shelf_id']);
                }
            }

        }


        function add(id) {
            $('#xarid_id').val(id);
            modal5.style.display = "block";
        }

        function  returnn( id ){

            modal1.style.display = "block";

            for (let i = 0; i < products.length; i++) {
                if (id == products[i]['id']) {
                    // console.log()
                    $('#product_id').val(products[i]['id']);
                }
            }
        }



        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal_1) {
                modal_1.style.display = "none";
            }
        }
    </script>


@endsection

