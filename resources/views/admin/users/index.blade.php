@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Users Management</h2>
                        </div>
                        <div class="pull-right">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th class="w-25">Action</th>
                        </tr>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('role-list')
                                        <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('role-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.users.edit',$user->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>


                    {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
