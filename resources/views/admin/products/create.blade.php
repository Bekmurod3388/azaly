@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Yangi mahsulot qo'shing </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Orqaga </a>
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
                                <strong>Nom:</strong>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nom" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Sotib olish baxosi: </strong>
                                <input type="number" name="buy_sum" class="form-control mb-3" placeholder="Sum"
                                       required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Sotish baxosi: </strong>
                                <input type="number" name="sell_sum" class="form-control mb-3" placeholder="Sum"
                                       required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Aksiyada sotish baxosi: </strong>
                                <input type="number" name="sell_sale_sum" class="form-control mb-3"
                                       placeholder="Sum" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Soni: </strong>
                                <input type="number" name="count" class="form-control mb-3"
                                       placeholder="Sotish soni" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Aksiya soni: </strong>
                                <input type="number" name="sale_count" class="form-control mb-3"
                                       placeholder=" Aksiya soni " required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Kategoriya </label>
                                <select name="category_id" required id="building" class="form-select form-control"
                                        required>
                                    <option value=""> Kategoriya tanlang</option>
                                    @foreach($cate as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Omborxona </label>
                                <select name="shelf_id" required id="warehouse" class="form-select form-control"
                                        required>
                                    <option value=""> Omborxonani tanlang</option>
                                    @foreach($ware as $w)
                                        <option value="{{$w->id}}">{{$w->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Tokcha </label>
                                <select name="shelf_id" required id="shelf" class="form-select form-control" required>
                                    <option value=""> Tokchani tanlang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> O'lcham </label> <br>
                                @foreach($size as $size)
                                    <input type="checkbox" name="size_id[]" id="adopted" value="{{$size->id}}">
                                    <label> {{$size->Size}} </label><br>
                                @endforeach
                            </div>
                        </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong> Aksiya: </strong>
                            <input type="number" name="sale" class="form-control mb-3" placeholder="Aksiya" required>
                        </div>
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

