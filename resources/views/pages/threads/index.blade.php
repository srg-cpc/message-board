@extends('layouts.layout')

@section('content')

    <div class="container mt-5 container-custom-width">
{{--        @foreach($threads as $thread)--}}
{{--            <div class="container">--}}
{{--                <a class="text-dark text-decoration-none" href="{{route('threads.show',$thread->id)}}">--}}
{{--                    <div class="container mt-4 overflow-hidden" style="max-height: 150px;">--}}
{{--                        <h4>{{$thread->name}}</h4>--}}
{{--                        <p>{{substr($thread->body, 0, 500)}}</p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <p class="" style="margin-left: auto">{{$thread->author->name}}--}}
{{--                        posted {{$thread->created_at->diffForHumans()}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--        <vue-threads :threads="{{$threads}}"></vue-threads>--}}
        <vue-threads></vue-threads>

    </div>

@endsection
