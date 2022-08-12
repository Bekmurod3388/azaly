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
                            <h2> Mijozlar ro'yhati</h2>
                        </div>
                        <div class="pull-right">
                            {{--                            @can('category-create')--}}
                            <button class="btn btn-success" id="myBtn"> Qo'shish</button>
                            {{--                            @endcan--}}
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('admin.home') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- The Modal -->

                <div class="card-body">


                    {{--  index--}}
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th class=""> Nomi</th>
                            <th class=""> Mahsulot</th>
                            <th class=""> Kategoriyasi</th>
                            <th class=""> Narxi</th>
                            <th class=""> Soni</th>
                            <th class="w-25"> Harakat</th>

                        </tr>
                        @foreach ($custumer_logs as $key => $cat)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $cat->custumer->name }}</td>
                                <td>{{ $cat->product->name }}</td>
                                <td>{{ $cat->category->name }}</td>
                                <td>{{ $cat->price }}</td>
                                <td>{{ $cat->count }}</td>
                                <td>
                                    @can('category-edit')
                                        <button class="btn btn-warning" onclick="edit({{ $cat->id }})"><i
                                                class="fa fa-pen"></i></button>
                                    @endcan
                                    @can('category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.custumer_logs.destroy', $cat->id],'style'=>'display:inline']) !!}
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


                    {{--   create--}}
                    <div id="create_modal" class="modal">
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
                                    <form action="{{route('admin.custumer_logs.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')


                                        <div class="form-group">
                                            <label for="building"> Mijoz </label>
                                            <select name="custumer_id" required id="warehouse"
                                                    class="form-select form-control"
                                                    required>
                                                @foreach( $custumers as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="building"> Mahsulot </label>
                                            <select name="product_id" required id="warehouse"
                                                    class="form-select form-control"
                                                    required>
                                                @foreach( $customer_categories as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="building"> Kategoriya </label>
                                            <select name="custumer_category_id" required id="warehouse"
                                                    class="form-select form-control"
                                                    required>
                                                @foreach( $customer_categories as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="name">
                                                Narxi
                                            </label>
                                            <input type="number" name="price" class="form-control mb-3" id="name"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">
                                                Soni
                                            </label>
                                            <input type="number" name="count" class="form-control mb-3" id="name"
                                                   required>
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
                    <div id="edit_modal" class="modal">
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

                                        <div class="form-group">
                                            <label for="building"> Mijoz </label>
                                            <select name="custumer_id" required id="custumerr"
                                                    class="form-select form-control"
                                                    required>
                                                {{--                                                <option value="" id="custumerrr"> </option>--}}
                                                @foreach( $custumers as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="building"> Maxsulot </label>
                                            <select name="product_id" required id="productt"
                                                    class="form-select form-control"
                                                    required>
                                                {{--                                                <option value="" id="producttt"> </option>--}}
                                                @foreach( $products as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="building"> Kategoriya </label>
                                            <select name="custumer_category_id" required id="categoryy"
                                                    class="form-select form-control"
                                                    required>
                                                {{--                                                <option value="" id="categoryyy"> </option>--}}
                                                @foreach( $customer_categories as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">
                                                Narxi
                                            </label>
                                            <input type="number" name="price" class="form-control mb-3" id="pricee"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">
                                                Soni
                                            </label>
                                            <input type="number" name="count" class="form-control mb-3" id="countt"
                                                   required>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Saqlash</button>
                                        </div>

                                    </form>
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

    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#mytable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    $('#mahsulot').val($(this).text());
                });
            });
        });
    </script>


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
        let custumer = @json($custumer_logs);
        let custumers = @json($custumers);
        let product = @json($products);
        let category = @json($customer_categories);

        var modal = document.getElementById("create_modal");
        var modal1 = document.getElementById("edit_modal");
        var btn = document.getElementById("myBtn");

        var span = document.getElementsByClassName("close")[0];
        var span1 = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        function edit(id) {
            // console.log(id)
            // console.log(category)
            for (let i = 0; i < custumer.length; i++) {

                if (id == custumer[i]['id']) {
                    $('#pricee').val(custumer[i]['price']);
                    $('#countt').val(custumer[i]['count']);
                }
                if (id == custumers[i]['id']) {
                    $('#custumerr').val(custumers[i]['id']);
                    $('#custumerrr').text(custumers[i]['name']);

                }
                if (id == product[i]['id']) {
                    $('#productt').val(product[i]['id']);
                    $('#producttt').text(product[i]['name']);

                }
                if (id == category[i]['id']) {
                    $('#categoryy').val(custumer[i]['id']);
                    $('#categoryyy').text(custumer[i]['name']);

                }

            }

            modal1.style.display = "block";
            $('#editForm').attr('action', '/admin/custumer_logs/' + id);

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
