<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
{
    /**
     * Összes város listázása keresési, szűrési és lapozási lehetőséggel.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search', '');
        $countyId = $request->input('county_id', '');

        $cities = City::query()
            ->with('county')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('zip_code', 'like', "%{$search}%");
            })
            ->when($countyId, function ($query) use ($countyId) {
                $query->where('id_county', $countyId);
            })
            ->orderBy('name')
            ->paginate(15);

        $counties = County::orderBy('name')->get();

        return view('cities.index', [
            'cities' => $cities,
            'counties' => $counties,
            'search' => $search,
            'countyId' => $countyId,
        ]);
    }

    /**
     * Az új város létrehozásához szükséges form megjelenítése.
     */
    public function create(): View
    {
        $counties = County::orderBy('name')->get();

        return view('cities.create', ['counties' => $counties]);
    }

    /**
     * Az új város mentése az adatbázisba.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_county' => 'required|exists:counties,id',
            'name' => 'required|string|max:255',
            'zip_code' => 'required|string|size:4|regex:/^\d{4}$/',
            'population' => 'required|integer|min:0',
        ]);

        City::create($validated);

        return redirect()->route('cities.index')
            ->with('success', 'Város sikeresen létrehozva.');
    }

    /**
     * Az adott város szerkesztéshez szükséges form megjelenítése.
     */
    public function edit(City $city): View
    {
        $counties = County::orderBy('name')->get();

        return view('cities.edit', [
            'city' => $city,
            'counties' => $counties,
        ]);
    }

    /**
     * Az adott város módosítása az adatbázisban.
     */
    public function update(Request $request, City $city): RedirectResponse
    {
        $validated = $request->validate([
            'id_county' => 'required|exists:counties,id',
            'name' => 'required|string|max:255',
            'zip_code' => 'required|string|size:4|regex:/^\d{4}$/',
            'population' => 'required|integer|min:0',
        ]);

        $city->update($validated);

        return redirect()->route('cities.index')
            ->with('success', 'Város sikeresen módosítva.');
    }

    /**
     * Az adott város törlése az adatbázisból.
     */
    public function destroy(City $city): RedirectResponse
    {
        $city->delete();

        return redirect()->route('cities.index')
            ->with('success', 'Város sikeresen törölve.');
    }
}
