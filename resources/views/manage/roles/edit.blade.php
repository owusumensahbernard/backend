@extends('layouts.manage')

@section('content')


    <div class="flex-container">
        <div class="columns m-t-10">

            {{--            style="margin-left: 250px;"--}}

            <div class="column"  >
                <h1 class="title">Edit {{$role->display_name}}</h1>

            </div>

            <div class="column" >
                <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is pulled right">
                    <i class="fa fa-user-add m-r-10"></i>
                    Edit this role</a>
            </div>

        </div>
        <hr class="m-t-0">


{{--        1st column--}}
        <form action="{{route('roles.update', $role->id)}}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <div class="field">
                                    <p class="control">
                                <h2 class="title">Role Details:</h2>
                                    <label for="display_name" class="label">Name (Human Readable)</label>
                               <input type="text" class="input" name="display_name" value="{{$role->display_name}}">
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">

                                    <label for="name" class="label">Slug (Cannot be Edited)</label>
                                    <input type="text" class="input" name="name" value="{{$role->name}}">
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">

                                        <label for="description" class="label">Description</label>
                                        <input type="text" class="input" value="{{$role->description}}" name="description" id="description">
                                    </p>
                                </div>

                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>



        {{--        2nd column--}}

        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Permissions:</h2>
                                <ul>
                                    <div class="field">
                                        <select name="" id="">
                                            @foreach
                               ($permissions as $permission)
                                            <option value="{{$permission->name}}">
                                             {{$permission->display_name}}
                                            </option>
                                                @endforeach
                                        </select>

                                    </div>


                                </ul>

                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>


@endsection
