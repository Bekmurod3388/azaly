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

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @can('warehouse-create')
                                    <h2> Qo'shish </h2>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.warehouses.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nom:</strong>
                                    <input type="text" name="name" class="form-control mb-3" placeholder="Nom"
                                           required>
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

    <!-- The Modal -->
    <div id="myModal1" class="modal">
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
                    <form action="" method="post" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nom:</strong>
                                    <input type="text" name="name" class="form-control mb-3" placeholder="Nom" id="name"
                                           required>
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


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Omborxonalar: </h2>
                        </div>
                        <div class="pull-right">

                            @can('category-create')
                                {{-- <a class="btn btn-success" href="{{ route('admin.warehouses.create') }}"> Create New WarseHouses</a>--}}
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
                            <th>Nom</th>
                            <th>Tokchalar</th>
                            <th class="w-25"> Amallar</th>
                        </tr>
                        @foreach ($warehouses as $warehoues)
                            <tr>
                                <td>{{ $warehoues->id }}</td>
                                <td>{{ $warehoues->name }}</td>
                                <td>
                                    <a href="{{ route('admin.shelf.index',['id' => $warehoues->id]) }}"
                                       class="menu-link">
                                        <i class=" btn btn-success fas fa-boxes"></i>
                                        {{--   <div data-i18n="Analytics"> Tokchalar</div>--}}
                                    </a>

                                    </li>
                                </td>

                                <td>

                                    @can('warehouse-edit')
                                        <button class="btn btn-warning" onclick="edit({{ $warehoues->id }})"><i
                                                class="fa fa-pen"></i></button>
                                    @endcan

                                    @can('warehouse-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.warehouses.destroy', $warehoues->id],'style'=>'display:inline']) !!}
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
                            @if ($warehouses->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $warehouses->links() }}
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
        let warehouses = @json($warehouses);
        var modal = document.getElementById("myModal");
        var modal1 = document.getElementById("myModal1");

        var btn = document.getElementById("myBtn");

        var span = document.getElementsByClassName("close")[0];
        var span1 = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        function edit(id) {
            for (let i = 0; i < warehouses['data'].length; i++) {
                if (id == warehouses['data'][i]['id']) {
                    console.log(i);
                    $('#name').val(warehouses['data'][i]['name']);
                    break;
                }
            }

            $('#editForm').attr('action', '/admin/warehouses/' + id);
            modal1.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
        span1.onclick = function () {
            modal1.style.display = "none";
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
@endsection

