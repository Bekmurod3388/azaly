@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Category</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">


                {{--                {!! Form::open(array('route' => 'admin.users.store','method'=>'POST')) !!}--}}
                <form action="{{route('admin.categories.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Name">
{{--                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control mb-3')) !!}--}}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Slug:</strong>
                                <input type="text" name="slug" class="form-control mb-3" placeholder="Slug">
{{--                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control mb-3')) !!}--}}
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
