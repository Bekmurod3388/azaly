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
                            <a class="btn btn-primary" href="{{ route('admin.purchases.index') }}"> Orqaga</a>
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
                            <strong>Kod:</strong>
                            {{ $product->code }}
                        </div>
                        <div class="form-group">
                            <strong>Artikul:</strong>
                            {{ $product->artikul }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $product->status }}
                        </div>
                        <div class="form-group">
                            <strong>Foiz:</strong>
                            {{ $product->percent }}
                        </div>
                        <div class="form-group">
                            <strong>Soni:</strong>
                            {{ $product->count }}
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
                            <strong> Tokcha :</strong>
                            @foreach($shelfs as $cat)
                                @if( $product->shelf_id == $cat->id )
                                    {{ $cat->name }}
                                @endif
                            @endforeach
                        </div>

                        <div class="form-group">
                            <strong>Kelgan bahosi:</strong>
                            {{ $product->sum_came }}
                        </div>
                         <div class="form-group">
                            <strong>Dona sotish bahosi:</strong>
                            {{ $product->sum_sell }}
                        </div>
                        <div class="form-group">
                            <strong>Optom sotish bahosi:</strong>
                            {{ $product->sum_sell_optom }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
