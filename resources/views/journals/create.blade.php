@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Journal Entry</h2>
    <form method="POST" action="{{ route('journals.store') }}">
        @csrf
        <div class="mb-3">
            <label for="entry">Journal Entry</label>
            <textarea name="entry" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="mood">Mood</label>
            <select name="mood" class="form-control" required>
                <option value="happy">😊 Happy</option>
                <option value="sad">😢 Sad</option>
                <option value="neutral">😐 Neutral</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Entry</button>
    </form>
</div>
@endsection
