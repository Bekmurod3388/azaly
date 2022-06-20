@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Yangi tokcha qo'shing  </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.shelf.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <form action="{{route('admin.shelf.store')}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label> Omborxona </label>
                                <select class="select2 form-control " name="warehouse_id"  data-placeholder="Yangi teg" style="width:100%">
                                    <option value="" selected>tanlang</option>
                                    @foreach($shelfs as $shelf)
                                        <option value="{{$shelf->id}}">{{$shelf->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Tokcha:</strong>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nomi">
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

