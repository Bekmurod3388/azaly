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
                            <h2>Kategoriyalar ro'yhati</h2>
                        </div>
                        <div class="pull-right">
                            @can('category-create')
                                {{-- <a class="btn btn-success" href="{{ route('admin.warehouses.create') }}"> Create New WarseHouses</a>--}}
                                <button class="btn btn-success" id="myBtn"> Qo'shish</button>
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


                    {{--   create--}}
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
                                                @can('category-create')
                                                    <h2> Qo'shish </h2>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label for="name">
                                                Kategoriya nomi:
                                            </label>
                                            <input type="text" name="name" class="form-control mb-3" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">
                                                Parent-kategoriya:
                                            </label>
                                            <select class="form-select" name="parent_id" id="parent_id">
                                                <option value="0" selected>Yo'q</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                            <div class="form-group">
                                                <label for=rasm">Rasm</label>
                                                <input required="" type="file" name="img" class="form-control" id="rasm" placeholder="rasm nomi">
                                            </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Saqlash">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--   edit--}}
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
                                    <form action="" method="post" id="editForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="name">
                                                        Kategoriya nomi:
                                                    </label>
                                                    <input type="text" name="name" class="form-control mb-3"
                                                           id="namecat" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="parent_id">
                                                        Parent-kategoriya:
                                                    </label>
                                                    <select class="form-select" name="parent_id" id="parent_id1">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for=rasm">Rasm</label>
                                                    <input required="" type="file" name="img" class="form-control" id="rasm" placeholder="rasm nomi">
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


                    {{--  index--}}
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th class="w-25">Kategoriya nomi</th>
                            <th class="">Slug</th>

                            <th class="w-25">Parent : kategoriya</th>
                            <th class="w-25">img</th>
                            <th class="w-25">Harakat</th>

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
                               <td> <img src="{{ asset('images/categories/'.$cat->img) }}"
                                     style="height: 100px; width: 150px;">
                               </td>

                                <td>
                                    {{--                                    @can('category-list')--}}
                                    {{--                                        <a class="btn btn-info" href="{{ route('admin.categories.show',$cat->id) }}">--}}
                                    {{--                                            <i class="fa fa-eye"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    @endcan--}}
                                    @can('category-edit')

                                        <button class="btn btn-warning" onclick="edit({{ $cat->id }})"><i
                                                class="fa fa-pen"></i></button>
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
                confirmButtonText: 'Ok',
            })
        </script>
    @endif

    <script>
        let warehouses = @json($categories);
        console.log(warehouses);
        var modal = document.getElementById("myModal");
        var modal1 = document.getElementById("myModal1");
        let sel = document.getElementById('parent_id');
        var btn = document.getElementById("myBtn");
        let rasm=document.getElementById('rasm');

        var span = document.getElementsByClassName("close")[0];
        var span1 = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        function edit(id) {
            console.log(id);
            for (let i = 0; i < warehouses['data'].length; i++) {
                console.log(i);

                if (id == warehouses['data'][i]['id']) {

                    console.log('ifni ichi');
                    $('#namecat').val(warehouses['data'][i]['name']);
                    $('#parent_id1').find('option').remove();

                    if (warehouses['data'][i]['parent_id'] == 0) {
                        $('#parent_id1').append('<option value=' + 0 + 'selected >' + 'Yo\'q' + '</option>');
                    }

                    for (let j = 0; j < warehouses['data'].length; j++) {
                        if (warehouses['data'][i]['parent_id'] == warehouses['data'][j]['id']) {
                            $('#parent_id1').append('<option value=' + warehouses['data'][j]['id'] + 'selected >'
                                + warehouses['data'][j]['name'] + '</option>');
                            $('#parent_id1').append('<option value=' + 0 + '>' + 'Yo\'q' + '</option>');
                        } else {
                            $('#parent_id1').append('<option value=' + warehouses['data'][j]['id'] + '>'
                                + warehouses['data'][j]['name'] + '</option>');
                        }

                    }
                    break;
                }
            }

            $('#editForm').attr('action', '/admin/categories/' + id);
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
