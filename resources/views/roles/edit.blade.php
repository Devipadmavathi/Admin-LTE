@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-white leading-tight">
        {{ __('Edit Role: ' . $role->name) }}
    </h2>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title mb-0">Edit Role: {{ $role->name }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Role Name -->
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Role Name</label>
                        <div class="col-md-10">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name', $role->name) }}"
                                   required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Permissions Assignment -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Assign Permissions</label>
                        <div class="col-md-10">
                            <div class="row">
                                @forelse($permissions as $permission)
                                    <div class="col-md-4 mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permissions[]"
                                                   value="{{ $permission->name }}"
                                                   id="permission-{{ $permission->id }}"
                                                   class="custom-control-input"
                                                   {{ in_array($permission->name, old('permissions', $rolePermissions)) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="permission-{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted">No permissions available. Please create some first.</p>
                                    </div>
                                @endforelse
                            </div>
                            @error('permissions')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                Update Role
                            </button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
