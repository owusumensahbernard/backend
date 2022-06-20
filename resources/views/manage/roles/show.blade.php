@extends('layouts.manage')

@section('content')


    <div class="flex-container">
        <div class="columns m-t-10">

            {{--            style="margin-left: 250px;"--}}

            <div class="column"  >
                <h1 class="title">{{$role->display_name}}<small style="margin-left: 25px;"><em>{{$role->name}}</em></small style></h1>
                <h5>{{$role->description}}</h5>
            </div>

            <div class="column" >
                <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is pulled right">
                    <i class="fa fa-user-add m-r-10"></i>
                    Edit this role</a>
            </div>

        </div>
        <hr class="m-t-0">


    <div class="columns">
        <div class="column">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <h2 class="title">Permissions:</h2>
                            <ul>
{{--                                @foreach--}}
{{--                                ($role->permissions as $r)--}}
{{--                                    <li>{{$r->display_name}}<em>{{$r->description}}</em></li>--}}
{{--                                    @endforeach--}}
                            </ul>

                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>


@endsection
