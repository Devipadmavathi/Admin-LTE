@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-white leading-tight">
        {{ __('User Management') }}
    </h2>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">👥 Users</h3>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user-plus"></i> Create User
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Direct Permissions</th>
                            <th style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @forelse($user->roles as $role)
                                        <span class="badge badge-info">{{ $role->name }}</span>
                                    @empty
                                        <span class="text-muted">No roles</span>
                                    @endforelse
                                </td>
                                <td>
                                    @forelse($user->permissions as $permission)
                                        <span class="badge badge-warning">{{ $permission->name }}</span>
                                    @empty
                                        <span class="text-muted">None</span>
                                    @endforelse
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
