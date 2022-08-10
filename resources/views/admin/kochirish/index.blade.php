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
            <div class="card-header">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull">
                            <h2>Omborxonalar </h2>
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
                            <a class="btn btn-primary" href="{{ route('admin.moves.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- The Modal -->
                <div class="card-body">

                    <div id="myModal6" class="modal">

                        <!-- Index -->
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
                                                {{--                                                <strong> Kontragent: </strong>--}}
                                                <select name="ombor1" required id="building"
                                                        class="form-select form-control"
                                                        required>
                                                    <option value=""> Qayerdan</option>
                                                    @foreach($kochirish2 as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <select name="ombor2" required id="building"
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


                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class="col-1">Id</th>
                            <th class="col-1">Ombor1</th>
                            <th class="col-1">Ombor2</th>
                            <th class="col-1">Amallar</th>

                        </tr>
                        @foreach ($kochirish as $key => $agent)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $agent->ombor1 }}</td>
                                <td>{{ $agent->ombor2 }}</td>
                                <td>

                                    <a class="btn btn-info"
                                       href="{{route('admin.kochirilganlar.index', ['id' => $agent->id],)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
            </div>
        </div>

        {{--Create--}}
        <div id="show_table" class="card hidden">
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
        var modal = document.getElementById("myModal6");
        var modal2 = document.getElementById("myModal2");

        // Get the button that opens the modal
        // var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modal
        // btn.onclick = function () {
        //     modal.style.display = "block";
        // }
        function store() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
        span2.onclick = function () {
            modal2.style.display = "none";
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
