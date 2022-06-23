@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Kategoriyani tahrirlash</h2>
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
                                <strong>Nomi:</strong>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            <label for="parent_id">
                                Parent-kategoriya:
                            </label>
                            <select class="form-select" name="parent_id" id="parent_id" >
                                <option value="{{$category->parent_id}}" selected>
                                    @if($category->parent_id==0)
                                        Yo'q
                                    @else
                                        {{$category->cat2->name}}
                                    @endif
                                </option>
                                @if($category->parent_id != 0)
                                    <option value="0" >Yo'q</option>
                                @endif

                                @foreach($categories as $cat)
                                    @if($cat->id==$category->id) @continue @endif
                                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
                                @endforeach
                            </select>
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
