@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">

            {{--            style="margin-left: 250px;"--}}

            <div class="column"  >
                <h1 class="title">Manage Permissions</h1>
            </div>

            <div class="column" >
                <a href="{{route('permissions.create')}}" class="button is-primary is pulled right">
                    <i class="fa fa-user-add m-r-10"></i>
                    <button>Create New Permission</button> </a>
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
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <th scope="row">{{$permission->id}}</th>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->display_name}}</td>
                            <td>{{$permission->description}}</td>
                            <td><a class="button is-outlined" href="{{route('permissions.show', $permission->id)}}">View</a></td>
                            <td><a class="button is-outlined" href="{{route('permissions.edit', $permission->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{$permissions->links()}}



@endsection
