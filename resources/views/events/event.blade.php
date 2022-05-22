@extends('main')

@section('content')
    <h1>
        {{$event->title}}
    </h1>

    <div class="container">
        <form action="/register/event" method="POST">
            @csrf
            <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" id="telephone" name="telephone" class="form-control">
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-primary" type="submit">Request</button>
            </div>
        </form>
    </div>

    @if ($show)
        <div>
            @foreach ($event->eventUser as $user)
                <div class="border border-dark" style="width: 25vh">
                    <div class="p-2">
                        {{$user->name}}
                        <a href="/accept/event/{{$user->id}}/accept" class="btn btn-primary">Accept</a>
                        <a href="/accept/event/{{$user->id}}/decline" class="btn btn-primary">Decline</a>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="/delete/event/{{$event->id}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">add</button>
        </form>
    @endif



@endsection
