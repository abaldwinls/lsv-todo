@extends('layouts.default')

@section('title', __('User | ') . $user->username)

@section('content')
<div class="user-container">
    <div class="user-header">
        <div class="user-title"><?= $user->username ?>'s Project List</div>
    </div>
    
    <div class="user-table">
        <table>
            <tr>
                <th>Project</th>
                <th>Members</th>
                <th>Estimated Hours</th>
                <th>Actions</th>
            </tr>

            <?php foreach($projects as $project): ?>
                @include('components.project_row')
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="nav-container">
    <a class="lsv-button" href="/">User List</a>
</div>
@endsection