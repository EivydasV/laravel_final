@extends('main')

@section('content')

<div class="container">
    <form action="/add/event" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Starting date</label>
            <input type="date" id="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Title</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
</div>

@endsection
