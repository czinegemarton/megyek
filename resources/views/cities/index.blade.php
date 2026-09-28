@extends('layouts.app')

@section('title', 'Városok Listája')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h1>Magyar Városok</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('cities.create') }}" class="btn btn-primary">+ Új Város</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('cities.index') }}" class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Keresés név vagy irányítószám alapján..."
                    value="{{ $search }}">
            </div>
            <div class="col-md-3">
                <select name="county_id" class="form-select">
                    <option value="">-- Összes Megye --</option>
                    @foreach ($counties as $county)
                        <option value="{{ $county->id }}" @selected($countyId == $county->id)>
                            {{ $county->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-secondary w-100">Szűrés</button>
            </div>
            <div class="col-md-3">
                @if ($search || $countyId)
                    <a href="{{ route('cities.index') }}" class="btn btn-outline-secondary w-100">Törlés</a>
                @endif
            </div>
        </form>
    </div>
</div>

@if ($cities->isEmpty())
    <div class="alert alert-info">
        Nincs megjeleníthető város.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Város Neve</th>
                    <th>Megye</th>
                    <th>Irányítószám</th>
                    <th class="text-end">Népesség</th>
                    <th class="text-center">Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>
                            <strong>{{ $city->name }}</strong>
                        </td>
                        <td>
                            <a href="{{ route('cities.index', ['county_id' => $city->county->id]) }}"
                                class="btn btn-sm btn-outline-info">
                                {{ $city->county->name }}
                            </a>
                        </td>
                        <td>
                            <code>{{ $city->zip_code }}</code>
                        </td>
                        <td class="text-end">
                            <span class="badge bg-success">
                                {{ number_format($city->population, 0, ',', ' ') }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('cities.edit', $city) }}" class="btn btn-sm btn-warning">Szerkesztés</a>
                            <form method="POST" action="{{ route('cities.destroy', $city) }}" style="display: inline;"
                                onsubmit="return confirm('Biztosan törölni szeretné?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $cities->links() }}
    </div>
@endif
@endsection
