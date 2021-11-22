<?php

namespace App\Http\Controllers;

use App\Models\PendingLend;
use Illuminate\Http\Request;

class PendingLendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingLends = PendingLend::latest()->paginate(25);

        return view('pending-lends.index', compact('pendingLends'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dates = str_replace(" ", "", $request->daterange);
        list($startDate, $endDate) = explode("-", $dates);

        $user = auth()->user();
        $pendingLend = new PendingLend();

        $pendingLend->user_id = $user->id;
        $pendingLend->computer_id = $request->computer_id;
        $pendingLend->request_start_date = $startDate;
        $pendingLend->request_end_date = $endDate;
        $pendingLend->is_accepted = false;

        $pendingLend->save();
        return redirect()->back()
            ->with('success', 'Reference enregistré.');
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
