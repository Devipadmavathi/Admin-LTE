@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-edit"></i> Edit Note
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
                <div class="card card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">✏️ Update the details</h3>
                    </div>
                    <form action="{{ route('notes.update', $note->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"
                                       value="{{ $note->title }}"
                                       class="form-control" placeholder="Update note title..." required>
                            </div>

                            <!-- Body -->
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" rows="4" class="form-control"
                                          placeholder="Update your note details..." required>{{ $note->body }}</textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="card-footer text-center">
                            <a href="{{ route('notes.index') }}" class="btn btn-default mx-2">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary mx-2">
                                <i class="fas fa-sync-alt"></i> Update Note
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
