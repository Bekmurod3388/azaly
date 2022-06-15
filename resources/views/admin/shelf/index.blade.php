
@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Shelf </h2>
                        </div>
                        <div class="pull-right">
                            @can('category-create')
                                <a class="btn btn-success" href="{{ route('admin.shelf.create') }}"> Create New Shelf</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Warehouse_id</th>
                            <th>Name</th>
                            <th class="w-25">Action</th>
                        </tr>
                        @foreach ($shelfs as $shelf)
                            <tr>
                                <td>{{ $shelf->id }}</td>
                                <td>{{ $shelf->warehouse_id }}</td>
                                <td>{{$shelf->name}}</td>
                                <td>
                                    @can('category-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.shelf.edit',$shelf->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.shelf.destroy', $shelf->id],'style'=>'display:inline']) !!}
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if(session('success'))

        <script>
            swal({
                icon: 'success',
                text: 'Muvaffaqqiyatli bajarildi',
                confirmButtonText: 'Continue',
            })
        </script>
    @endif
    <script>
        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,
                text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ['Yo`q', 'Ha']
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
