{{--  Mahsulotlar: ( index )--}}
@if($layout == 'index')
    <div id="show_table" class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Mahsulotlar: </h2>
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

                                <button class="btn btn-info" onclick="show({{$p->products->id}})">
                                    <i class="fa fa-eye"> </i>
                                </button>

                                <button class="btn btn-danger" onclick="returnn({{$p->products->id}})">
                                    <i class="fa fa-retweet"> </i>
                                </button>


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

    {{--Return--}}
    <div id="myModal1" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Mahsulotni qaytarish </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.return.store')}}" method="post" id="editForm">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <input type="hidden" name="purchase_id" id="purchase_id1"
                                           class="form-control mb-3" value="{{ $idd }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="product_id" id="product_id"
                                           class="form-control mb-3">
                                </div>

                                <div class="form-group">
                                    <strong>Soni:</strong>
                                    <input type="number" name="soni"  class="form-control mb-3">
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


</div>
