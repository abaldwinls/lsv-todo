@extends('layouts.default')

@section('title', __('User | ') . $project['project']->project_name)

@section('content')
    @include('components.project')
    <div class="nav-container">
       <button class="lsv-button" onClick="window.history.back();"><- Back</button> 
    </div>
@endsection