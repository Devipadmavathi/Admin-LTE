@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-white leading-tight">
        {{ __('Permission Management') }}
    </h2>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">🔐 Permissions</h3>
            <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-key"></i> Create Permission
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Guard Name</th>
                            <th style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                            <tr>
                                <td class="text-center">{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this permission?');">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No permissions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
