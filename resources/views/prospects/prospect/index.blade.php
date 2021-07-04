@extends('layouts.app')

@section('title', $prospect->name . '\'s Dashboard')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h1>Prospect Dashboard <small class="text-muted">{{ $prospect->name }}</small></h1>
            </div>
        </div>
    </div>
@endsection
