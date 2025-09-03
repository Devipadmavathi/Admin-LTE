@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark" style="color: #2D3748 !important;">
                    <i class="fas fa-sticky-note mr-2" style="color: #6B46C1;"></i> My Notes
                </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('notes.create') }}" class="btn shadow-sm" style="background: linear-gradient(135deg, #6B46C1, #805AD5); color: white; border: none;">
                    <i class="fas fa-plus mr-2"></i> Add Note
                </a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            @forelse($notes as $note)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card note-card shadow-lg border-0">
                        <div class="card-header text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #4C51BF, #667EEA);">
                            <h3 class="card-title mb-0 text-truncate">{{ $note->title }}</h3>
                            <span class="badge" style="background: rgba(255, 255, 255, 0.2); color: #E9D8FD;">{{ $note->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="card-body" style="background-color: #F7FAFC;">
                            <p class="note-content" style="color: #4A5568;">{{ Str::limit($note->body, 120) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between" style="background-color: #EDF2F7; border-top: 1px solid #E2E8F0;">
                            <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm" style="background: linear-gradient(135deg, #D69E2E, #ECC94B); color: white;">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST"
                                  onsubmit="return confirm('Delete this note?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background: linear-gradient(135deg, #E53E3E, #F56565); color: white;">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #F7FAFC, #EDF2F7);">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-sticky-note fa-3x mb-3" style="color: #A0AEC0;"></i>
                            <h4 style="color: #4A5568;">No notes created yet</h4>
                            <p style="color: #718096;">Start by adding your first note to get organized!</p>
                            <a href="{{ route('notes.create') }}" class="btn mt-2" style="background: linear-gradient(135deg, #6B46C1, #805AD5); color: white;">
                                <i class="fas fa-plus mr-2"></i> Create Note
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .note-card {
        border-radius: 16px;
        transition: all 0.3s ease;
        overflow: hidden;
        border: none;
    }

    .note-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }

    .note-card .card-header {
        border-top-left-radius: 16px !important;
        border-top-right-radius: 16px !important;
        border: none;
    }

    .note-content {
        line-height: 1.6;
        min-height: 60px;
        font-size: 15px;
    }

    .btn {
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    body {
        background-color: #F8F9FA;
    }
</style>
@endsection
