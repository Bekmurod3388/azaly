@extends('admin.master')
@section('content')


            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Ko'chirish </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.kochirish.store')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong> Omborxonani tanlang</strong>
                                    <select name="ombor1" required id="kochir"
                                            class="form-select form-control" required>
                                        @foreach($kochirish as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>  <select name="ombor2" required id="kochir"
                                                  class="form-select form-control" required>
                                        @foreach($kochirish as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>

                    </form>

                </div>
            </div>


@endsection



