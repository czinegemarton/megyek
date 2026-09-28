<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CountyController extends Controller
{
    /**
     * Összes megye listázása keresési lehetőséggel.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search', '');

        $counties = County::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10);

        return view('counties.index', [
            'counties' => $counties,
            'search' => $search,
        ]);
    }

    /**
     * Az új megye létrehozásához szükséges form megjelenítése.
     */
    public function create(): View
    {
        return view('counties.create');
    }

    /**
     * Az új megye mentése az adatbázisba.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:counties',
            'badge' => 'nullable|string|url',
        ]);

        County::create($validated);

        return redirect()->route('counties.index')
            ->with('success', 'Megye sikeresen létrehozva.');
    }

    /**
     * Az adott megye szerkesztéshez szükséges form megjelenítése.
     */
    public function edit(County $county): View
    {
        return view('counties.edit', ['county' => $county]);
    }

    /**
     * Az adott megye módosítása az adatbázisban.
     */
    public function update(Request $request, County $county): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:counties,name,' . $county->id,
            'badge' => 'nullable|string|url',
        ]);

        $county->update($validated);

        return redirect()->route('counties.index')
            ->with('success', 'Megye sikeresen módosítva.');
    }

    /**
     * Az adott megye törlése az adatbázisból.
     */
    public function destroy(County $county): RedirectResponse
    {
        $county->delete();

        return redirect()->route('counties.index')
            ->with('success', 'Megye sikeresen törölve.');
    }
}
