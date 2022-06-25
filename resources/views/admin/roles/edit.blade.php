@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Rolni tahrirlash </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                {!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nomi:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Nomi','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ruxsatlar:</strong>
                            <br/>
                            @foreach($permission as $value)
                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name', 'id' => $value->id)) }}
                                <label for="{{ $value->id }}" class="permission">
                                    {{ $value->name }}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"> Saqlash </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementsByClassName('permission')[0].innerHTML = "Rollar ro'yxati";
        document.getElementsByClassName('permission')[1].innerHTML = "Rol yaratish";
        document.getElementsByClassName('permission')[2].innerHTML = "Rolni tahrirlash";
        document.getElementsByClassName('permission')[3].innerHTML = "Rolni o'chirish";
        document.getElementsByClassName('permission')[4].innerHTML = "Kategoriyalar ro'yxati";
        document.getElementsByClassName('permission')[5].innerHTML = "Kategoriya yaratish";
        document.getElementsByClassName('permission')[6].innerHTML = "Kategoriyani tahrirlash";
        document.getElementsByClassName('permission')[7].innerHTML = "Kategoriyani o'chirish";
        document.getElementsByClassName('permission')[8].innerHTML = "O'lchamlar ro'yxati";
        document.getElementsByClassName('permission')[9].innerHTML = "O'lcham yaratish";
        document.getElementsByClassName('permission')[10].innerHTML = "O'lchamni tahrirlash";
        document.getElementsByClassName('permission')[11].innerHTML = "O'lchamni o'chirish";
        document.getElementsByClassName('permission')[12].innerHTML = "Omborxonalar ro'yxati";
        document.getElementsByClassName('permission')[13].innerHTML = "Omborxona yaratish";
        document.getElementsByClassName('permission')[14].innerHTML = "Omborxonani tahrirlash";
        document.getElementsByClassName('permission')[15].innerHTML = "Omborxonani o'chirish";
        document.getElementsByClassName('permission')[16].innerHTML = "Tokchalar ro'yxati";
        document.getElementsByClassName('permission')[17].innerHTML = "Tokcha yaratish";
        document.getElementsByClassName('permission')[18].innerHTML = "Tokchani tahrirlash";
        document.getElementsByClassName('permission')[19].innerHTML = "Tokchani o'chirish";
        document.getElementsByClassName('permission')[20].innerHTML = "Mahsulotlar ro'yxati";
        document.getElementsByClassName('permission')[21].innerHTML = "Mahsulot yaratish";
        document.getElementsByClassName('permission')[22].innerHTML = "Mahsulotni tahrirlash";
        document.getElementsByClassName('permission')[23].innerHTML = "Mahsulotni o'chirish";
    </script>
    <script>

        let errors = @json($errors->all());
        @if($errors->any())
        console.log(errors);

        let msg = '';
        for (let i = 0; i < errors.length; i++) {
            msg += (i + 1) + '-xatolik ' + errors[i] + '\n';
            // msg += errors[i] + '\n';
        }
        console.log(msg);
        if (msg != '') {
            swal({
                icon: 'error',
                title: 'Xatolik',
                text: msg,
                confirmButtonText: 'Continue',
            })
        }
        @endif


    </script>
@endsection
