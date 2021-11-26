<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\PendingLend;
use Illuminate\Http\Request;
use App\Mail\AcceptLendMail;
use Illuminate\Support\Facades\Mail;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role->name == 'admin') {
            $lends = Lend::latest()->paginate(25);
        } else {
            $lends = Lend::where('user_id', '=', $user->id)->paginate(25);
        }
        return view('lends.index', compact('lends'))
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
        $pendinglend = PendingLend::find($request->pendinglend);
        $pendinglend->is_accepted = true;
        $pendinglend->save();

        $lend = new Lend();
        $lend->user_id = $pendinglend->user_id;
        $lend->computer_id = $pendinglend->computer_id;
        $lend->start_date = $pendinglend->request_start_date;
        $lend->end_date = $pendinglend->request_end_date;
        $lend->save();

        $lend->logs()->create([
            'comment' => 'Lend created',
            'user_id' => auth()->user()->id
        ]);
        Mail::to($lend->user->email)->send(new AcceptLendMail($lend));
        return redirect()->route('lends.index')
            ->with('success', 'Reservation acceptée');
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
        $lend = Lend::find($id);
        Mail::to($lend->user->email)->send(new AcceptLendMail($lend));
        $lend->delete();
        return redirect()->route('lends.index')
            ->with('success', 'Reservation bien supprimée');
    }
}
