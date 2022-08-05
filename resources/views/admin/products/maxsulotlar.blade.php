
{{--  Mahsulotlar: ( index )--}}
@if($layout == 'index')
    <div id="show_table" class="card">
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
                        <th>Baxosi</th>
                        <th>Soni</th>
                        <th>Kotegoriya</th>
                        <th>Tokcha</th>
                        <th class="w-25">Amallar</th>
                    </tr>
                    @foreach ($product_logs as $key => $p)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->products->name }}</td>
                            <td>
                                {{ $p->sum_came }}
                            </td>
                            <td>
                                {{ $p->count}}
                            </td>
                            <td>
                                {{ $p->products->category->name }}
                            </td>
                            <td>{{$p->shelfs->name}}
                            </td>

                            <td>
                                {{--                                                                                    @can('category-list')--}}

                                {{--                                                <a class="btn btn-info"--}}
                                {{--                                                   href="{{ route('admin.products.show',$p->id) }}">--}}
                                {{--                                                    <i class="fa fa-eye"></i>--}}
                                {{--                                                </a>--}}
                                {{--                                            @endcan--}}

                                <button class="btn btn-info" onclick="show({{$p->products->id}})">
                                    <i class="fa fa-eye"> </i>
                                </button>

                                @can('size-edit')
                                    {{--                                              <a class="btn btn-warning" href="{{ route('admin.products.edit',$p->id) }}">--}}
                                    {{--                                                    <i class="fa fa-pen"></i>--}}
                                    {{--                                                </a>--}}
                                    <button class="btn btn-warning" onclick="edit({{$p->products->id}})">
                                        <i class="fa fa-pen"> </i>
                                    </button>
                                @endcan

                                @can('product-delete')
                                    {{--                                                {!! Form::open(['method' => 'DELETE','route' => ['admin.products.destroy', $p->id],'style'=>'display:inline']) !!}--}}
                                    {{--                                                <button type="submit" class="btn btn-danger btn-flat show_confirm"--}}
                                    {{--                                                        data-toggle="tooltip">--}}
                                    {{--                                                <span class="btn-label">--}}
                                    {{--                                                    <i class="fa fa-trash"></i>--}}
                                    {{--                                                </span>--}}
                                    {{--                                                </button>--}}
                                    {{--                                                {!! Form::close()!!}--}}
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endif

