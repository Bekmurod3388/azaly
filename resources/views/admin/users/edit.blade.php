@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Foydalanuvchini tahrirlash </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
{{--                @if (count($errors) > 0)--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}

                {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nomi:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Nomi','class' => 'form-control mb-3')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Emaili:</strong>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control mb-3')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Parol:</strong>
                            {!! Form::password('password', array('placeholder' => 'Parol','class' => 'form-control mb-3')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Parolni tasdiqlang:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => 'Parolni tasdiqlang','class' => 'form-control mb-3')) !!}
                        </div>
                    </div>
                    @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control mb-3','multiple')) !!}
                        </div>
                    </div>
                    @endif
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
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
