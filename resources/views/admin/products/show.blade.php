@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Show Product </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Buy Sum:</strong>
                            {{ $product->buy_sum }}
                        </div>
                        <div class="form-group">
                            <strong>Sell Sum:</strong>
                            {{ $product->sell_sum }}
                        </div>
                        <div class="form-group">
                            <strong>Sell Sale sum:</strong>
                            {{ $product->sell_sale_sum }}
                        </div>
                        <div class="form-group">
                            <strong>Sale count:</strong>
                            {{ $product->sale_count }}
                        </div>
                        <div class="form-group">
                            <strong>Category id:</strong>
                            {{ $product->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sale:</strong>
                            {{ $product->sale }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
