@extends('admin.master')
@section('content')
{{--  Mahsulotlar: ( index )--}}

    <div id="show_table" class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Mahsulotlar: </h2>
                    </div>
                    <div class="pull-right">
                        @can('category-create')
                            {{--  <a class="btn btn-success" href="{{ route('admin.sizes.create') }}"> Create New Size</a>--}}
                            <input type="hidden" id="hidden_input" value="0">
                            <button class="btn btn-success" id="myBtn"> Qo'shish</button>
                        @endcan
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>TR</th>
                        <th>ID</th>
                        <th>Ombor1</th>
                        <th>Baxosi</th>
                        <th>Soni</th>
                        <th>Kotegoriya</th>
                        <th>Tokcha</th>
                        <th class="w-25">Amallar</th>
                    </tr>

                    @foreach()
                </table>
            </div>
        </div>
    </div>

@endsection
