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
                                    <input type="text" name="name" class="form-control mb-3" placeholder="Name" required >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Buy sum:</strong>
                                <input type="number" name="buy_sum" class="form-control mb-3" placeholder="Buy sum" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sell sum:</strong>
                                <input type="number" name="sell_sum" class="form-control mb-3" placeholder="Sell sum" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sell Sale sum:</strong>
                                <input type="number" name="sell_sale_sum" class="form-control mb-3"
                                       placeholder="Sell Sale sum" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Count: </strong>
                                <input type="number" name="count" class="form-control mb-3"
                                       placeholder="Sale count" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sale count:</strong>
                                <input type="number" name="sale_count" class="form-control mb-3"
                                       placeholder="Sale count" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Category </label>
                                <select name="category_id" required id="building" class="form-select form-control" required>
                                    <option value=""> Select Category</option>
                                    @foreach($cate as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> WareHouse </label>
                                <select name="shelf_id" required id="warehouse" class="form-select form-control" required>
                                    <option value=""> Select WareHouse</option>
                                    @foreach($ware as $w)
                                        <option value="{{$w->id}}">{{$w->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Shelf </label>
                                <select name="shelf_id" required id="shelf" class="form-select form-control" required>
                                    <option value=""> Select Shelf</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="building"> Sizes </label> <br>
                                @foreach($size as $size)
                                    <input type="checkbox" name="size_id[]"  id="adopted" value="{{$size->id}}">
                                    <label> {{$size->Size}} </label><br>
                                @endforeach
                            </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sale:</strong>
                                <input type="number" name="sale" class="form-control mb-3" placeholder="Sale" required>
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

