@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-white leading-tight">
        {{ __('Role Management') }}
    </h2>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">🛡️ Roles</h3>
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user-plus"></i> Create Role
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td class="text-center">{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @forelse($role->permissions as $permission)
                                        <span class="badge badge-info">{{ $permission->name }}</span>
                                    @empty
                                        <span class="text-muted">No permissions</span>
                                    @endforelse
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this role?');">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No roles found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
