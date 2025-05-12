@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Journal Entries</h2>
    <a href="{{ route('journals.create') }}" class="btn btn-success mb-3">Add New Entry</a>
    @foreach ($journals as $journal)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $journal->entry }}</p>
                <span class="badge bg-info">Mood: {{ $journal->mood }}</span>
                <div><small>{{ $journal->created_at->diffForHumans() }}</small></div>
            </div>
        </div>
    @endforeach
</div>
@endsection
