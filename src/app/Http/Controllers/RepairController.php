<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\Computer;
use App\Models\Provider;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs = Repair::latest()->paginate(25);
        return view('repairs.index', compact('repairs'))
            ->with('i', request()->input('page', 1), -1 * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $computers = Computer::all();
        $providers = Provider::all();
        $breakdowns = Breakdown::all();
        dd($breakdowns);

        return view('repairs.create', compact('computers', 'providers', 'breakdowns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $repair = new Repair();
        $repair->computer_id = $request->computer_id;
        $repair->provider_id = $request->provider_id;
        $repair->supported_at = date('Y-m-d');
        $repair->is_broken = true;
        $repair->save();
        $repair->breakdowns()->attach(
            $request->breakdown_id
        );
        $repair->logs()->create([
            'user_id' => auth()->user()->id,
            'comment' => "repair created"
        ]);
        return redirect()->route('repairs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
