@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-white leading-tight">
        {{ __('Create Permission') }}
    </h2>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="card-title mb-0">Create New Permission</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf

                <!-- Permission Name -->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Permission Name</label>
                    <div class="col-md-10">
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}"
                               required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            Create Permission
                        </button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
