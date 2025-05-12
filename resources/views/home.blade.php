@extends('layouts.app')

@section('content')
<div class="container">

@if(Auth::check())
    <h2>Welcome, {{ Auth::user()->name }}!</h2>
@else
    <h2>Welcome, Guest!</h2>
    <p>Please <a href="{{ route('login') }}">log in</a> to start journaling.</p>
@endif



    {{-- Journal Entry Form --}}
    <form action="{{ route('journals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="entry" class="form-label">Your Journal Entry</label>
            <textarea class="form-control" id="entry" name="entry" required></textarea>
        </div>

        <div class="mb-3">
            <label for="mood" class="form-label">Your Mood</label>
            <select class="form-control" id="mood" name="mood" required>
                <option value="">Select mood</option>
                <option value="happy">😊 Happy</option>
                <option value="sad">😢 Sad</option>
                <option value="neutral">😐 Neutral</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Entry</button>
    </form>

    <hr>
<br><br>
    {{-- Show Previous Entries --}}
    <h4>Your Journal Entries</h4>
    @if($journals->isEmpty())
        <p>No journal entries yet.</p>
    @else
        <ul class="list-group">
            @foreach($journals as $journal)
                <li class="list-group-item">
                    <strong>{{ ucfirst($journal->mood) }}:</strong> {{ $journal->entry }}
                    <br><small>{{ $journal->created_at->format('d M Y, h:i A') }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
