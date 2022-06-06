@extends('layouts.manage')

@section('content')


    <div class="flex-container">
        <div class="columns m-t-10">

            <div class="column" >
                <h1 class="title">View Permission Details</h1>

            </div>
            <div class="column">
                <a href="{{route('permissions.edit', $user->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-edit m-r-10"></i>
                    Edit
                </a>
            </div>
        </div>
        <hr class="m-t-0">
