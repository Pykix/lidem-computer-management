<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::latest()->paginate(25);
        return view('providers.index', compact('providers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
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
            'name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'siret' => 'required',
            'is_intern' => 'required',
        ]);
        $inputs = $request->all();
        if ($inputs['is_intern'] == null) {
            $inputs['is_intern'] = 0;
        }
        Provider::create($inputs);

        return redirect()->route('providers.index')
            ->with('success', 'Prestataire ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);
        return view('providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));
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
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'siret' => 'required',
            'is_intern' => 'required',
        ]);
        $provider = Provider::find($id);

        $provider->update($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Prestataire ajouté');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();

        return redirect()->route('providers.index')
            ->with('success', 'Prestataire supprimé');
    }
}