<!-- The Modal -->
<div class="form">

    {{--Create--}}
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @can('size-create')
                                    <h2> Qo'shish </h2>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.products.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong> Maxsulot ID:</strong>
                                    <div class="d-flex justify-content-between">
                                        <input type="number" name="product_id" id="pro_id"
                                               class="form-control mb-3">
                                        <button class="btn btn-outline-primary mb-3" style="width: 20%"
                                                onclick="izlash()">Izlash
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <strong>Nomi:</strong>
                                    <input type="text" name="name" id="name" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Kod:</strong>
                                    <input type="number" name="code" id="code" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Artikul:</strong>
                                    <p id="artikul" style="color: red"></p>
                                    <input type="text" name="artikul" id="artikull" class="form-control mb-3">
                                </div>

                                {{--                                        <div class="form-group">--}}
                                {{--                                            <strong>Status:</strong>--}}
                                {{--                                            --}}{{--                                            <p id="status" style="color: red"></p>--}}
                                {{--                                            <input type="text" name="status" id="status" class="form-control mb-3">--}}
                                {{--                                        </div>--}}

                                {{--                                        <div class="form-group">--}}
                                {{--                                            <strong>Status:</strong>--}}
                                {{--                                            --}}{{--                                            <p id="status" style="color: red"></p>--}}
                                {{--                                            <input type="text" name="status" id="status" class="form-control mb-3">--}}
                                {{--                                        </div>--}}

                                {{--                                        <div class="form-group">--}}
                                {{--                                            <strong>Foiz:</strong>--}}
                                {{--                                            <p id="percent" style="color: red"></p>--}}
                                {{--                                            <input type="number" name="percent" id="percentt" class="form-control mb-3">--}}
                                {{--                                        </div>--}}

                                <div class="form-group">
                                    <strong>Soni:</strong>
                                    <p id="count" style="color: red"></p>
                                    <input type="number" name="count" id="countt" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Kelgan bahosi:</strong>
                                    <p id="kelgan" style="color: red"></p>
                                    <input type="number" required name="sum_came" id="sum_came"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Dona sotish bahosi:</strong>
                                                                                <p id="dona" style="color: red"></p>
                                    {{--                                            <p id="dona1" style="color: red"></p>--}}
                                    <input type="number" required name="sum_sell" id="sum_sell"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Optom Soni:</strong>
                                    <p id="percent" style="color: red"></p>
                                    <input type="number" name="count_sell_optom" id="count_sell_optomm"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Optom sotish bahosi:</strong>
                                    <p id="optom" style="color: red"></p>
                                    <button id="optom1" required onclick="optom" style="display: none">Tanlash
                                    </button>
                                    <input type="number" name="sum_sell_optom" id="sum_sell_optom"
                                           class="form-control mb-3">
                                </div>


                                <div class="form-group">
                                    <input type="hidden" name="purchase_id" id="purchase_id1"
                                           class="form-control mb-3" value="{{ $idd }}">
                                </div>

                                <div class="form-group">
                                    <strong> Kotegoriya: </strong>
                                    <select name="category_id" id="category_id"
                                            class="form-select form-control"
                                            required>
                                        <option value=""> Kotegoriya tanglang</option>
                                        @foreach($cotegory as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <strong> Tokcha tanlang: </strong>
                                    <select name="shelf_id" id="shelf_idd" class="form-select form-control"
                                            required>
                                        <option value=""> Tokcha tanlang</option>
                                        @foreach($shelfs as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
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

    {{--Edit--}}
    <div id="myModal1" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Mahsulotni tahrirlash </h2>
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
                                    <input type="hidden" name="purchase_id" id="purchase_id1"
                                           class="form-control mb-3" value="{{ $idd }}">
                                </div>

                                <div class="form-group">
                                    <strong>Nomi:</strong>
                                    <input type="text" name="name" id="namee" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Kod:</strong>
                                    <input type="number" name="code" id="codee" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Artikul:</strong>
                                    <input type="text" name="artikul" id="artikule"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Status:</strong>
                                    <input type="text" name="status" id="statuse" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Soni:</strong>
                                    <input type="number" name="count" id="counte" class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Kelgan bahosi:</strong>
                                    <input type="number" name="sum_came" id="sum_camee"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Dona sotish bahosi:</strong>
                                    <input type="number" name="sum_sell" id="sum_selle"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Optom sotish soni:</strong>
                                    <input type="number" name="count_sell_optom" id="count_sell_optome"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Optom sotish bahosi:</strong>
                                    <input type="number" name="sum_sell_optom" id="sum_sell_optome"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong> Kotegoriya: </strong>
                                    <select name="category_id" required id="category_ide"
                                            class="form-select form-control"
                                            required>
                                        <option> Kotegoriyani tanlang</option>
                                        @foreach($cotegory as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <strong> Tokcha tanlang: </strong>
                                    <select name="shelf_id" required id="shelf_ide"
                                            class="form-select form-control"
                                            required>
                                        @foreach($shelfs as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
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

    {{--Show--}}
    <div id="myModal2" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Mahsulot </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <strong>Nom:</strong>
                                <p id="name1"></p>
                            </div>
                            <div class="form-group">
                                <strong>Kod:</strong>
                                <p id="code1"></p>
                            </div>
                            <div class="form-group">
                                <strong>Artikul:</strong>
                                <p id="artikul1"></p>
                            </div>
                            <div class="form-group">
                                <strong>Status:</strong>
                                <p id="status1"></p>
                            </div>

                            {{--                                    <div class="form-group">--}}
                            {{--                                        <strong>Foiz:</strong>--}}
                            {{--                                        <p id="percent1"></p>--}}
                            {{--                                    </div>--}}

                            <div class="form-group">
                                <strong>Soni:</strong>
                                <p id="count1"></p>
                            </div>

                            <div class="form-group">
                                <strong> Kategoriya :</strong>
                                <p id="cotegory_id"></p>
                            </div>

                            <div class="form-group">
                                <strong> Tokcha :</strong>
                                <p id="shelf_id1"></p>
                                {{--                                    @foreach($shelfs as $cat)--}}
                                {{--                                        @if( $product->shelf_id == $cat->id )--}}
                                {{--                                            {{ $cat->name }}--}}
                                {{--                                        @endif--}}
                                {{--                                    @endforeach--}}
                            </div>

                            <div class="form-group">
                                <strong>Kelgan bahosi:</strong>
                                <p id="sum_came1"></p>
                            </div>
                            <div class="form-group">
                                <strong>Dona sotish bahosi:</strong>
                                <p id="sum_sell1"></p>
                            </div>

                            <div class="form-group">
                                <strong>Optom sotish soni:</strong>
                                <p id="count_sell_optom1"></p>
                            </div>
                            <div class="form-group">
                                <strong>Optom sotish bahosi:</strong>
                                <p id="sum_sell_optom1"></p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    {{--baho--}}
    <div id="myModal5" class="modal">
        <div class="modal-content">
            <span class="close" id="get">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> baho </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.baho')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="hidden" id="xarid_id" name="id">
                                <div class="form-group">
                                    <strong>Baho</strong>
                                    <input type="number" name="baho" id="name" class="form-control mb-3">
                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

{{--    --}}{{----}}{{--kochirish-}}--}}{{--`--}}
{{--    <div id="myModal6" class="modal">--}}
{{--        <div class="modal-content">--}}
{{--            <span class="close" id="get">&times;</span>--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 margin-tb">--}}
{{--                            <div class="pull-left">--}}
{{--                                <h2> Kochirish </h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}

{{--                    <form action="{{route('admin.kochirish.store')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <strong> Omborxonani tanlang</strong>--}}
{{--                                    <input type="hidden" id="kochir_id" name="id">--}}
{{--                                    <select name="ware_house_id" required id=""--}}
{{--                                            class="form-select form-control" required>--}}
{{--                                        @foreach($kochirish as $cat)--}}
{{--                                            <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                            <button type="submit" class="btn btn-primary">Saqlash</button>--}}
{{--                        </div>--}}

{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


</div>
