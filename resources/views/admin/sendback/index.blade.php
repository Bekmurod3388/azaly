{{--@extends('admin.master')--}}
{{--@section('content')--}}

{{--    <style>--}}
{{--        /* The Modal (background) */--}}
{{--        .modal {--}}
{{--            display: none; /* Hidden by default */--}}
{{--            position: fixed; /* Stay in place */--}}
{{--            z-index: 100; /* Sit on top */--}}
{{--            padding-top: 100px; /* Location of the box */--}}
{{--            left: 0;--}}
{{--            top: 0;--}}
{{--            width: 100%; /* Full width */--}}
{{--            height: 100%; /* Full height */--}}
{{--            overflow: auto; /* Enable scroll if needed */--}}
{{--            background-color: rgb(0, 0, 0); /* Fallback color */--}}
{{--            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */--}}
{{--        }--}}

{{--        /* Modal Content */--}}
{{--        .modal-content {--}}
{{--            background-color: #fefefe;--}}
{{--            margin: auto;--}}
{{--            padding: 20px;--}}
{{--            border: 1px solid #888;--}}
{{--            width: 80%;--}}
{{--        }--}}

{{--        /* The Close Button */--}}
{{--        .close {--}}
{{--            color: #aaaaaa;--}}
{{--            float: right;--}}
{{--            font-size: 28px;--}}
{{--            font-weight: bold;--}}
{{--        }--}}

{{--        .close:hover,--}}
{{--        .close:focus {--}}
{{--            color: #000;--}}
{{--            text-decoration: none;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--    </style>--}}


{{--    <div class="col-md-12">--}}

{{--        --}}{{--  Xaridlar: ( index )--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12 margin-tb">--}}
{{--                        <div class="pull-left">--}}
{{--                            <h2>Xaridlar:</h2>--}}
{{--                            <p id="pbi"></p>--}}
{{--                        </div>--}}
{{--                        <div class="pull-right">--}}
{{--                            @can('product-create')--}}
{{--                                --}}{{--                                <a class="btn btn-success" href="{{ route('admin.purchases.create') }}"> Qo'shish </a>--}}
{{--                                <input type="hidden" id="hidden_input" value="0">--}}
{{--                                <button class="btn btn-success" id="myBtn1"> Qo'shish</button>--}}
{{--                            @endcan--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr>--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table table-bordered table-hover">--}}
{{--                        <tr>--}}
{{--                            <th>Id</th>--}}
{{--                            <th> Kontragent</th>--}}
{{--                            <th> Omborxona</th>--}}
{{--                            <th> Umumiy Baxosi</th>--}}
{{--                            <th> Vaqti</th>--}}

{{--                            <th class="" style="width: 30%">Amallar</th>--}}
{{--                        </tr>--}}
{{--                        @foreach ($purchases as $key => $purchase)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $key+1 }}</td>--}}
{{--                                <td>--}}
{{--                                    @foreach($agent as $w)--}}
{{--                                        @if($w->id == $purchase->kontragent_id )--}}
{{--                                            {{ $w->name }}--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @foreach($ware as $w)--}}
{{--                                        @if($w->id == $purchase->warehouse_id )--}}
{{--                                            {{ $w->name }}--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
{{--                                <td>{{ $purchase->AllSum }}</td>--}}
{{--                                <td>{{ $purchase->created_at }}</td>--}}

{{--                                <td>--}}
{{--                                    @can('product-list')--}}

{{--                                        <a class="btn btn-info"--}}
{{--                                           href="{{ route('admin.purchases.index', ['id' => $purchase->id],) }}">--}}
{{--                                            <i class="fa fa-eye"></i>--}}
{{--                                        </a>--}}

{{--                                        --}}{{--                                        <button class="btn btn-warning" onclick="fayzullo({{$purchase->id}},{{$purchase->warehouse_id}})"><i--}}
{{--                                        --}}{{--                                                class="fa fa-eye"></i>--}}
{{--                                        --}}{{--                                        </button>--}}
{{--                                    @endcan--}}
{{--                                    @can('product-edit')--}}

{{--                                        --}}{{--                                        <a class="btn btn-warning"--}}
{{--                                        --}}{{--                                           href="{{ route('admin.purchases.edit',$purchase->id) }}">--}}
{{--                                        --}}{{--                                            <i class="fa fa-pen"></i>--}}
{{--                                        --}}{{--                                        </a>--}}
{{--                                        <button class="btn btn-warning" onclick="edit_1({{$purchase->id}})">--}}
{{--                                            <i class="fa fa-pen"> </i>--}}
{{--                                        </button>--}}
{{--                                    @endcan--}}
{{--                                    @can('product-delete')--}}
{{--                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.purchases.destroy', $purchase->id],'style'=>'display:inline']) !!}--}}
{{--                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"--}}
{{--                                                data-toggle="tooltip">--}}
{{--                                            <span class="btn-label">--}}
{{--                                                <i class="fa fa-trash"></i>--}}
{{--                                            </span>--}}
{{--                                        </button>--}}
{{--                                        {!! Form::close() !!}--}}
{{--                                    @endcan--}}
{{--                                    <button class="btn btn-info" onclick="add({{ $purchase->id }})">--}}
{{--                                        <i class="fa fa-plus"></i>--}}
{{--                                    </button>--}}

{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </table>--}}

{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            @if ($purchases->links())--}}
{{--                                <div class="mt-4 p-4 box has-text-centered">--}}
{{--                                    {{ $purchases->links() }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <br><br><br>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <!-- The Modal -->--}}
{{--        <div class="form">--}}

{{--            --}}{{--Create--}}
{{--            <div id="myModal_1" class="modal">--}}
{{--                <!-- Modal content -->--}}
{{--                <div class="modal-content">--}}
{{--                    <span class="close" id="get">&times;</span>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 margin-tb">--}}
{{--                                    <div class="pull-left">--}}
{{--                                        <h2> Yangi xarid qo'shing </h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}

{{--                            <form action="{{route('admin.purchases.store')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="row">--}}

{{--                                    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="building"> Omborxona </label>--}}
{{--                                            <select name="warehouse_id" required id="warehouse"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                <option value=""> Omborxona tanlang</option>--}}
{{--                                                @foreach( $ware as $cat)--}}
{{--                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <strong> Kontragent: </strong>--}}
{{--                                            <select name="kontragent_id" required id="building"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                <option value=""> Kontragent tanlang</option>--}}
{{--                                                @foreach($agent as $cat)--}}
{{--                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                    <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                                </div>--}}

{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}


{{--            --}}{{--Edit--}}
{{--            <div id="myModal1_1" class="modal">--}}
{{--                <!-- Modal content -->--}}
{{--                <div class="modal-content">--}}
{{--                    <span class="close">&times;</span>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 margin-tb">--}}
{{--                                    <div class="pull-left">--}}
{{--                                        <h2> Tahrirlash </h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}

{{--                            <form action="" method="post" id="editForm_1">--}}
{{--                                @method('PUT')--}}
{{--                                @csrf--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <strong>Omborxona:</strong>--}}
{{--                                            <select name="warehouse_id" required id="warehouse"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                @foreach($ware as $w)--}}
{{--                                                    <option value="{{$w->id}}">{{$w->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}


{{--        --}}{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

{{--        --}}{{--  Mahsulotlar: ( index )--}}
{{--        @if($layout == 'index')--}}
{{--            <div id="show_table" class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 margin-tb">--}}
{{--                            <div class="pull-left">--}}
{{--                                <h2> Mahsulotlar: </h2>--}}
{{--                            </div>--}}
{{--                            <div class="pull-right">--}}
{{--                                @can('category-create')--}}
{{--                                    --}}{{--  <a class="btn btn-success" href="{{ route('admin.sizes.create') }}"> Create New Size</a>--}}
{{--                                    <input type="hidden" id="hidden_input" value="0">--}}
{{--                                    <button class="btn btn-success" id="myBtn"> Qo'shish</button>--}}
{{--                                @endcan--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table table-bordered table-hover">--}}
{{--                            <tr>--}}
{{--                                <th>TR</th>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Nomi</th>--}}
{{--                                <th>Baxosi</th>--}}
{{--                                <th>Soni</th>--}}
{{--                                <th>Kotegoriya</th>--}}
{{--                                <th>Tokcha</th>--}}
{{--                                <th class="w-25">Amallar</th>--}}
{{--                            </tr>--}}
{{--                            @foreach ($product_logs as $key => $p)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $key+1 }}</td>--}}
{{--                                    <td>{{ $p->id }}</td>--}}
{{--                                    <td>{{ $p->products->name }}</td>--}}
{{--                                    <td>--}}
{{--                                        {{ $p->sum_came }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $p->count}}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $p->products->category->name }}--}}
{{--                                    </td>--}}
{{--                                    <td>{{$p->shelfs->name}}--}}
{{--                                    </td>--}}

{{--                                    <td>--}}
{{--                                        --}}{{--                                                                                    @can('category-list')--}}

{{--                                        --}}{{--                                                <a class="btn btn-info"--}}
{{--                                        --}}{{--                                                   href="{{ route('admin.products.show',$p->id) }}">--}}
{{--                                        --}}{{--                                                    <i class="fa fa-eye"></i>--}}
{{--                                        --}}{{--                                                </a>--}}
{{--                                        --}}{{--                                            @endcan--}}

{{--                                        <button class="btn btn-info" onclick="show({{$p->products->id}})">--}}
{{--                                            <i class="fa fa-eye"> </i>--}}
{{--                                        </button>--}}

{{--                                        @can('size-edit')--}}
{{--                                            --}}{{--                                              <a class="btn btn-warning" href="{{ route('admin.products.edit',$p->id) }}">--}}
{{--                                            --}}{{--                                                    <i class="fa fa-pen"></i>--}}
{{--                                            --}}{{--                                                </a>--}}
{{--                                            <button class="btn btn-warning" onclick="edit({{$p->products->id}})">--}}
{{--                                                <i class="fa fa-pen"> </i>--}}
{{--                                            </button>--}}
{{--                                        @endcan--}}

{{--                                        @can('product-delete')--}}
{{--                                            --}}{{--                                                {!! Form::open(['method' => 'DELETE','route' => ['admin.products.destroy', $p->id],'style'=>'display:inline']) !!}--}}
{{--                                            --}}{{--                                                <button type="submit" class="btn btn-danger btn-flat show_confirm"--}}
{{--                                            --}}{{--                                                        data-toggle="tooltip">--}}
{{--                                            --}}{{--                                                <span class="btn-label">--}}
{{--                                            --}}{{--                                                    <i class="fa fa-trash"></i>--}}
{{--                                            --}}{{--                                                </span>--}}
{{--                                            --}}{{--                                                </button>--}}
{{--                                            --}}{{--                                                {!! Form::close()!!}--}}
{{--                                        @endcan--}}

{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <!-- The Modal -->--}}
{{--        <div class="form">--}}

{{--            --}}{{--Create--}}
{{--            <div id="myModal" class="modal">--}}
{{--                <!-- Modal content -->--}}
{{--                <div class="modal-content">--}}
{{--                    <span class="close">&times;</span>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 margin-tb">--}}
{{--                                    <div class="pull-left">--}}
{{--                                        @can('size-create')--}}
{{--                                            <h2> Qo'shish </h2>--}}
{{--                                        @endcan--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="{{route('admin.products.store')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <strong> Maxsulot ID:</strong>--}}
{{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <input type="number" name="product_id" id="pro_id"--}}
{{--                                                       class="form-control mb-3">--}}
{{--                                                <button class="btn btn-outline-primary mb-3" style="width: 20%"--}}
{{--                                                        onclick="izlash()">Izlash--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Nomi:</strong>--}}
{{--                                            <input type="text" name="name" id="name" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Kod:</strong>--}}
{{--                                            <input type="number" name="code" id="code" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Artikul:</strong>--}}
{{--                                            <p id="artikul" style="color: red"></p>--}}
{{--                                            <input type="text" name="artikul" id="artikull" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        --}}{{--                                        <div class="form-group">--}}
{{--                                        --}}{{--                                            <strong>Status:</strong>--}}
{{--                                        --}}{{--                                            --}}{{----}}{{--                                            <p id="status" style="color: red"></p>--}}
{{--                                        --}}{{--                                            <input type="text" name="status" id="status" class="form-control mb-3">--}}
{{--                                        --}}{{--                                        </div>--}}

{{--                                        --}}{{--                                        <div class="form-group">--}}
{{--                                        --}}{{--                                            <strong>Status:</strong>--}}
{{--                                        --}}{{--                                            --}}{{----}}{{--                                            <p id="status" style="color: red"></p>--}}
{{--                                        --}}{{--                                            <input type="text" name="status" id="status" class="form-control mb-3">--}}
{{--                                        --}}{{--                                        </div>--}}

{{--                                        --}}{{--                                        <div class="form-group">--}}
{{--                                        --}}{{--                                            <strong>Foiz:</strong>--}}
{{--                                        --}}{{--                                            <p id="percent" style="color: red"></p>--}}
{{--                                        --}}{{--                                            <input type="number" name="percent" id="percentt" class="form-control mb-3">--}}
{{--                                        --}}{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Soni:</strong>--}}
{{--                                            <p id="count" style="color: red"></p>--}}
{{--                                            <input type="number" name="count" id="countt" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Kelgan bahosi:</strong>--}}
{{--                                            <p id="kelgan" style="color: red"></p>--}}
{{--                                            <input type="number" required name="sum_came" id="sum_came"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Dona sotish bahosi:</strong>--}}
{{--                                            --}}{{--                                            <p id="dona" style="color: red"></p>--}}
{{--                                            --}}{{--                                            <p id="dona1" style="color: red"></p>--}}
{{--                                            <input type="number" required name="sum_sell" id="sum_sell"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Optom Soni:</strong>--}}
{{--                                            <p id="percent" style="color: red"></p>--}}
{{--                                            <input type="number" name="count_sell_optom" id="count_sell_optomm"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Optom sotish bahosi:</strong>--}}
{{--                                            <p id="optom" style="color: red"></p>--}}
{{--                                            <button id="optom1" required onclick="optom" style="display: none">Tanlash--}}
{{--                                            </button>--}}
{{--                                            <input type="number" name="sum_sell_optom" id="sum_sell_optom"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}


{{--                                        <div class="form-group">--}}
{{--                                            <input type="hidden" name="purchase_id" id="purchase_id1"--}}
{{--                                                   class="form-control mb-3" value="{{ $idd }}">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong> Kotegoriya: </strong>--}}
{{--                                            <select name="category_id" id="category_id"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                <option value=""> Kotegoriya tanglang</option>--}}
{{--                                                @foreach($cotegory as $cat)--}}
{{--                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong> Tokcha tanlang: </strong>--}}
{{--                                            <select name="shelf_id" id="shelf_idd" class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                <option value=""> Tokcha tanlang</option>--}}
{{--                                                @foreach($shelfs as $cat)--}}
{{--                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            --}}{{--Edit--}}
{{--            <div id="myModal1" class="modal">--}}
{{--                <!-- Modal content -->--}}
{{--                <div class="modal-content">--}}
{{--                    <span class="close">&times;</span>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 margin-tb">--}}
{{--                                    <div class="pull-left">--}}
{{--                                        <h2> Mahsulotni tahrirlash </h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="" method="post" id="editForm">--}}
{{--                                @csrf--}}
{{--                                @method('PUT')--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12">--}}

{{--                                        <div class="form-group">--}}
{{--                                            <input type="hidden" name="purchase_id" id="purchase_id1"--}}
{{--                                                   class="form-control mb-3" value="{{ $idd }}">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Nomi:</strong>--}}
{{--                                            <input type="text" name="name" id="namee" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Kod:</strong>--}}
{{--                                            <input type="number" name="code" id="codee" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Artikul:</strong>--}}
{{--                                            <input type="text" name="artikul" id="artikule"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Status:</strong>--}}
{{--                                            <input type="text" name="status" id="statuse" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Soni:</strong>--}}
{{--                                            <input type="number" name="count" id="counte" class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Kelgan bahosi:</strong>--}}
{{--                                            <input type="number" name="sum_came" id="sum_camee"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Dona sotish bahosi:</strong>--}}
{{--                                            <input type="number" name="sum_sell" id="sum_selle"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Optom sotish soni:</strong>--}}
{{--                                            <input type="number" name="count_sell_optom" id="count_sell_optome"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong>Optom sotish bahosi:</strong>--}}
{{--                                            <input type="number" name="sum_sell_optom" id="sum_sell_optome"--}}
{{--                                                   class="form-control mb-3">--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong> Kotegoriya: </strong>--}}
{{--                                            <select name="category_id" required id="category_ide"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                <option> Kotegoriyani tanlang</option>--}}
{{--                                                @foreach($cotegory as $cat)--}}
{{--                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <strong> Tokcha tanlang: </strong>--}}
{{--                                            <select name="shelf_id" required id="shelf_ide"--}}
{{--                                                    class="form-select form-control"--}}
{{--                                                    required>--}}
{{--                                                @foreach($shelfs as $cat)--}}
{{--                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            --}}{{--Show--}}
{{--            <div id="myModal2" class="modal">--}}
{{--                <!-- Modal content -->--}}
{{--                <div class="modal-content">--}}
{{--                    <span class="close">&times;</span>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 margin-tb">--}}
{{--                                    <div class="pull-left">--}}
{{--                                        <h2> Mahsulot </h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}

{{--                                    <div class="form-group">--}}
{{--                                        <strong>Nom:</strong>--}}
{{--                                        <p id="name1"></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Kod:</strong>--}}
{{--                                        <p id="code1"></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Artikul:</strong>--}}
{{--                                        <p id="artikul1"></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Status:</strong>--}}
{{--                                        <p id="status1"></p>--}}
{{--                                    </div>--}}

{{--                                    --}}{{--                                    <div class="form-group">--}}
{{--                                    --}}{{--                                        <strong>Foiz:</strong>--}}
{{--                                    --}}{{--                                        <p id="percent1"></p>--}}
{{--                                    --}}{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <strong>Soni:</strong>--}}
{{--                                        <p id="count1"></p>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <strong> Kategoriya :</strong>--}}
{{--                                        <p id="cotegory_id"></p>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <strong> Tokcha :</strong>--}}
{{--                                        <p id="shelf_id1"></p>--}}
{{--                                        --}}{{--                                    @foreach($shelfs as $cat)--}}
{{--                                        --}}{{--                                        @if( $product->shelf_id == $cat->id )--}}
{{--                                        --}}{{--                                            {{ $cat->name }}--}}
{{--                                        --}}{{--                                        @endif--}}
{{--                                        --}}{{--                                    @endforeach--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <strong>Kelgan bahosi:</strong>--}}
{{--                                        <p id="sum_came1"></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Dona sotish bahosi:</strong>--}}
{{--                                        <p id="sum_sell1"></p>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <strong>Optom sotish soni:</strong>--}}
{{--                                        <p id="count_sell_optom1"></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Optom sotish bahosi:</strong>--}}
{{--                                        <p id="sum_sell_optom1"></p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            @include('admin.products.baho')--}}

{{--        </div>--}}

{{--        --}}{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}

{{--    </div>--}}

{{--@endsection--}}




{{--@section('script')--}}

{{--    @if(session('success'))--}}
{{--        <script>--}}
{{--            swal({--}}
{{--                icon: 'success',--}}
{{--                text: 'Muvaffaqqiyatli bajarildi',--}}
{{--                confirmButtonText: 'Continue',--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}

{{--    <script>--}}
{{--        var modal_1 = document.getElementById("myModal_1");--}}
{{--        // var modal_1 = document.getElementById("myModal_1");--}}
{{--        var modal1_1 = document.getElementById("myModal1_1");--}}
{{--        var modal = document.getElementById("myModal");--}}
{{--        var modal1 = document.getElementById("myModal1");--}}
{{--        var modal2 = document.getElementById("myModal2");--}}
{{--        var modal5 = document.getElementById("myModal5");--}}

{{--        var btn1 = document.getElementById("myBtn1");--}}
{{--        var btn = document.getElementById("myBtn");--}}

{{--        var span0 = document.getElementsByClassName("close")[0];--}}
{{--        // var span0 = document.getElementById("get");--}}
{{--        var span01 = document.getElementsByClassName("close")[1];--}}
{{--        var span = document.getElementsByClassName("close")[2];--}}
{{--        var span1 = document.getElementsByClassName("close")[3];--}}
{{--        var span2 = document.getElementsByClassName("close")[4];--}}
{{--        var span5 = document.getElementsByClassName("close")[5];--}}


{{--        span0.onclick = function () {--}}
{{--            modal_1.style.display = "none";--}}
{{--        }--}}
{{--        span01.onclick = function () {--}}
{{--            modal1_1.style.display = "none";--}}
{{--        }--}}
{{--        span.onclick = function () {--}}
{{--            modal.style.display = "none";--}}
{{--        }--}}
{{--        span1.onclick = function () {--}}
{{--            modal1.style.display = "none";--}}
{{--        }--}}
{{--        span2.onclick = function () {--}}
{{--            modal2.style.display = "none";--}}
{{--        }--}}
{{--        span5.onclick = function () {--}}
{{--            modal5.style.display = "none";--}}
{{--        }--}}


{{--        var products = @json($products);--}}
{{--        var product_all = @json($product_all);--}}
{{--        var purchases = @json($purchases);--}}
{{--        var product_log_all = @json($product_log_all);--}}

{{--        console.log(product_log_all);--}}

{{--        console.log(btn)--}}
{{--        // When the user clicks the button, open the modal--}}
{{--        btn1.onclick = function () {--}}
{{--            modal_1.style.display = "block";--}}
{{--        }--}}
{{--        btn.onclick = function () {--}}
{{--            modal.style.display = "block";--}}
{{--        }--}}


{{--        function edit(id) {--}}

{{--            for (let i = 0; i < products.length; i++) {--}}
{{--                if (id == products[i]['id']) {--}}
{{--                    $('#namee').val(products[i]['name']);--}}
{{--                    $('#codee').val(products[i]['code']);--}}
{{--                    $('#artikule').val(products[i]['artikul']);--}}
{{--                    $('#statuse').val(products[i]['status']);--}}
{{--                    $('#cotegory_ide').val(products[i]['category_id']);--}}
{{--                }--}}
{{--            }--}}

{{--            for (let i = 0; i < product_log_all.length; i++) {--}}
{{--                if (id == product_log_all[i]['product_id']) {--}}
{{--                    $('#counte').val(product_log_all[i]['count']);--}}
{{--                    $('#sum_camee').val(product_log_all[i]['sum_came']);--}}
{{--                    $('#sum_selle').val(product_log_all[i]['sum_sell']);--}}
{{--                    $('#sum_sell_optome').val(product_log_all[i]['sum_sell_optom']);--}}
{{--                    $('#count_sell_optome').val(product_log_all[i]['count_sell_optom']);--}}
{{--                    $('#kontragent_ide').val(product_log_all[i]['kontragent_id']);--}}
{{--                    $('#shelf_ide').val(product_log_all[i]['shelf_id']);--}}
{{--                }--}}
{{--            }--}}
{{--            // alert(id);--}}

{{--            $('#editForm').attr('action', '/admin/products/' + id);--}}
{{--            modal1.style.display = "block";--}}
{{--        }--}}

{{--        function edit_1(id) {--}}
{{--            // alert(id);--}}
{{--            for (let i = 0; i < purchases.length; i++) {--}}
{{--                if (id == purchases[i]['id']) {--}}
{{--                    $('#warehouse_id').val(products[i]['warehouse_id']);--}}
{{--                    break;--}}
{{--                }--}}
{{--            }--}}
{{--            // alert(id);--}}

{{--            $('#editForm_1').attr('action', '/admin/purchases/' + id);--}}
{{--            modal1_1.style.display = "block";--}}
{{--        }--}}


{{--        function show(id) {--}}
{{--            modal2.style.display = "block";--}}

{{--            for (let i = 0; i < products.length; i++) {--}}
{{--                if (id == products[i]['id']) {--}}
{{--                    $('#name1').text(products[i]['name']);--}}
{{--                    $('#code1').text(products[i]['code']);--}}
{{--                    $('#artikul1').text(products[i]['artikul']);--}}
{{--                    $('#status1').text(products[i]['status']);--}}
{{--                    $('#cotegory_id1').text(products[i]['category_id']);--}}
{{--                }--}}
{{--            }--}}

{{--            for (let i = 0; i < product_log_all.length; i++) {--}}
{{--                if (id == product_log_all[i]['product_id']) {--}}
{{--                    $('#count1').text(product_log_all[i]['count']);--}}
{{--                    $('#sum_came1').text(product_log_all[i]['sum_came']);--}}
{{--                    $('#sum_sell1').text(product_log_all[i]['sum_sell']);--}}
{{--                    $('#sum_sell_optom1').text(product_log_all[i]['sum_sell_optom']);--}}
{{--                    $('#count_sell_optom1').text(product_log_all[i]['count_sell_optom']);--}}
{{--                    $('#kontragent_id1').text(product_log_all[i]['kontragent_id']);--}}
{{--                    $('#shelf_id1').text(product_log_all[i]['shelf_id']);--}}
{{--                }--}}
{{--            }--}}

{{--        }--}}

{{--        function add(id) {--}}
{{--            $('#xarid_id').val(id);--}}
{{--            modal5.style.display = "block";--}}
{{--        }--}}

{{--        function izlash() {--}}
{{--            let product_id = document.getElementById('pro_id').value;--}}

{{--            let a = 0;--}}

{{--            for (let i = 0; i < product_all.length; i++) {--}}

{{--                if (product_id == product_all[i]['id']) {--}}
{{--                    $('#name').val(product_all[i]['name']);--}}
{{--                    $('#code').val(product_all[i]['code']);--}}
{{--                    // $('#pbi').val(product_all[i]['name']+' matn');--}}
{{--                    $('#artikul').text("Oldingi kelgan artukuli:" + product_all[i]['artikul']);--}}
{{--                    $('#status').val(product_all[i]['status']);--}}
{{--                    $('#percent').text("Oldingi kelgan foizi: " + product_all[i]['percent']);--}}
{{--                    $('#count').text("Oldingi kelgan soni:" + product_all[i]['count']);--}}
{{--                    $('#kelgan').text("Oldingi kelgan bahosi:" + product_all[i]['sum_came']);--}}
{{--                    $('#dona').text("Oldingi dona sotish bahosi:" + product_all[i]['sum_sell']);--}}
{{--                    $('#optom').text("Oldingi optom sotish bahosi:" + product_all[i]['sum_sell_optom']);--}}
{{--                    $('#category_id').val(product_all[i]['category_id']);--}}
{{--                    $('#kontragent_id').val(product_all[i]['kontragent_id']);--}}
{{--                    $('#shelf_idd').val(product_all[i]['shelf_id']);--}}
{{--                    a = 0;--}}
{{--                    break;--}}
{{--                } else {--}}
{{--                    a = 1;--}}
{{--                }--}}
{{--            }--}}

{{--            if (a) {--}}
{{--                swal({--}}
{{--                    title: `Bunday maxsulot hali sizda mavjud emas..`,--}}
{{--                    icon: "warning",--}}
{{--                    buttons: true,--}}
{{--                    dangerMode: true,--}}
{{--                    buttons: [, 'OK']--}}

{{--                });--}}
{{--            }--}}


{{--        }--}}


{{--        function optom1() {--}}
{{--            var optom = document.getElementById("optom").value;--}}
{{--        }--}}

{{--        // When the user clicks on <span> (x), close the modal--}}


{{--        // When the user clicks anywhere outside of the modal, close it--}}
{{--        window.onclick = function (event) {--}}
{{--            if (event.target == modal) {--}}
{{--                modal.style.display = "none";--}}
{{--            }--}}
{{--            if (event.target == modal) {--}}
{{--                modal.style.display = "none";--}}
{{--            }--}}
{{--            if (event.target == modal_1) {--}}
{{--                modal_1.style.display = "none";--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $('.show_confirm').click(function (event) {--}}
{{--            var form = $(this).closest("form");--}}
{{--            var name = $(this).data("name");--}}
{{--            event.preventDefault();--}}
{{--            swal({--}}
{{--                title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,--}}
{{--                text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",--}}
{{--                icon: "warning",--}}
{{--                buttons: true,--}}
{{--                dangerMode: true,--}}
{{--                buttons: ['Yo`q', 'Ha']--}}
{{--            }).then((willDelete) => {--}}
{{--                if (willDelete) {--}}
{{--                    form.submit();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--@endsection--}}

