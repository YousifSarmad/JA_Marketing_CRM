@extends('layouts.app')

@section('content')
    <h1>Tags</h1>
    <a href="{{ route('tags.create') }}">Create Tag</a>
    <ul>
        @foreach($tags as $tag)
            <li>{{ $tag->name }}
                <a href="{{ route('tags.edit', $tag->id) }}">Edit</a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
