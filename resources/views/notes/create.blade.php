@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-plus-circle"></i> Create a New Note
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Notes
                </a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-outline card-success shadow">
                    <div class="card-header">
                        <h3 class="card-title">📝 Fill in the details</h3>
                    </div>
                    <form action="{{ route('notes.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       placeholder="Enter note title..." required>
                            </div>

                            <!-- Body -->
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" rows="4" class="form-control"
                                          placeholder="Write your note details here..." required></textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="card-footer text-center">
                            <a href="{{ route('notes.index') }}" class="btn btn-default mx-2">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success mx-2">
                                <i class="fas fa-save"></i> Save Note
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
