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
                        </div>
                        <div class="pull-right">
                            @can('product-create')
                                {{--                                <a class="btn btn-success" href="{{ route('admin.purchases.create') }}"> Qo'shish </a>--}}
                                <input type="hidden" id="hidden_input" value="0">
                                <button class="btn btn-success" id="myBtn1"> Qo'shish</button>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th> Omborxona</th>
                            <th> Kontragent</th>
                            <th> Umumiy Baxosi</th>
                            <th> Vaqti</th>

                            <th class="w-25">Amallar</th>
                        </tr>
                        @foreach ($purchases as $key => $purchase)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @foreach($ware as $w)
                                        @if($w->id == $purchase->warehouse_id )
                                            {{ $w->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($agent as $w)
                                        @if($w->id == $purchase->kontragent_id )
                                            {{ $w->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $purchase->AllSum }}</td>
                                <td>{{ $purchase->created_at }}</td>

                                <td>
                                    @can('product-list')

                                        <a class="btn btn-info"
                                           href="{{ route('admin.purchases.index', ['id' => $purchase->id],) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{--                                        <button class="btn btn-warning" onclick="fayzullo({{$purchase->id}},{{$purchase->warehouse_id}})"><i--}}
                                        {{--                                                class="fa fa-eye"></i>--}}
                                        {{--                                        </button>--}}
                                    @endcan
                                    @can('product-edit')

                                        {{--                                        <a class="btn btn-warning"--}}
                                        {{--                                           href="{{ route('admin.purchases.edit',$purchase->id) }}">--}}
                                        {{--                                            <i class="fa fa-pen"></i>--}}
                                        {{--                                        </a>--}}
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
                    <span class="close">&times;</span>
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
{{--                            {{route('admin.purchases.update',$pur->id )}}--}}
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


        {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

        {{--  Mahsulotlar: ( index )--}}
        @if($layout == 'index')
            <div id="show_table" class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Mahsulotlar: </h2>
                            </div>
                            <div class="pull-right">
                                @can('category-create')
                                    {{--  <a class="btn btn-success" href="{{ route('admin.sizes.create') }}"> Create New Size</a>--}}
                                    <input type="hidden" id="hidden_input" value="0">
                                    <button class="btn btn-success" id="myBtn"> Qo'shish</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Nomi</th>
                                <th>Tokcha</th>
                                <th>Kotegoriya</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            @foreach ($products as $key => $p)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $p->name }}</td>

                                    <td>
                                        @foreach($shelfs as $cat)
                                            @if( $p->shelf_id == $cat->id )
                                                {{ $cat->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($cotegory as $cat)
                                            @if( $p->category_id == $cat->id )
                                                {{ $cat->name }}
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        {{--                                                                                    @can('category-list')--}}

                                        {{--                                                <a class="btn btn-info"--}}
                                        {{--                                                   href="{{ route('admin.products.show',$p->id) }}">--}}
                                        {{--                                                    <i class="fa fa-eye"></i>--}}
                                        {{--                                                </a>--}}
                                        {{--                                            @endcan--}}

                                        <button class="btn btn-info" onclick="show({{$p->id}})">
                                            <i class="fa fa-eye"> </i>
                                        </button>

                                        @can('size-edit')
                                            {{--                                              <a class="btn btn-warning" href="{{ route('admin.products.edit',$p->id) }}">--}}
                                            {{--                                                    <i class="fa fa-pen"></i>--}}
                                            {{--                                                </a>--}}
                                            <button class="btn btn-warning" onclick="edit({{$p->id}})">
                                                <i class="fa fa-pen"> </i>
                                            </button>
                                        @endcan

                                                                              @can('product-delete')
                                                                                {!! Form::open(['method' => 'DELETE','route' => ['admin.products.destroy', $p->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                data-toggle="tooltip">
                                            <span class="btn-label">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </button>
                                        {!! Form::close()!!}
                                    @endcan

                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <!-- The Modal -->
        <div class="form">

            {{--Create--}}
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        @can('size-create')
                                            <h2> Qo'shish </h2>
                                        @endcan
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.products.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nomi:</strong>
                                            <input type="text" name="name" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Kod:</strong>
                                            <input type="number" name="code" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Artikul:</strong>
                                            <input type="text" name="artikul" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <input type="text" name="status" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Foiz:</strong>
                                            <input type="number" name="percent" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Soni:</strong>
                                            <input type="number" name="count" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Kelgan bahosi:</strong>
                                            <input type="number" name="sum_came" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Dona sotish bahosi:</strong>
                                            <input type="number" name="sum_sell" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Optom sotish bahosi:</strong>
                                            <input type="number" name="sum_sell_optom" class="form-control mb-3">
                                        </div>


                                        <div class="form-group">
                                            <input type="hidden" name="purchase_id" id="purchase_id1"
                                                   class="form-control mb-3" value="{{ $idd }}">
                                        </div>

                                        <div class="form-group">
                                            <strong> Kotegoriya: </strong>
                                            <select name="category_id" id="building"
                                                    class="form-select form-control"
                                                    required>
                                                <option value=""> Kotegoriya tanglang</option>
                                                @foreach($cotegory as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <strong> Tokcha tanlang: </strong>
                                            <select name="shelf_id" id="shelf_id" class="form-select form-control"
                                                    required>
                                                <option value=""> Tokcha tanlang</option>
                                                @foreach($shelfs as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
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
            {{--Edit--}}
            <div id="myModal1" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Mahsulotni tahrirlash </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="editForm">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">
                                            <input type="hidden" name="purchase_id" id="purchase_id1"
                                                   class="form-control mb-3" value="{{ $idd }}">
                                        </div>

                                        <div class="form-group">
                                            <strong>Nomi:</strong>
                                            <input type="text" name="name" id="name" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Kod:</strong>
                                            <input type="number" name="code" id="cod" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Artikul:</strong>
                                            <input type="text" name="artikul" id="artikul"
                                                   class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <input type="text" name="status" id="status" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Foiz:</strong>
                                            <input type="number" name="percent" id="percent"
                                                   class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Soni:</strong>
                                            <input type="number" name="count" id="count" class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Kelgan bahosi:</strong>
                                            <input type="number" name="sum_came" id="sum_came"
                                                   class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Dona sotish bahosi:</strong>
                                            <input type="number" name="sum_sell" id="sum_sell"
                                                   class="form-control mb-3">
                                        </div>

                                        <div class="form-group">
                                            <strong>Optom sotish bahosi:</strong>
                                            <input type="number" name="sum_sell_optom" id="sum_sell_optom"
                                                   class="form-control mb-3">
                                        </div>




                                        <div class="form-group">
                                            <strong> Kotegoriya: </strong>
                                            <select name="category_id" required id="kontragent_id"
                                                    class="form-select form-control"
                                                    required>
                                                <option> Kotegoriyani tanlang</option>
                                                @foreach($cotegory as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <strong> Tokcha tanlang: </strong>
                                            <select name="shelf_id" required id="shelf_id"
                                                    class="form-select form-control"
                                                    required>
                                                @foreach($shelfs as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
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
            {{--Show--}}
            <div id="myModal2" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Mahsulot </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <strong>Nom:</strong>
                                        <p id="name1"></p>
                                    </div>
                                    <div class="form-group">
                                        <strong>Kod:</strong>
                                        <p id="code1"></p>
                                    </div>
                                    <div class="form-group">
                                        <strong>Artikul:</strong>
                                        <p id="artikul1"></p>
                                    </div>
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        <p id="status1"></p>
                                    </div>
                                    <div class="form-group">
                                        <strong>Foiz:</strong>
                                        <p id="percent1"></p>

                                    </div>
                                    <div class="form-group">
                                        <strong>Soni:</strong>
                                        <p id="count1"></p>
                                    </div>

                                    {{--                                                                                                    <div class="form-group">--}}
                                    {{--                                                                                                        <strong> Kategoriya :</strong>--}}
                                    {{--                                                                                                        <p id="kontragent_id1"></p>--}}

                                    {{--                                                                                                        {{ $product->category->name }}--}}
                                    {{--                                                                                                    </div>--}}

                                    {{--                                                                                                    <div class="form-group">--}}
                                    {{--                                                                                                        <strong> Tokcha :</strong>--}}
                                    {{--                                                                                                        @foreach($shelfs as $cat)--}}
                                    {{--                                                                                                            @if( $product->shelf_id == $cat->id )--}}
                                    {{--                                                                                                                {{ $cat->name }}--}}
                                    {{--                                                                                                            @endif--}}
                                    {{--                                                                                                        @endforeach--}}
                                    {{--                                                                                                    </div>--}}

                                    <div class="form-group">
                                        <strong>Kelgan bahosi:</strong>
                                        <p id="sum_came1"></p>
                                        {{--                                                                {{ $product->sum_came }}--}}
                                    </div>
                                    <div class="form-group">
                                        <strong>Dona sotish bahosi:</strong>
                                        <p id="sum_sell1"></p>
                                        {{--                                                                {{ $product->sum_sell }}--}}
                                    </div>
                                    <div class="form-group">
                                        <strong>Optom sotish bahosi:</strong>
                                        <p id="sum_sell_optom1"></p>
                                        {{--                                                                {{ $product->sum_sell_optom }}--}}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


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
        var modal = document.getElementById("myModal");
        var modal_1 = document.getElementById("myModal_1");
        var modal1 = document.getElementById("myModal1");
        var modal1_1 = document.getElementById("myModal1_1");
        var modal2 = document.getElementById("myModal2");

        var btn = document.getElementById("myBtn");
        var btn1 = document.getElementById("myBtn1");

        var span = document.getElementsByClassName("close")[2];
        var span1 = document.getElementsByClassName("close")[3];
        var span2 = document.getElementsByClassName("close")[4];
        var span_1 = document.getElementsByClassName("close")[0];
        var span1_1 = document.getElementsByClassName("close")[1];
        var products = @json($products);
        var purchases = @json($purchases);

        // console.log(products);

        console.log(btn)
        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        btn1.onclick = function () {
            modal_1.style.display = "block";
        }

        function edit(id) {
            // alert(id);
            for (let i = 0; i < products.length; i++) {
                if (id == products[i]['id']) {
                    $('#name').val(products[i]['name']);
                    $('#cod').val(products[i]['code']);
                    $('#artikul').val(products[i]['artikul']);
                    $('#status').val(products[i]['status']);
                    $('#percent').val(products[i]['percent']);
                    $('#count').val(products[i]['count']);
                    $('#sum_came').val(products[i]['sum_came']);
                    $('#sum_sell').val(products[i]['sum_sell']);
                    $('#sum_sell_optom').val(products[i]['sum_sell_optom']);
                    $('#sum_sell_optom').val(products[i]['sum_sell_optom']);
                    $('#kontragent_id').val(products[i]['category_id']);
                    $('#shelf_id').val(products[i]['shelf_id']);
                    break;
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
            for (let i = 0; i < products.length; i++) {
                if (id == products[i]['id']) {
                    $('#name1').text(products[i]['name']);
                    $('#code1').text(products[i]['code']);
                    $('#artikul1').text(products[i]['artikul']);
                    $('#status1').text(products[i]['status']);
                    $('#percent1').text(products[i]['percent']);
                    $('#count1').text(products[i]['count']);
                    $('#sum_came1').text(products[i]['sum_came']);
                    $('#sum_sell1').text(products[i]['sum_sell']);
                    $('#sum_sell_optom1').text(products[i]['sum_sell_optom']);
                    $('#sum_sell_optom1').text(products[i]['sum_sell_optom']);
                    $('#kontragent_id1').text(products[i]['kontragent_id']);
                    $('#shelf_id1').text(products[i]['shelf_id']);
                    break;
                }
            }
            // $('#editForm').attr('action', '/admin/products/' + id);
            modal2.style.display = "block";
        }



        {{--function fayzullo(id, omborid) {--}}

        {{--    document.getElementById("hidden_input").value=id;--}}
        {{--    console.log(document.getElementById("hidden_input").value)--}}
        {{--    //table ga qiymat barib chiqasan qaysiki purchase_id==id table row--}}
        {{--    document.getElementById("purchase_id1").value=document.getElementById("hidden_input").value;--}}


        {{--    let rooms = @json($shelfs);--}}
        {{--    console.log(rooms);--}}
        {{--    // $('#floor').on('change', function () {--}}
        {{--    //     var room_id = $(this).val();--}}
        {{--        $('#shelf_id').empty();--}}
        {{--        $('#shelf_id').append("<option value='none'>Tokchani tanlang</option>")--}}
        {{--        for (let i = 0; i < rooms.length; i++) {--}}
        {{--            if (omborid == rooms[i].warehouse_id) {--}}
        {{--                var option = document.createElement("option");   // Create with DOM--}}
        {{--                option.innerHTML = rooms[i].name;--}}
        {{--                option.value = rooms[i].id;--}}
        {{--                $('#shelf_id').append(option);--}}
        // });

        //     document.getElementById('show_table').style.display="block";
        //
        //
        //     $('#editForm').attr('action', '/admin/sizes/' + id);
        //     modal1.style.display = "block";
        // }


        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
        span1.onclick = function () {
            modal1.style.display = "none";
        }
        span2.onclick = function () {
            modal2.style.display = "none";
        }
        span_1.onclick = function () {
            modal_1.style.display = "none";
        }
        span1_1.onclick = function () {
            modal1_1.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal) {
                modal.style.display = "none";
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

{{--    <script>--}}

{{--        let errors = @json($errors->all());--}}
{{--        @if($errors->any())--}}
{{--        console.log(errors);--}}

{{--        let msg = '';--}}
{{--        for (let i = 0; i < errors.length; i++) {--}}
{{--            msg += (i + 1) + '-xatolik ' + errors[i] + '\n';--}}
{{--            // msg += errors[i] + '\n';--}}
{{--        }--}}
{{--        console.log(msg);--}}
{{--        if (msg != '') {--}}
{{--            swal({--}}
{{--                icon: 'error',--}}
{{--                title: 'Xatolik',--}}
{{--                text: msg,--}}
{{--                confirmButtonText: 'Continue',--}}
{{--            })--}}
{{--        }--}}
{{--        @endif--}}


{{--    </script>--}}

@endsection

