@extends('layouts.default')

@section('title', __('Users'))

@section('content')
<div class="users-container">
    <div class="users-header">
        <div class="users-title">Users</div> 
    </div>
    
    <div class="users-table">
        <table>
            <tr>
                <th>User</th>
                <th>Estimated Hours</th>
                <th>Actions</th>
            </tr>

            <?php foreach($users as $user): ?>
                @include('components.user_row')
            <?php endforeach; ?>
        </table>
    </div>
</div>
@endsection