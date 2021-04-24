@extends('layouts.default')

@section('title', __('Projects'))

@section('content')
    <?php foreach($projects as $project): ?>
        @include('components.project')
    <?php endforeach; ?>
@endsection