@extends('layouts.app')

@section('title', 'Új Megye Létrehozása')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>Új Megye Létrehozása</h1>

        <div class="card mt-4">
            <div class="card-body">
                <form method="POST" action="{{ route('counties.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Megye Neve *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="badge" class="form-label">Címer Kép URL</label>
                        <input type="url" class="form-control @error('badge') is-invalid @enderror" id="badge"
                            name="badge" value="{{ old('badge') }}">
                        <small class="text-muted">Opcionális. Pl: https://placehold.co/96x96/1b4f72/ffffff?text=XX</small>
                        @error('badge')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Mentés</button>
                        <a href="{{ route('counties.index') }}" class="btn btn-secondary">Mégsem</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
