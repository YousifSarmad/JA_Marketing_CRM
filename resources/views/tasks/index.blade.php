@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <h1>Tasks List</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name }}
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
