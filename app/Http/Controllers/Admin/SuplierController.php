<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return view('suplier.index', compact('supliers'));
    }

    public function create()
    {
        return view('suplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namasuplier' => 'required|string|max:255',
            'alamatsuplier' => 'required|string',
            'telpsuplier' => 'required',
            'email' => 'required|email',
        ]);

        Suplier::create($request->all());

        return redirect()->route('suplier.index')->with('success', 'Suplier created successfully.');
    }

    public function edit($id_suplier)
    {
        $suplier = Suplier::findOrFail($id_suplier);
        return view('suplier.edit', compact('suplier'));
    }

    public function update(Request $request, $id_suplier)
    {

        $request->validate([
            'namasuplier' => 'required|string|max:255',
            'alamatsuplier' => 'required|string',
            'telpsuplier' => 'required',
            'email' => 'required|email',
        ]);

        $suplier = Suplier::find($id_suplier);


        $suplier->update($request->all());

        return redirect()->route('suplier.index')->with('success', 'Suplier updated successfully.');
    }


    public function destroy($id_suplier)
    {
        Log::info('Deleting suplier with ID: ' . $id_suplier);
        $suplier = Suplier::find($id_suplier);

        if (!$suplier) {
            Log::error('Suplier with ID ' . $id_suplier . ' not found.');
            return redirect()->route('suplier.index')->with('error', 'Suplier not found.');
        }
        $suplier->delete();
        return redirect()->route('suplier.index')->with('success', 'Suplier deleted successfully.');
    }

    public function print()
    {
        $supliers = Suplier::all();
        return view('suplier.print', compact('supliers'));
    }
}
