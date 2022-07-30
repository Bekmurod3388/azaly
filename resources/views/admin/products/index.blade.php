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
                        <div class="pull">
                            <h2>Xaridlar</h2>
                            <p id="pbi"></p>
                        </div>
                        <div class="pull-right">
                            @can('product-create')
                                <input type="hidden" id="hidden_input" value="0">
                                <button class="btn btn-success" id="myBtn1"> Qo'shish</button>
                            @endcan
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('admin.home') }}"> Orqaga </a>
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
                                    {{ $purchase->omborlar->name}}
                                </td>
                                <td>
                                    {{ $purchase->agentlar->id }}
                                </td>
                                <td>{{ $purchase->AllSum }}</td>
                                <td>{{ $purchase->created_at }}</td>

                                <td>
                                    @can('product-list')

                                        <a class="btn btn-info"
                                           href="{{ route('admin.purchases.index', ['id' => $purchase->id],) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    @endcan
                                    @can('product-edit')

                                        <button class="btn btn-warning" onclick="edit_1({{$purchase->id}})">
                                            <i class="fa fa-pen"> </i>
                                        </button>

                                    @endcan
                                    @can('product-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.purchases.destroy', $purchase->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                data-toggle="tooltip">
                                            <span class="btn-label">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                    <button class="btn btn-info" onclick="add({{ $purchase->id }})">
                                        <i class="fa fa-plus"></i>
                                    </button>

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


        <!-- The Modal -->
        <div class="form">

            {{--Create--}}
            <div id="myModal_1" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" id="get">&times;</span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Yangi xarid qo'shing </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.purchases.store')}}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="building"> Omborxona </label>
                                            <select name="warehouse_id" required id="warehouse"
                                                    class="form-select form-control"
                                                    required>
                                                <option value=""> Omborxona tanlang</option>
                                                @foreach( $ware as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong> Kontragent: </strong>
                                            <select name="kontragent_id" required id="building"
                                                    class="form-select form-control"
                                                    required>
                                                <option value=""> Kontragent tanlang</option>
                                                @foreach($agent as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Saqlash</button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            {{--Edit--}}
            <div id="myModal1_1" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Tahrirlash </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="" method="post" id="editForm_1">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Omborxona:</strong>
                                            <select name="warehouse_id" required id="warehouse"
                                                    class="form-select form-control"
                                                    required>
                                                @foreach($ware as $w)
                                                    <option value="{{$w->id}}">{{$w->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Saqlash</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        {{--Products Modal --}}
        @include('admin.products.maxsulotlar')


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
        var modal1 = document.getElementById("myModal1");
        var modal2 = document.getElementById("myModal2");
        var modal5 = document.getElementById("myModal5");

        var btn1 = document.getElementById("myBtn1");
        var btn = document.getElementById("myBtn");

        var span0 = document.getElementsByClassName("close")[0];
        // var span0 = document.getElementById("get");
        var span01 = document.getElementsByClassName("close")[1];
        var span = document.getElementsByClassName("close")[2];
        var span1 = document.getElementsByClassName("close")[3];
        var span2 = document.getElementsByClassName("close")[4];
        var span5 = document.getElementsByClassName("close")[5];


        span0.onclick = function () {
            modal_1.style.display = "none";
        }
        span01.onclick = function () {
            modal1_1.style.display = "none";
        }
        span.onclick = function () {
            modal.style.display = "none";
        }
        span1.onclick = function () {
            modal1.style.display = "none";
        }
        span2.onclick = function () {
            modal2.style.display = "none";
        }
        span5.onclick = function () {
            modal5.style.display = "none";
        }


        var products = @json($products);
        var product_all = @json($product_all);
        var purchases = @json($purchases);
        var product_log_all = @json($product_log_all);

        console.log(product_log_all);

        console.log(btn)
        // When the user clicks the button, open the modal
        btn1.onclick = function () {
            modal_1.style.display = "block";
        }
        btn.onclick = function () {
            modal.style.display = "block";
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

        function edit_1(id) {
            // alert(id);
            for (let i = 0; i < purchases.length; i++) {
                if (id == purchases[i]['id']) {
                    $('#warehouse_id').val(products[i]['warehouse_id']);
                    break;
                }
            }
            // alert(id);

            $('#editForm_1').attr('action', '/admin/purchases/' + id);
            modal1_1.style.display = "block";
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

        function izlash() {
            let product_id = document.getElementById('pro_id').value;

            let a = 0;

            for (let i = 0; i < product_all.length; i++) {

                if (product_id == product_all[i]['id']) {
                    $('#name').val(product_all[i]['name']);
                    $('#code').val(product_all[i]['code']);
                    // $('#pbi').val(product_all[i]['name']+' matn');
                    $('#artikull').val(product_all[i]['artikul']);
                    $('#status').val(product_all[i]['status']);
                    // $('#percent').text("Oldingi kelgan foizi: " + product_all[i]['percent']);
                    // $('#count').text("Oldingi kelgan soni:" + product_all[i]['count']);
                    // $('#kelgan').text("Oldingi kelgan bahosi:" + product_all[i]['sum_came']);
                    // $('#dona').text("Oldingi dona sotish bahosi:" + product_all[i]['sum_sell']);
                    // $('#optom').text("Oldingi optom sotish bahosi:" + product_all[i]['sum_sell_optom']);
                    $('#category_id').val(product_all[i]['category_id']);
                    $('#kontragent_id').val(product_all[i]['kontragent_id']);
                    $('#shelf_idd').val(product_all[i]['shelf_id']);
                    a = 0;
                    break;
                } else {
                    a = 1;
                }
            }

            if (a) {
                swal({
                    title: `Bunday maxsulot hali sizda mavjud emas..`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    buttons: [, 'OK']

                });
            }


        }


        function optom1() {
            var optom = document.getElementById("optom").value;
        }

        // When the user clicks on <span> (x), close the modal


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

    <script>
        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,
                text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ['Yo`q', 'Ha']
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

@endsection

