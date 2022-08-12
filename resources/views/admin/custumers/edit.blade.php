@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 margin-tb">
                        <div class="pull-left">
                            <h2> Tahrirlash </h2>
                            <a class="btn btn-primary" href="{{ route('admin.custumers.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('admin.custumers.update',$custumers->id)}}" method="post">

                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="services">F.I.Sh</label>
                                <input required="" type="text" name="name" class="form-control" value="{{$custumers->name}}" id="name"
                                       placeholder="F.I.Sh">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="services">Telefon</label>
                                <input required="" type="number" name="phone" class="form-control" id="phone"
                                       placeholder="+998001112233" value="{{$custumers->phone}}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="services">Passport seriyasi va raqami</label>
                                <input required="" type="text" name="passport" class="form-control" id="passport"
                                       placeholder="AA0000000"value="{{$custumers->passport}}">
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <label for="services">Cashback (%)</label>
                                <input required="" type="number" name="cashback" class="form-control" id="keashback"
                                       placeholder="Keshback" value="{{$custumers->cashback}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="building"> Kategoriya </label>
                                <select name="category_id" required id="warehouse" class="form-select form-control" required>
                                    <option value=""> Kategoriya tanlang</option>
                                    @foreach( $cost as $cat)

                                        <option value="{{$cat->id}}" {{$cat->id==$custumers->category_id ? 'selected': ""}} >{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
