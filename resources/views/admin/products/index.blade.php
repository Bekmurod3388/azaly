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
                                    {{ $purchase->agentlar->name }}
                                </td>
                                <td>
                                    {{ $purchase->omborlar->name}}
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

                                    <button class="btn btn-primary" onclick="add({{ $purchase->id }})">
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
            <div id="purchase_create" class="modal">
                <div class="modal-content">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <span class="btn" onclick="och1()"><b>X</b></span>
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
        var purchase_create = document.getElementById("purchase_create");
        var product_create = document.getElementById("product_create");
        var baxo = document.getElementById("baxo");
        var product_show = document.getElementById("product_show");
        var product_edit = document.getElementById("product_edit");


        var btn1 = document.getElementById("myBtn1");
        var btn = document.getElementById("myBtn");
        // var btn6 = document.getElementById("myBtn6");

        btn1.onclick = function () {
            purchase_create.style.display = "block";
        }
        btn.onclick = function () {
            product_create.style.display = "block";
        }
        // btn6.onclick = function () {
        //     modal6.style.display = "block";
        // }


        function och1() {
            purchase_create.style.display = "none";
            product_create.style.display = "none";
            baxo.style.display = "none";
            product_show.style.display = "none";
            product_edit.style.display = "none";

        }

        var products = @json($products);
        var product_all = @json($product_all);
        var purchases = @json($purchases);
        var product_log_all = @json($product_log_all);
        {{--var korish = @json($product_log_all);--}}


        function edit(id) {
            for (let i = 0; i < product_all.length; i++) {
                if (id == product_all[i]['id']) {
                    $('#namee').val(product_all[i]['name']);
                    $('#codee').val(product_all[i]['code']);
                    $('#artikule').val(product_all[i]['artikul']);
                    $('#statuse').val(product_all[i]['status']);
                    $('#sum_selle').val(product_all[i]['sum_sell']);
                    $('#sum_sell_optome').val(product_all[i]['sum_sell_optom']);
                    $('#count_sell_optome').val(product_all[i]['count_sell_optom']);
                    $('#cotegory_ide').val(product_all[i]['category_id']);
                }
            }

            for (let i = 0; i < product_log_all.length; i++) {
                if (id == product_log_all[i]['product_id']) {
                    $('#counte').val(product_log_all[i]['count']);
                    $('#sum_camee').val(product_log_all[i]['sum_came']);
                    $('#kontragent_ide').val(product_log_all[i]['kontragent_id']);
                    $('#shelf_ide').val(product_log_all[i]['shelf_id']);
                }
            }
            $('#editForm').attr('action', '/admin/products/' + id);
            product_edit.style.display = "block";

        }

        function show(id) {

            for (let i = 0; i < product_all.length; i++) {
                if (id == product_all[i]['id']) {
                    $('#name1').text(products[i]['name']);
                    $('#code1').text(products[i]['code']);
                    $('#artikul1').text(products[i]['artikul']);
                    $('#status1').text(products[i]['status']);
                    $('#sum_sell1').text(products[i]['sum_sell']);
                    $('#sum_sell_optom1').text(products[i]['sum_sell_optom']);
                    $('#count_sell_optom1').text(products[i]['count_sell_optom']);
                    $('#cotegory_id1').text(products[i]['category_id']);
                    alert(id)
                }
            }

            for (let i = 0; i < product_log_all.length; i++) {
                if (id == product_log_all[i]['product_id']) {
                    $('#count1').text(product_log_all[i]['count']);
                    $('#sum_came1').text(product_log_all[i]['sum_came']);
                    $('#kontragent_id1').text(product_log_all[i]['kontragent_id']);
                    $('#shelf_id1').text(product_log_all[i]['shelf_id']);
                }
            }
            product_show.style.display = "block";
        }

        function add(id) {
            $('#xarid_id').val(id);
            baxo.style.display = "block";
        }

        function kochir() {
            alert('dcsdvvr')
            modal6.style.display = "block";
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
            if (event.target == purchase_create) {
                prchase_create.style.display = "none";
            }
            if (event.target == product_create) {
                product_create.style.display = "none";
            }
            if (event.target == baxo) {
                baxo.style.display = "none";
            }
            if (event.target == product_show) {
                product_show.style.display = "none";
            }
            if (event.target == product_edit) {
                product_edit.style.display = "none";
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

