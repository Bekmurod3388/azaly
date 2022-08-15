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

        {{--Index--}}

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull">
                    <h2> Omborxonalar </h2>
                </div>
                <div class="pull-right">
                    @can('category-create')
                        <button onclick="store()" class="btn btn-success btn-lg">
                            <i class="bi bi-plus-lg"></i>
                            Qo'shish
                        </button>
                    @endcan
                </div>
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('admin.home') }}"> Orqaga </a>
                </div>
            </div>

            <hr>
            <table class="table table-bordered table-hover">
                <tr>
                    <th class="col-1 text-center">T/R</th>
                    <th class="col-3 text-center ">Ombor1</th>
                    <th class="col-3 text-center ">Ombor2</th>
                    <th class="col-3 text-center ">Amallar</th>

                </tr>
                @foreach ($moves as $key => $agent)
                    <tr>
                        <td class="col-1 text-center "><b>{{ $key+1 }}</b></td>
                        <td class="col-3 text-center ">{{ $agent->omborxona1->name }}</td>
                        <td class="col-3 text-center ">{{ $agent->omborxona2->name }}</td>
                        <td class="col-3 text-center ">

                            <a class="btn btn-info"
                               href="{{route('admin.moves.index', [ 'id' => $agent->ombor1_id, 'move_id'=>$agent->id ])}}">
                                <i class="fa fa-eye"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </table>
            {{--            <div class="container">--}}
            {{--                <div class="row justify-content-center">--}}
            {{--                    @if ($kochirish->links())--}}
            {{--                        <div class="mt-4 p-4 box has-text-centered">--}}
            {{--                            {{ $kochirish->links() }}--}}
            {{--                        </div>--}}
            {{--                    @endif--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>


        {{--Create--}}
        <div id="move_create" class="modal">
            <div class="modal-content">
                <div class="container p-1 border">
                    <form action="{{route('admin.moves.store')}}" method="post">
                        <span class=" btn " onclick="och()"><b>X</b></span>
                        @csrf

                        <div class="form-group">
                            <label for="name">
                                Omborxonalar
                            </label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <select name="ombor1_id" required id="building"
                                            class="form-select form-control"
                                            required>
                                        <option value=""> Qayerdan</option>
                                        @foreach($warehouses as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <select name="ombor2_id" required id="building"
                                            class="form-select form-control"
                                            required>
                                        <option value=""> Qayerga</option>
                                        @foreach($warehouses as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Saqlash">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- //////////////////////////////////////////   Maxsulotlar    /////////////////////////////////////////////////////// --}}


        {{--Index--}}
        <!-- The Modal -->
        <div class="form">

            @if($layout == 'index')
                <div id="show_table" class="card hidden">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2> Mahsulotlar: </h2>
                                </div>
                                <div class="pull-right">
                                    @can('category-create')
                                        <input type="hidden" id="hidden_input" value="0">
                                        <button class="btn btn-success" id="myBtn" onclick="store1()">Qo'shish</button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>TR</th>
                                    <th>ID</th>
                                    <th>Nomi</th>
                                    <th>Soni</th>
                                    <th class="w-25">Amallar</th>
                                </tr>
                                @if($kochganlar!=null)
                                    @foreach($kochganlar as $k=>$p )
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$p->product_id}}</td>
                                            <td>{{$p->maxsulot->name}}</td>
                                            <td>{{$p->count}}</td>
                                        </tr>
                                    @endforeach
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            @endif


            {{--Create--}}
            <div id="move_product_create" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <span class="btn" onclick="och()"><b>X</b></span>
                                        @can('size-create')
                                            <h2> Qo'shish </h2>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.move_logs.store',['move_id'=>$move_id ])}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <select id="oddiy4" style="width: 85%;"
                                                    name="product_id" required>
                                                <option value="0" selected> Tanlang</option>
                                                @if($products!=null)
                                                    @foreach( $products as $c)
                                                        <option
                                                            value="{{$c->id}}"> {{$c->name}} </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <strong>Soni:</strong>
                                            <input type="number" name="count" id="count" class="form-control mb-3">
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
        let errors = @json($errors->all());
        @if($errors->any())
        console.log(errors);

        let msg = '';
        for (let i = 0; i < errors.length; i++) {
            msg += (i + 1) + '-xatolik ' + errors[i] + '\n';
        }
        console.log(msg);
        if (msg != '') {
            swal({
                icon: 'error',
                title: 'Xatolik',
                text: msg,
                confirmButtonText: 'Continue',
            })
        }
        @endif
    </script>

    {{--    Delete--}}
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

    <script>

        var create_modal = document.getElementById("move_product_create");
        var move_create = document.getElementById("move_create");


        // When the user clicks the button, open the modal
        function store() {
            move_create.style.display = "block";
        }

        function store1() {
            create_modal.style.display = "block";
        }


        function och() {
            create_modal.style.display = "none";
            move_create.style.display = "none";
        }


        var kochirish =@json($moves);

        function show(id) {
            modal2.style.display = "block";
            for (let i = 0; i < kochirish.length; i++) {
                if (id == kochirish[i]['id']) {
                    $('#name1').text(kochirish[i]['ombor1']);
                    $('#code1').text(kochirish[i]['ombor2']);
                }
            }
        }


        window.onclick = function (event) {
            if (event.target == create_modal) {
                create_modal.style.display = "none";
            }
            if (event.target == move_create) {
                move_create.style.display = "none";
            }
        }
    </script>
@endsection
