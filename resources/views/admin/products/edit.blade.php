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
                            <a class="btn btn-primary" href="{{ route('admin.purchases.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('admin.purchases.update',$pur->id )}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Omborxona:</strong>
                                <select name="warehouse_id" required id="warehouse" class="form-select form-control"
                                        required>
                                    @foreach($ware as $w)
                                        @if($w->id == $pur->warehouse_id)
                                            <option value="{{$w->id}}">{{$w->name}} </option>
                                        @endif
                                        @if($w->id != $pur->warehouse_id)
                                            <option value="{{$w->id}}">{{$w->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>

{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>Umumiy Summla:</strong>--}}
{{--                                <input type="number" name="AllSum" class="form-control" value="{{ $pur->AllSum }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
