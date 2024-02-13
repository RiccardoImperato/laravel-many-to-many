@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Modifica tipo: {{ $technology->title }}</h2>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary btn-sm my-3">Indietro</a>
    </div>
    <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
@endsection
