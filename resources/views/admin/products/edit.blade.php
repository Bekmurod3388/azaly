@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Tahrirlash </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('admin.products.update',$product->id )}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nom:</strong>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Sotib olish baxosi :</strong>
                                <input type="text" name="buy_sum" class="form-control" value="{{ $product->buy_sum }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Sotish baxosi: </strong>
                                <input type="text" name="sell_sum" class="form-control"
                                       value="{{ $product->sell_sum }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Aksiyada sotish baxosi:</strong>
                                <input type="text" name="sell_sale_sum" class="form-control"
                                       value="{{ $product->sell_sale_sum }}">
                            </div>
                        </div>

{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>Soni:</strong>--}}
{{--                                <input type="text" name="count" class="form-control"--}}
{{--                            </div>--}}

{{--                        </div>--}}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Aksiya soni:</strong>
                                <input type="text" name="sale_count" class="form-control"
                                       value="{{ $product->sale_count }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Kategoriya:</strong>
                                <select name="category_id" required id="building" class="form-select form-control">
                                    @foreach($cate as $cat)
                                        @if($product->category_id == $cat->id)
                                            <option value="{{$cat->id}}"> {{ $cat->name }} </option>
                                        @endif
                                    @endforeach
                                    @foreach($cate as $cat)
                                        @if($product->category_id != $cat->id)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Aksiya:</strong>
                                <input type="text" name="sale" class="form-control" value="{{ $product->sale }}">
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
@endsection
