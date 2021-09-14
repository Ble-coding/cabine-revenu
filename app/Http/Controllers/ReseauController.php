<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Reseau;

class ReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $reseaux = Reseau::with('user')
                ->select('reseaus.*', DB::raw(
                    '(SELECT COUNT(DISTINCT(user_id))
                        FROM reseaus
                    ) AS participants'
                ))
                ->latest()->paginate(5);


                return Inertia::render('Reseaus/index', [
                    'reseaux' => $reseaux,

                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Reseaus/create');
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
            'libelle' => ['required', 'string', 'max:255', 'unique:reseaus'],
    ]);


    $reseau = Reseau::create($request->all());


    return Redirect::route('reseaus.index');
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
        $reseau = Reseau::where('id', $id)->first();

        return Inertia::render('Reseaus/edit', [
            'reseau' => $reseau,
         ]);
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
        $reseau = Reseau::where('id', $request->id)->first();

          $reseau->update($request->all());


          return Redirect::route('reseaus.index')->with('success', 'Le nom du réseau '. $reseau->libelle . ' a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reseau = Reseau::where('id', $id)->first();

        $reseau->delete();


          return Redirect::route('reseaus.index')->with('success', 'Le nom du réseau '. $reseau->libelle . ' a bien été supprimé.');
    }
}
