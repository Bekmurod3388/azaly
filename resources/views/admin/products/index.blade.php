
@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Size list</h2>
                        </div>
                        <div class="pull-right">
                            @can('category-create')
                                <a class="btn btn-success" href="{{ route('admin.sizes.create') }}"> Create New Size</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Size</th>
                            <th class="w-25">Action</th>
                        </tr>
                        @foreach ($sizes as $key => $size)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $size->Size }}</td>

                                <td>
{{--                                    @can('category-list')--}}
{{--                                        <a class="btn btn-info" href="{{ route('admin.sizes.show',$user->id) }}">--}}
{{--                                            <i class="fa fa-eye"></i>--}}
{{--                                        </a>--}}
{{--                                    @endcan--}}
                                    @can('category-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.sizes.edit',$size->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.sizes.destroy', $size->id],'style'=>'display:inline']) !!}
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
