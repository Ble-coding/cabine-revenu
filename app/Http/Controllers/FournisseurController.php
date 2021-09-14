<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fournisseur;
use App\Models\Reseau;
use App\Models\Network;
use App\Models\User;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::where('nom', 'LIKE', '%'. request('term') . '%')->with('user')->with('networks')
        ->select('fournisseurs.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM fournisseurs
            ) AS participants'
        ))
        ->latest()->paginate(5);


        return Inertia::render('Fournisseurs/index', [
            'fournisseurs' => $fournisseurs,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reseaux = Reseau::all();

        return Inertia::render('Fournisseurs/create', [
            'reseaux' => $reseaux,
            ]);
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
        'nom' => ['required', 'string', 'max:255'],
        // 'reseau_id' =>  ['required', 'accepted'],
        // 'networks' => ['required', 'array'],
        // 'networks.*.reseau' => 'required|string',
        'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $fournisseur = Fournisseur::create($request->all());


        // foreach($request->input('networks') as $network)
        // {
        //     $network['fournisseur_id'] = $fournisseur->id;
        //     Network::create($network);
        // }

        return Redirect::route('fournisseurs.index')->with('success', 'Félicitation, les informations du fournisseur ont bien été enrégistrées.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = Fournisseur::where('id', $id)->with('user')->with('networks')->first();
        return Inertia::render('Fournisseurs/show',[
            'fournisseur' => $fournisseur,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reseaux = Reseau::all();
        $fournisseur = Fournisseur::where('id', $id)->with('networks')->first();
        // $this->authorize('update', $fournisseur);

        return Inertia::render('Fournisseurs/edit', [
            'fournisseur' => $fournisseur,
            'reseaux' => $reseaux,
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
        $fournisseur = Fournisseur::where('id', $request->id)->with('networks')->first();
        // $this->authorize('update', $commande);
          $fournisseur->update($request->all());
        //   $fournisseur->networks()->delete();

        //   foreach($request->networks as $network)
        //   {
        //     $network['network_id'] = $fournisseur->id;
        //     Network::create($network);
        //   }

          return Redirect::route('fournisseurs.index')->with('success', 'Les informations de '. $fournisseur->nom . ' ont bien été modifiées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur = Fournisseur::where('id', $id)->first();
        // $carte = Carte::where('id', $id)->first() ->with('cartes')-;

        $fournisseur->delete();
        // $fournisseur->networks()->delete();


          return Redirect::route('fournisseurs.index')->with('success', 'Les informations de '. $fournisseur->nom . ' ont bien été supprimées.');
    }
}
