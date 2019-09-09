@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('threads.store')}}">
            @csrf
            <div class="form-group">
                <label for="thread-name">Thread title</label>
                <input type="text" class="form-control" id="thread-name" name="name">
                <label for="message-textarea">Message</label>
                <textarea class="form-control" id="message-textarea" rows="5" name="body"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Create</button>
            </div>
        </form>
    </div>
@endsection
