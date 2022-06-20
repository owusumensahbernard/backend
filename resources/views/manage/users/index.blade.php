@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">

{{--            style="margin-left: 250px;"--}}

            <div class="column"  >
          <h1 class="title">Manage Users</h1>
            </div>

            <div class="column" >
               <a href="{{route('users.create')}}" class="button is-primary is pulled right">
                   <i class="fa fa-user-add m-r-10"></i>
                 <button>Create New User</button> </a>
            </div>

        </div>
<hr>
        <div class="card">
            <div class="card-content">
        <table class="table is-narrow" style="margin-left: 0px;">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date Created</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td><a class="button is-outlined" href="{{route('users.show', $user->id)}}">Edit</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
                    </div>
    </div>


    {{$users->links()}}

@endsection
