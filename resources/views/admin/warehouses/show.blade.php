@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Ko'rish  </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.warehouses.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nom:</strong>
                            {{ $warehouses->name }}
                        </div>
                    </div>
{{--                    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <strong>Slug:</strong>--}}
{{--                            {{ $category->slug }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
