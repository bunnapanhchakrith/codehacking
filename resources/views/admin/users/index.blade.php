@extends('layouts.admin')
@section('content')
    @if (Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    <h1>User</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Create</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" height="50"></td>
                        <td><a href="{{url("admin/users/$user->id/edit")}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <th>{{$user->role->name}}</th>
                        <th>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</th>
                        <th>{{$user->created_at->diffForHumans()}}</th>
                        <th>{{$user->updated_at->diffForHumans()}}</th>
                    </tr>
                @endforeach
            @endif
            
        </tbody>
    </table>
@endsection