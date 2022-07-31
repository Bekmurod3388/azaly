@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Yangi xarid qo'shing </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.custumers.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('admin.custumers.store')}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">F.I.Sh</label>
                                <input required="" type="text" name="name" class="form-control" id="name"
                                       placeholder="F.I.Sh">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Olgan Tavar</label>
                                <input required="" type="text" name="received_goods" class="form-control" id="received_goods"
                                       placeholder="Olgan Tavar">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Bonus</label>
                                <input required="" type="number" name="bonus_money" class="form-control" id="bonus_money"
                                       placeholder="Bonus">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Telefon</label>
                                <input required="" type="number" name="phone" class="form-control" id="phone"
                                       placeholder="+998991234567">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Passport</label>
                                <input required="" type="text" name="passport" class="form-control" id="passport"
                                       placeholder="AA 0000000">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Chegirma</label>
                                <input required="" type="number" name="discount" class="form-control" id="discount"
                                       placeholder="Chegirma">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Keshbek</label>
                                <input required="" type="number" name="keashback" class="form-control" id="discount"
                                       placeholder="Keshbek">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Category</label>
                                <select name="categorea" required id="warehouse" class="form-select form-control"
                                        required>
                                    @foreach( $cost as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
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


