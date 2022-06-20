
@extends('layouts.manage')
@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">

            <div class="column" >
                <h1 class="title">Edit User</h1>
            </div>

        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column>">
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text"  required class="input" name="name" id="name" value="{{$user->name}}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <p class="control">
                            <input type="text" required class="input" name="email" id="email" value="{{$user->email}}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password</label>

                            <b-radio-group v-model="password_options">
                                <div class="field">
                                <b-radio value="keep">Do not Change Password</b-radio>
                                </div>
                                <div class="field">
                                    <b-radio value="auto">Auto Generate Password</b-radio>
                                </div>
                                <div class="field">
                                    <b-radio value="manual">Manually set New Password</b-radio>


                               <p class="control">
                            <input type="text" class="input" required name="password" id="password" v-if="password_options == 'manual'" placeholder="Enter Password">

                        </p>
                                </div>

                        </b-radio-group>
                    </div>

                    <button class="button is-primary">Edit User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                password_options:'keep',
            }
        });
    </script>
@endsection
