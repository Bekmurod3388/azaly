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
                            <a class="btn btn-primary" href="{{ route('admin.home') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- The Modal -->
                <div class="card-body">

                    <div id="myModal6" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div class="container p-1 border">
                                <form action="{{route('admin.kochirish.store')}}" method="post">
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
                                                    <option value="">Qayerdan</option>
                                                    @foreach($warehouse as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <select name="ombor2" required id="building"
                                                        class="form-select form-control"
                                                        required>
                                                    <option value=""> Qayerga</option>
                                                    @foreach($warehouse as $cat)
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


                        @foreach ($kochirish  as $key => $agent)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $agent->ombor1 }}</td>
                                <td>{{ $agent->ombor2 }}</td>
                                <td>

                                    <a class="btn btn-info" href="{{route('admin.kochirilganlar.index',['id'=>$agent->id])}}" >
                                        <i class="fa fa-eye"></i>
                                    </a>
{{--                                    <button class="btn btn-info" onclick="show({{$agent->id}})"  >--}}
{{--                                        <i class="fa fa-eye"></i>--}}
{{--                                    </button>--}}
                                    {{--                                    @can('category-edit')--}}
                                    {{--                                        <a class="btn btn-warning" href="{{ route('admin.agent.edit',$agent->id) }}">--}}
                                    {{--                                            <i class="fa fa-pen"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    @endcan--}}
                                    {{--                                    @can('category-delete')--}}
                                    {{--                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.agent.destroy', $agent->id],'style'=>'display:inline']) !!}--}}
                                    {{--                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"--}}
                                    {{--                                                data-toggle="tooltip">--}}
                                    {{--                                            <span class="btn-label">--}}
                                    {{--                                                <i class="fa fa-trash"></i>--}}
                                    {{--                                            </span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                        {!! Form::close() !!}--}}
                                    {{--                                    @endcan--}}
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


        <div id="show_table" class="card hidden">

            <div class="card-header">
                <div class="row">
                    <div id="myModal7" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div class="container p-1 border">
                                <form action="{{route('admin.kochirilganlar.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">
                                            Kochirilganlarr
                                        </label>
                                    </div>
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            --}}{{--                                                <strong> Kontragent: </strong>--}}
{{--                                            <select name="kochirish_id" required id="building"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}

{{--                                                @foreach($data as $cat)--}}

{{--                                                    <option value="{{$cat->id}}">{{$cat->ombor1}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <input type="hidden" id="kochirish_id" name="kochirish_id" value="{{$idd}}">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nomi</strong>
                                            <input type="text" name="nomi" class="form-control mb-3" placeholder="Nomi" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Soni</strong>
                                            <input type="number" name="soni" class="form-control mb-3" placeholder="soni" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Bahosi</strong>
                                            <input type="number" name="bahosi" class="form-control mb-3" placeholder="Bahosi" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Saqlash">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Mahsulotlar: </h2>
                        </div>
                        <div class="pull-right">
                            <button onclick="store2()" class="btn btn-success btn-lg">
                                <i class="bi bi-plus-lg"></i>
                                Qo'shish
                            </button>
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


                        @foreach($logika as $kochirsh)
                                <tr>
                                    <td>{{$kochirsh->id}}</td>
                                    <td>{{$kochirsh->kochirish->ombor1}}</td>
                                    <td>{{$kochirsh->nomi}}</td>
                                    <td>{{$kochirsh->soni}}</td>
                                    <td>{{$kochirsh->bahosi}}</td>
                                    <td>   <a class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a></td>


                                </tr>
                            @endforeach
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
        // var modal2 = document.getElementById("myModal2");
        var modal7 = document.getElementById("myModal7");

        // Get the button that opens the modal
        // var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close")[1];
        // var span3 = document.getElementsByClassName("close")[3];

        // When the user clicks the button, open the modal
        // btn.onclick = function () {
        //     modal.style.display = "block";
        // }
        function store() {
            modal.style.display = "block";
        }  function store2() {
            modal7.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
        span2.onclick = function () {
            modal7.style.display = "none";
        }
        span3.onclick = function () {
            modal7.style.display = "none";
        }

        var kochirilganlar =@json($kochirilganlar);




        function show(id) {
alert(id);

        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
