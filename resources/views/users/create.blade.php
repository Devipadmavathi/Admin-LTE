@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-user-plus"></i> Create User
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">📝 Fill in User Details</h3>
                    </div>

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="card-body">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter user name...">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Enter user email...">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" required
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Enter password...">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                       class="form-control"
                                       placeholder="Re-enter password...">
                            </div>

                            <!-- Roles -->
                            <div class="form-group">
                                <label for="roles">Assign Roles</label>
                                <select multiple name="roles[]" id="roles" class="form-control select2">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ in_array($role->name, old('roles', [])) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Permissions -->
                            <div class="form-group">
                                <label for="permissions">Assign Direct Permissions</label>
                                <select multiple name="permissions[]" id="permissions" class="form-control select2">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->name }}"
                                            {{ in_array($permission->name, old('permissions', [])) ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="card-footer text-center">
                            <a href="{{ route('users.index') }}" class="btn btn-default mx-2">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary mx-2">
                                <i class="fas fa-save"></i> Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
