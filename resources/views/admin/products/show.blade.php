@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Mahsulot </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            <strong>Nom:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Sotib olish baxosi:</strong>
                            {{ $product->buy_sum }}
                        </div>
                        <div class="form-group">
                            <strong>Sotish baxosi:</strong>
                            {{ $product->sell_sum }}
                        </div>
                        <div class="form-group">
                            <strong>Aksiyada sotish baxosi :</strong>
                            {{ $product->sell_sale_sum }}
                        </div>
                        <div class="form-group">
                            <strong>sotish soni:</strong>
                            {{ $product->sale_count }}
                        </div>
                        <div class="form-group">
                            <strong> Kategoriya :</strong>
                            @foreach($cate as $cat)
                                @if( $product->category_id == $cat->id )
                                    {{ $cat->name }}
                                @endif
                            @endforeach
                        </div>

                        <div class="form-group">
                            <strong>Aksiya:</strong>
                            {{ $product->sale }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
