@extends('admin.master')

@section('content')

    <div class="col-md-12">

        {{--  Xaridlar: ( index )--}}
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Hisobot:</h2>
                            <p id="pbi"></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th> Kontragent</th>
                            <th> Xarid</th>
                            <th> Maxsulot</th>
                            <th> Tokcha</th>
                            <th> Soni</th>
                            <th> Vaqti</th>

                            {{--                            <th class="" style="width: 30%">Amallar</th>--}}
                        </tr>
                        @foreach ($products as $key => $pur)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $pur->agenti->name  }}
                                </td>
                                <td>
                                    {{ $pur->xaridi->id }}
                                </td>
                                <td>
                                    {{ $pur->polkasi->name}}
                                </td>
                                <td>
                                    {{ $pur->maxsuloti->name }}
                                </td>

                                <td>{{ $pur->soni }}</td>
                                <td>{{ $pur->created_at }}</td>

                                <td>
                                    {{--                                @can('product-list')--}}

                                    {{--                                    <a class="btn btn-info"--}}
                                    {{--                                       href="{{ route('admin.return.index', ['id' => $purchase->id],) }}">--}}
                                    {{--                                        <i class="fa fa-eye"></i>--}}
                                    {{--                                    </a>--}}

                                    {{--                                @endcan--}}

                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{--                <div class="container">--}}
                    {{--                    <div class="row justify-content-center">--}}
                    {{--                        @if ($products->links())--}}
                    {{--                            <div class="mt-4 p-4 box has-text-centered">--}}
                    {{--                                {{ $products->links() }}--}}
                    {{--                            </div>--}}
                    {{--                        @endif--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                </div>
                <br><br><br>
            </div>
        </div>

@endsection
