@extends('layouts.app')

@section('content')
    <h1>Create Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Tag Name">
        <button type="submit">Save</button>
    </form>
@endsection
