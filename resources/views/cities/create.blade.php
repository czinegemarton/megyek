@extends('layouts.app')

@section('title', 'Új Város Létrehozása')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>Új Város Létrehozása</h1>

        <div class="card mt-4">
            <div class="card-body">
                <form method="POST" action="{{ route('cities.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="id_county" class="form-label">Megye *</label>
                        <select class="form-select @error('id_county') is-invalid @enderror" id="id_county"
                            name="id_county" required>
                            <option value="">-- Válasszon Megyét --</option>
                            @foreach ($counties as $county)
                                <option value="{{ $county->id }}" @selected(old('id_county') == $county->id)>
                                    {{ $county->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_county')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Város Neve *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Irányítószám *</label>
                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                            id="zip_code" name="zip_code" value="{{ old('zip_code') }}" placeholder="0000"
                            maxlength="4" required>
                        <small class="text-muted">Pontosan 4 számjegy</small>
                        @error('zip_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="population" class="form-label">Népesség *</label>
                        <input type="number" class="form-control @error('population') is-invalid @enderror"
                            id="population" name="population" value="{{ old('population') }}" min="0" required>
                        @error('population')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Mentés</button>
                        <a href="{{ route('cities.index') }}" class="btn btn-secondary">Mégsem</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
