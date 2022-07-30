
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
                        <div class="pull-left">
                            <h2>Agentlar ro'yhati</h2>
                        </div>
                        <div class="pull-right">
                            @can('category-create')
                                <button onclick="store()" class="btn btn-success btn-lg" >
                                    <i class="bi bi-plus-lg"></i>
                                    Agent qo'shish
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>

                <!-- The Modal -->

                <div class="card-body">
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <div class="container p-1 border">
                                <form action="{{route('admin.agent.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">
                                            Agent nomi:
                                        </label>
                                        <input type="text" name="name" class="form-control mb-3" id="name"  required>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="parent_id">--}}
{{--                                            Parent-kategoriya:--}}
{{--                                        </label>--}}
{{--                                        <select class="form-select" name="parent_id" id="parent_id" >--}}
{{--                                            <option value="0" selected>Yo'q</option>--}}
{{--                                            @foreach($agentlar as $agent)--}}
{{--                                                <option value="{{$agent->id}}" >{{$cat->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
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
                            <th class="w-25">Agentlar nomi</th>
                            <th class="col-1">Amallar</th>

                        </tr>
                        @foreach ($agentlar as $key => $agent)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $agent->name }}</td>


                                <td>

                                        <a class="btn btn-info" href="{{ route('admin.agent.show',$agent->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    @can('category-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.agent.edit',$agent->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.agent.destroy', $agent->id],'style'=>'display:inline']) !!}
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


{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            @if ($agentlar->links())--}}
{{--                                <div class="mt-4 p-4 box has-text-centered">--}}
{{--                                    {{ $agentlar->links() }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        // var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

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

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
