@extends('layouts.app')

@section('title', 'Megyék Listája')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h1>Magyarország Megyéi</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('counties.create') }}" class="btn btn-primary">+ Új Megye</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('counties.index') }}" class="d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Keresés megye neve alapján..."
                value="{{ $search }}">
            <button type="submit" class="btn btn-outline-secondary">Keresés</button>
            @if ($search)
                <a href="{{ route('counties.index') }}" class="btn btn-outline-secondary">Törlés</a>
            @endif
        </form>
    </div>
</div>

@if ($counties->isEmpty())
    <div class="alert alert-info">
        Nincs megjeleníthető megye.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Cím</th>
                    <th>Megye Neve</th>
                    <th class="text-end">Városok Össznépes.</th>
                    <th class="text-center">Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($counties as $county)
                    <tr>
                        <td class="text-center" style="width: 100px;">
                            @if ($county->badge)
                                <img src="{{ $county->badge }}" alt="{{ $county->name }}" class="img-thumbnail"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">Nincs</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $county->name }}</strong>
                        </td>
                        <td class="text-end">
                            <span class="badge bg-info text-dark">
                                {{ number_format($county->totalPopulation(), 0, ',', ' ') }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('counties.edit', $county) }}" class="btn btn-sm btn-warning">Szerkesztés</a>
                            <form method="POST" action="{{ route('counties.destroy', $county) }}" style="display: inline;"
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
        {{ $counties->links() }}
    </div>
@endif
@endsection
