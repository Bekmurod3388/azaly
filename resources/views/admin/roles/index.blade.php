@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Ro'l Boshqaruvi </h2>
                        </div>
                        <div class="pull-right">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Qo'shish </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th>Id</th>
                        <th>Nomi</th>
                        <th class="w-25">Amallar</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @can('role-list')
                                <a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @endcan
                                @can('role-edit')
                                    <a class="btn btn-warning" href="{{ route('admin.roles.edit',$role->id) }}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                                @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
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

                <div class="container">
                    <div class="row justify-content-center">
                        @if ($roles->links())
                            <div class="mt-4 p-4 box has-text-centered">
                                {{ $roles->links() }}
                            </div>
                        @endif
                    </div>
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
