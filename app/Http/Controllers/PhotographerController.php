<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photographer;

class PhotographerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'work_days' => 'nullable|array',
            'work_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        Photographer::create([
            'name' => $request->name,
            'team_name' => $request->team_name,
            'phone' => $request->phone,
            'work_days' => $request->input('work_days', []),
        ]);

        return back()->with('success', 'Fotografer baru berhasil ditambahkan!');
    }

    public function update(Request $request, Photographer $photographer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'work_days' => 'nullable|array',
            'work_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        $photographer->update([
            'name' => $request->name,
            'team_name' => $request->team_name,
            'phone' => $request->phone,
            'work_days' => $request->input('work_days', []),
        ]);

        return back()->with('success', 'Detail fotografer berhasil diperbarui!');
    }

    public function destroy(Photographer $photographer)
    {
        $photographer->delete();
        return back()->with('success', 'Fotografer berhasil dihapus!');
    }
}
