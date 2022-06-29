
@extends('layouts.manage')
@section('content')




    <div class="flex-container">
        <div class="columns m-t-10">

            <div class="column" >
                <h1 class="title">Create New User</h1>
            </div>

        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column>">
<form action="{{route('users.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="field">
         <label for="name" class="label">Name</label>
        <p class="control">
            <input type="text" class="input" name="name" required id="name">
        @error('name')
        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
        @enderror
        </p>
    </div>

    <div class="field">
        <label for="email" class="label">Email:</label>
        <p class="control">
            <input type="text" class="input" name="email" required id="email">
        @error('email')
        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
        @enderror
        </p>
    </div>

    <div class="field" >
        <label for="password" class="label">Password</label>
        <p class="control">
            <input type="password" class="input" required name="password" id="password" :disabled="auto_password" v-if="!auto_password" placeholder="Manually Enter Password">



            <b-checkbox  name="auto_generate" class="m-t-25" style="margin-top: 15px;" :checked="true" v-model="auto_password">Auto Generate Password</b-checkbox>
        </p>
    </div>

<button class="button is-success" type="submit">Create User</button>
</form>
            </div>
        </div>

@endsection
        @if (session()->has('success'))
            <div x-data="{show: true}"
                 x-init="setTimeout(() => show = false, 4000)"
                 x-show = "show"
                 class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                <p> {{ session('success') }}</p></div>
        @endif



    @section('scripts')
    <script>
        var app = new Vue({
             el: '#app',
            data: {
                 auto_password: true,
            }
        });
</script>
@endsection

