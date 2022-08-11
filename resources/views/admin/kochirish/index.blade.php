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
        <div class="card">
            {{--Index--}}
            <div class="card-header">
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
                </div>
                <hr>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="col-1 text-center">T/R</th>
                        <th class="col-3 text-center ">Ombor1</th>
                        <th class="col-3 text-center ">Ombor2</th>
                        <th class="col-3 text-center ">Amallar</th>

                    </tr>
                    @foreach ($kochirish as $key => $agent)
                        <tr>
                            <td class="col-1 text-center "><b>{{ $key+1 }}</b></td>
                            <td class="col-3 text-center ">{{ $agent->omborxona1->name }}</td>
                            <td class="col-3 text-center ">{{ $agent->omborxona2->name }}</td>
                            <td class="col-3 text-center ">

                                <a class="btn btn-info"
                                   href="{{route('admin.moves.index', ['id' => $agent->ombor1_id],)}}">
                                    <i class="fa fa-eye"></i>
                                </a>

{{--                                @can('product-delete')--}}
{{--                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.moves.destroy', $agent->id],'style'=>'display:inline']) !!}--}}
{{--                                    <button type="submit" class="btn btn-danger btn-flat show_confirm"--}}
{{--                                            data-toggle="tooltip">--}}
{{--                                            <span class="btn-label">--}}
{{--                                                <i class="fa fa-trash"></i>--}}
{{--                                            </span>--}}
{{--                                    </button>--}}
{{--                                    {!! Form::close() !!}--}}
{{--                                @endcan--}}

                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="container">
                    <div class="row justify-content-center">
                        @if ($kochirish->links())
                            <div class="mt-4 p-4 box has-text-centered">
                                {{ $kochirish->links() }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>


            <!-- The Modal -->
            {{--Create--}}
            <div class="card-body">
                <div id="create" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="container p-1 border">
                            <form action="{{route('admin.moves.store')}}" method="post">
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
                                                @foreach($kochirish2 as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <select name="ombor2_id" required id="building"
                                                    class="form-select form-control"
                                                    required>
                                                <option value=""> Qayerga</option>
                                                @foreach($kochirish2 as $cat)
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

            </div>
        </div>


        {{--        Maxsulotlar--}}
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
                                    <button class="btn btn-success" id="myBtn"> Qo'shish</button>
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
                                <th>Bahosi</th>
                                <th class="w-25">Amallar</th>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        @endif


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
        // Get the modal
        var create_modal = document.getElementById("create");
        // var modal2 = document.getElementById("myModal2");

        // Get the button that opens the modal
        // var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modal
        function store() {
            create_modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            create_modal.style.display = "none";
        }

        var kochirish =@json($kochirish);

        function show(id) {
            modal2.style.display = "block";

            for (let i = 0; i < kochirish.length; i++) {
                if (id == kochirish[i]['id']) {
                    $('#name1').text(kochirish[i]['ombor1']);
                    $('#code1').text(kochirish[i]['ombor2']);
                    // $('#artikul1').text(products[i]['artikul']);
                }
            }

            // for (let i = 0; i < product_log_all.length; i++) {
            //     if (id == product_log_all[i]['product_id']) {
            //         $('#count1').text(product_log_all[i]['count']);
            //         $('#sum_came1').text(product_log_all[i]['sum_came']);
            //         $('#sum_sell1').text(product_log_all[i]['sum_sell']);
            //         $('#sum_sell_optom1').text(product_log_all[i]['sum_sell_optom']);
            //         $('#count_sell_optom1').text(product_log_all[i]['count_sell_optom']);
            //         $('#kontragent_id1').text(product_log_all[i]['kontragent_id']);
            //         $('#shelf_id1').text(product_log_all[i]['shelf_id']);
            //     }
            // }

        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
