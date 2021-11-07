<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::latest()->paginate(4);

        return view('computers.index', compact('computers'))
            ->with('i', request()->input('page', 1), -1 * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
        ]);

        Computer::create([
            'serial_number' => $request->serial_number,
            'brand_id' => 1,
            'comment' => $request->description,
            'slug' => Str::slug($request->serial_number),
            'is_avaible' => 1,
            'picture' => 'https://images.saymedia-content.com/.image/ar_4:3%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:eco%2Cw_1200/MTc0NDY0NTMyOTQzNDgwNDU0/buying-your-first-desktop-computer.jpg'
        ]);

        return redirect()->route('computers.index')
            ->with('success', 'Reference enregistré.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $computer)
    {
        return view('computers.show', compact('computer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $computer)
    {
        return view('computers.edit', compact('computer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'serial_number' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
        ]);

        $computer->update([
            'serial_number' => $request->serial_number,
            'brand_id' => 1,
            'comment' => $request->description,
            'slug' => Str::slug($request->serial_number),
            'is_avaible' => 1,
            'picture' => 'https://images.saymedia-content.com/.image/ar_4:3%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:eco%2Cw_1200/MTc0NDY0NTMyOTQzNDgwNDU0/buying-your-first-desktop-computer.jpg'
        ]);

        return redirect()->route('computers.index')
            ->with('success', 'Reference enregistré.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computers.index')
            ->with('success', 'Reference enregistré.');
    }
}
