@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Katigoriya tahrirlash</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

{{--                                {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}--}}
                <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nom:</strong>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Havola:</strong>
                                <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </div>
                    {{--                {!! Form::close() !!}--}}
                </form>
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
