
@extends('admin.master')
@section('content')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000000000000000000; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 20%;
            top: 0;
            width: 70%; /* Full width */
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
            color: #920101;
            float: end;
            position: absolute;
            left: 90%;
            top: 0px;
            font-size: 60px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #ae0505;
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
                            <h2>Kategoriyalar ro'yhati</h2>
                        </div>
                        <div class="pull-right">
                            @can('category-create')
                                <button onclick="store()" class="btn btn-success btn-lg" >
                                    <i class="bi bi-plus-lg"></i>
                                    Kategoriya yaratish
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
                                <form action="{{route('admin.categories.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">
                                            Kategoriya nomi:
                                        </label>
                                        <input type="text" name="name" class="form-control mb-3" id="name"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">
                                            Parent-kategoriya:
                                        </label>
                                        <select class="form-select" name="parent_id" id="parent_id" >
                                            <option value="0" selected>Yo'q</option>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" >{{$cat->name}}</option>
                                            @endforeach
                                        </select>
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
                            <th>Id</th>
                            <th class="w-25">Kategoriya nomi</th>
                            <th class="">Slug</th>
                            <th class="w-25">Parent : kategoriya</th>
                            <th class="w-50">Harakat</th>
                        </tr>
                        @foreach ($categories as $key => $cat)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->slug }}</td>
                                <td>
                                    @if( $cat->parent_id==0)
                                        Yo'q @else
                                        {{$cat->cat2->name}}
                                </td>
                                @endif
                                <td>
                                    @can('category-list')
                                        <a class="btn btn-info" href="{{ route('admin.categories.show',$cat->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('category-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.categories.edit',$cat->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.categories.destroy', $cat->id],'style'=>'display:inline']) !!}
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
                            @if ($categories->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $categories->links() }}
                                </div>
                            @endif
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
