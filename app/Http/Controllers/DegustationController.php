<?php

namespace App\Http\Controllers;

use App\Http\Requests\DegustationStoreRequest;
use App\Models\Degustation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DegustationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $degustation = Degustation::orderBy('created_at', 'DESC')->simplePaginate(1);
        return view('degustation/list', ['degustations' => $degustation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO:Dodać podgląd
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DegustationStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DegustationStoreRequest $request)
    {
        $degustation = Degustation::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        $degustation->link = route('degustations.show', ['degustation' => $degustation->id]);

        //TODO:Dodać podgląd
        return response()->json($degustation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Degustation  $degustation
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Degustation $degustation)
    {
        //TODO:Dodać podgląd
        return response()->json($degustation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Degustation  $degustation
     * @return \Illuminate\Http\Response
     */
    public function edit(Degustation $degustation)
    {
        //TODO:Dodać podgląd
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Degustation  $degustation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Degustation $degustation)
    {
        $degustation->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        return redirect()->route('degustations.show', ['degustation' => $degustation->id])
            ->with(['success' => 'Zaktualizowano degustację.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Degustation  $degustation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Degustation $degustation)
    {
        $degustation->delete();
        return redirect()->route('degustations.index')->with(['success' => 'Usunięto twoją degustację']);
    }
}
