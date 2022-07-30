@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Foydalanuvchilar </h2>
                        </div>
                        <div class="pull-right">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('admin.custumers.create') }}"> Qo`shish </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover" style="font-size: 12px;">
                        <tr>
                            <th style="width: 2%">Id</th>
                            <th>F.I.Sh</th>
                            <th>Olgan Tavar</th>
                            <th>Bonus</th>
                            <th>Telefon</th>
                            <th>Passport</th>
                            <th>Chegirma</th>
                            <th>Keshbek</th>
                            <th  class="w-25">Categotya</th>
                            <th class="w-25">Amallar</th>
                        </tr>
                        @foreach ($data as $key => $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->received_goods }}</td>
                                    <td>{{ $user->bonus_money }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->passport }}</td>
                                    <td>{{ $user->discount }}</td>
                                    <td>{{ $user->keshback }}</td>
                                    <td> {{ $user->cotegory }}</td>
                                    <td >

                                        <form action="{{ route('admin.custumers.destroy',$user->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('admin.custumers.show',$user->id) }}"><i class="fa fa-eye"></i></a>

                                            <a class="btn btn-primary" href="{{ route('admin.custumers.edit',$user->id) }}"><i
                                                    class="fa fa-pen"></i></a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>

                        @endforeach
                    </table>


                    <div class="container">
                        <div class="row justify-content-center">
                            @if ($data->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $data->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if(session('success'))
{{--qo'shish--}}
        <script>
            swal({
                icon: 'success',
                text: 'Muvaffaqqiyatli bajarildi',
                confirmButtonText: 'Continue',
            })
        </script>
    @endif

{{--o'chirish--}}
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
