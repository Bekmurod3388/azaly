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
                            <a class="btn btn-primary" href="{{ route('admin.purchases.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('admin.purchases.store')}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Omborxona </label>
                                <select name="warehouse_id" required id="warehouse" class="form-select form-control"
                                        required>
                                    <option value=""> Xaridni tanlang</option>
                                    @foreach($cate as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Kontragent: </strong>
                                <select name="kontragent_id" required id="building" class="form-select form-control"
                                        required>
                                    <option value=""> Kontragent tanlang</option>
                                    @foreach($agent as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong> Umumiy Summa: </strong>--}}
{{--                                <input type="number" name="AllSum" class="form-control mb-3" placeholder="AllSum"--}}
{{--                                       required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        let warehouse = @json($ware);
        let shelf = @json($shelf);

        $('#warehouse').on('change', function () {
            var shelf_id = $(this).val();
            $('#shelf').empty();
            $('#shelf').append("<option value=''> Select Shelf </option>")
            for (let i = 0; i < shelf.length; i++) {
                if (shelf_id == shelf[i].warehouse_id) {
                    var option = document.createElement("option");   // Create with DOM
                    option.innerHTML = shelf[i].name;
                    option.value = shelf[i].id;
                    $('#shelf').append(option);
                }
            }
        });

    </script>

@endsection

