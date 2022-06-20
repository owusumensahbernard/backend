@extends('layouts.manage')

@section('content')


    <div class="flex-container">
        <div class="columns m-t-10">

            <div class="column" >
                <h1 class="title">View Permission Details</h1>

            </div>
            <div class="column">
                <a href="{{route('permissions.edit', $permission->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-edit m-r-10"></i>
                    Edit
                </a>
            </div>
        </div>
        <hr class="m-t-0">


        <div class="columns">
            <div class="column>">
                <form action="{{route('permissions.update', $permission->id)}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="display_name" class="label">Name (Display Name)</label>
                        <p class="control">
                            <input type="text"  required class="input" name="display_name" id="display_name" value="{{$permission->display_name}}">
                        </p>
                    </div>

{{--                    <div class="field">--}}
{{--                        <label for="name" class="label">Slug <small>(cannot be changed)</small></label>--}}
{{--                        <p class="control">--}}
{{--                            <input type="text" required class="input" name="name" id="name" value="{{$permission->email}}">--}}
{{--                        </p>--}}
{{--                    </div>--}}

                    <div class="field">
                        <label for="description" class="label">Description</label>
                        <p class="control">
                            <input type="text" class="input" required name="description" id="description">

                        </p>
                    </div>

                    <button class="button is-primary">Edit Permission</button>
                </form>
            </div>
        </div>


@endsection
