@extends('layouts.app')

@section('content')
    <h1>Files</h1>
    <a href="{{ route('files.create') }}">Upload File</a>
    <ul>
        @foreach($files as $file)
            <li>{{ $file->file_name }} - {{ $file->file_type }}
                <form action="{{ route('files.destroy', $file->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
