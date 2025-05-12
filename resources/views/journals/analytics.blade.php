@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mood Analytics</h2>
    <ul class="list-group">
        <li class="list-group-item">😊 Happy: {{ $happyCount }}</li>
        <li class="list-group-item">😢 Sad: {{ $sadCount }}</li>
        <li class="list-group-item">😐 Neutral: {{ $neutralCount }}</li>
    </ul>
</div>
@endsection
