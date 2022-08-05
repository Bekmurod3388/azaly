@extends('admin.master')
@section('content')


            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull">
                                <h2> Ko'chirish </h2>
                            </div>

                            <div class="pull-left">
                                <a class="btn btn-primary" href="{{ route('admin.home') }}"> Orqaga </a>
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

                                    <select name="ombor1" required id="kochir"
                                            class="form-select form-control" required>
                                        <option value="">Qayerdan  </option>
                                        @foreach($kochirish as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>  <select name="ombor2" required id="kochir"
                                                  class="form-select form-control" required>
                                        <option value="">Qayerga </option>
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



