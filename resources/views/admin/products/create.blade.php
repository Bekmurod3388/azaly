@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Product</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
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
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Buy sum:</strong>
                                <input type="number" name="buy_sum" class="form-control mb-3" placeholder="Buy sum">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sell sum:</strong>
                                <input type="number" name="sell_sum" class="form-control mb-3" placeholder="Sell sum">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sell Sale sum:</strong>
                                <input type="number" name="sell_sale_sum" class="form-control mb-3" placeholder="Sell Sale sum">
                            </div>
                        </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sale count:</strong>
                                <input type="number" name="sale_count" class="form-control mb-3" placeholder="Sale count">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category id:</strong>
                                <input type="number" name="category_id" class="form-control mb-3" placeholder="Category id">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sale:</strong>
                                <input type="number" name="sale" class="form-control mb-3" placeholder="Sale">
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

