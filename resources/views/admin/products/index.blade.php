
@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Xaridalr:</h2>
                        </div>
                        <div class="pull-right">
                            @can('product-create')
                                <a class="btn btn-success" href="{{ route('admin.purchases.create') }}"> Qo'shish </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th> Omborxona </th>
                            <th> Kontragent </th>
                            <th> Umumiy Baxosi </th>
                            <th> Vaqti </th>

                            <th class="w-25">Amallar</th>
                        </tr>
                        @foreach ($purchases as $key => $purchase)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @foreach($ware as $w)
                                        @if($w->id == $purchase->warehouse_id )
                                            {{ $w->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($agent as $w)
                                        @if($w->id == $purchase->kontragent_id )
                                            {{ $w->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $purchase->AllSum }}</td>
                                <td>{{ $purchase->created_at }}</td>

                                <td>
                                    @can('product-list')
                                        <a class="btn btn-info" href="{{ route('admin.purchases.show',$purchase->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('product-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.purchases.edit',$purchase->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('product-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.purchases.destroy', $purchase->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                data-toggle="tooltip">
                                            <span class="btn-label">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>

{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            @if ($categories->links())--}}
{{--                                <div class="mt-4 p-4 box has-text-centered">--}}
{{--                                    {{ $categories->links() }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
@endsection

