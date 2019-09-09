@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h3>{{$thread->name}}</h3>

        <p>{{$thread->body}}</p>

        <div class="d-flex justify-content-between">
            <p style="margin-left: auto">{{"{$thread->author->name} posted {$thread->created_at->diffForHumans()}"}}</p>
        </div>

        <hr>

        <vue-answers :thread="{{$thread}}" :new-answer="newAnswer"></vue-answers>

        @auth()
            <vue-message :thread-id="{{$thread->id}}" v-on:answer-added="addNewAnswer"></vue-message>
        @endauth
    </div>
@endsection
