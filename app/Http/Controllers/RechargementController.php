<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Rechargement;
use App\Models\Acte;
use App\Models\Reseau;
use App\Models\Fournisseur;
use App\Models\User;
class RechargementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function orange()
    {

        $sumTotalOrange = DB::table('rechargements')->where('reseau','=','Orange')->sum('montant');
        $oranges = Rechargement::where('reseau','=', 'orange')->with('user')->with('fournisseur')
        ->select('rechargements.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM rechargements
            ) AS participants'
        ))
        ->latest()->paginate(10);


        return Inertia::render('Rechargements/orange', [
            'oranges' => $oranges,
            'sumTotalOrange' => $sumTotalOrange,
        ]);
    }

    public function searchOrange(Request $request){

        // $fromDate = "2021-04-01";
        // $toDate = "2021-04-01";
    $fromDate = $request->input('fromDate');
       $toDate = $request->input('toDate');

       $sumTotalOrange = DB::table('rechargements')->whereBetween('datere', [$fromDate, $toDate])->where('reseau','=', 'Orange')->sum('montant');
       $oranges = Rechargement::whereBetween('datere', [$fromDate, $toDate])->where('reseau','=', 'orange')->with('user')->with('fournisseur')
       ->select('rechargements.*', DB::raw(
           '(SELECT COUNT(DISTINCT(user_id))
               FROM rechargements
           ) AS participants'
       ))
       ->latest()->paginate(10);
// dd($actes);

       return Inertia::render('Rechargements/searchorange', [
        'oranges' => $oranges,
        'sumTotalOrange' => $sumTotalOrange,
    ]);

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrange($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editOrange($id)
    {
        $reseaux = Reseau::all();
        $fournisseurs = Fournisseur::all();

        $orange = Rechargement::where('id', $id)->first();
        // $this->authorize('update', $commande);

        return Inertia::render('Rechargements/editorange', [
            'orange' => $orange,
            'reseaux' => $reseaux,
            'fournisseurs' => $fournisseurs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrange(Request $request, $id)
    {
        $orange = Rechargement::where('id', $request->id)->first();
        // $this->authorize('update', $commande);
          $orange->update($request->all());

          return Redirect::route('rechargements.oranges')->with('success', 'Les informations du rechargement '. $orange->id . ' ont bien été modifiées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyOrange($id)
    {
        $orange = Rechargement::where('id', $id)->first();
        // $carte = Carte::where('id', $id)->first() ->with('cartes')-;

        $orange->delete();
        // $fournisseur->networks()->delete();


          return Redirect::route('rechargements.oranges')->with('success', 'Les informations du rechargement '. $orange->id . ' ont bien été supprimées.');
    }

    public function mtn()
    {
        $sumTotalMtn = DB::table('rechargements')->where('reseau','=','MTN')->sum('montant');
        $mtns = Rechargement::where('nreference', 'LIKE', '%'. request('term') . '%')->where('reseau','=', 'Mtn')->with('user')->with('fournisseur')
        ->select('rechargements.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM rechargements
            ) AS participants'
        ))
        ->latest()->paginate(10);


        return Inertia::render('Rechargements/mtn', [
            'mtns' => $mtns,
            'sumTotalMtn' => $sumTotalMtn,
        ]);
    }

    public function searchMtn(Request $request){

        // $fromDate = "2021-03-30";
        // $toDate = "2021-03-30";
    $fromDate = $request->input('fromDate');
       $toDate = $request->input('toDate');

       $sumTotalMtn = DB::table('rechargements')->whereBetween('datere', [$fromDate, $toDate])->where('reseau','=','MTN')->sum('montant');
       $mtns = Rechargement::whereBetween('datere', [$fromDate, $toDate])->where('reseau','=', 'Mtn')->with('user')->with('fournisseur')
       ->select('rechargements.*', DB::raw(
           '(SELECT COUNT(DISTINCT(user_id))
               FROM rechargements
           ) AS participants'
       ))
       ->latest()->paginate(10);
// dd($actes);

       return Inertia::render('Rechargements/searchmtn', [
        'mtns' => $mtns,
        'sumTotalMtn' => $sumTotalMtn,
    ]);

   }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMtn($id)
    {
        $reseaux = Reseau::all();
        $fournisseurs = Fournisseur::all();

        $mtn = Rechargement::where('id', $id)->first();
        // $this->authorize('update', $commande);

        return Inertia::render('Rechargements/editmtn', [
            'mtn' => $mtn,
            'reseaux' => $reseaux,
            'fournisseurs' => $fournisseurs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMtn(Request $request, $id)
    {
        $mtn = Rechargement::where('id', $request->id)->first();
        // $this->authorize('update', $commande);
          $mtn->update($request->all());

          return Redirect::route('rechargements.mtns')->with('success', 'Les informations du rechargement '. $mtn->id . ' ont bien été modifiées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMtn($id)
    {
        $mtn = Rechargement::where('id', $id)->first();
        // $carte = Carte::where('id', $id)->first() ->with('cartes')-;

        $mtn->delete();
        // $fournisseur->networks()->delete();


          return Redirect::route('rechargements.mtns')->with('success', 'Les informations du rechargement '. $mtn->id . ' ont bien été supprimées.');
    }

    public function moov()
    {
        $sumTotalMoov = DB::table('rechargements')->where('reseau','=','Moov')->sum('montant');
        $moovs = Rechargement::where('reseau','=', 'Moov')->with('user')->with('fournisseur')
        ->select('rechargements.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM rechargements
            ) AS participants'
        ))
        ->latest()->paginate(10);


        return Inertia::render('Rechargements/moov', [
            'moovs' => $moovs,
            'sumTotalMoov' => $sumTotalMoov,
        ]);
    }

    public function searchMoov(Request $request){

        // $fromDate = "2021-03-29";
        // $toDate = "2021-03-29";
    $fromDate = $request->input('fromDate');
       $toDate = $request->input('toDate');

       $sumTotalMoov = DB::table('rechargements')->whereBetween('datere', [$fromDate, $toDate])->where('reseau','=','Moov')->sum('montant');
       $moovs = Rechargement::whereBetween('datere', [$fromDate, $toDate])->where('reseau','=', 'Moov')->with('user')->with('fournisseur')
       ->select('rechargements.*', DB::raw(
           '(SELECT COUNT(DISTINCT(user_id))
               FROM rechargements
           ) AS participants'
       ))
       ->latest()->paginate(10);
// dd($actes);

       return Inertia::render('Rechargements/searchmoov', [
        'moovs' => $moovs,
        'sumTotalMoov' => $sumTotalMoov,
    ]);

   }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMoov($id)
    {
        $reseaux = Reseau::all();
        $fournisseurs = Fournisseur::all();

        $moov = Rechargement::where('id', $id)->first();
        // $this->authorize('update', $commande);

        return Inertia::render('Rechargements/editmoov', [
            'moov' => $moov,
            'reseaux' => $reseaux,
            'fournisseurs' => $fournisseurs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMoov(Request $request, $id)
    {
        $moov = Rechargement::where('id', $request->id)->first();
        // $this->authorize('update', $commande);
          $moov->update($request->all());

          return Redirect::route('rechargements.moovs')->with('success', 'Les informations du rechargement '. $moov->id . ' ont bien été modifiées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMoov($id)
    {
        $moov = Rechargement::where('id', $id)->first();
        // $carte = Carte::where('id', $id)->first() ->with('cartes')-;

        $moov->delete();
        // $fournisseur->networks()->delete();


          return Redirect::route('rechargements.moovs')->with('success', 'Les informations du rechargement '. $moov->id . ' ont bien été supprimées.');
    }

    public function index()
    {
        $oranges = DB::table('rechargements')->where('reseau', 'orange')->sum('montant');
        $mtns = DB::table('rechargements')->where('reseau', 'mtn')->sum('montant');
        $moovs = DB::table('rechargements')->where('reseau', 'moov')->sum('montant');
        $rechargements = Rechargement::with('user')->with('fournisseur')
        ->select('rechargements.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM rechargements
            ) AS participants'
        ))
        ->latest()->paginate(5);

        return Inertia::render('Rechargements/index', [
            'rechargements' => $rechargements,
            'oranges' => $oranges,
            'mtns' => $mtns,
            'moovs' => $moovs,
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
        $fournisseurs = Fournisseur::all();

        return Inertia::render('Rechargements/create', [
            'reseaux' => $reseaux,
            'fournisseurs' => $fournisseurs,
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
            'datere' => 'required|string',
            // 'montant' => 'required|string',
            'fournisseur_id' => 'required|integer',
            'reseau' => 'required|string',
            'montant' => 'required|string',
            'nreference' => ['required', 'string', 'max:255', 'unique:rechargements'],
            // 'reseau_id' => 'required|string',
            // 'actes' => ['required', 'array'],
            // 'actes.*.reseau' => 'required|string',
            // 'actes.*.montant' => 'required|string',
            // 'actes.*.nreference' => 'required|string',
    ]);


    $rechargement = Rechargement::create($request->all());


    // foreach($request->input('actes') as $acte)
    // {
    //     $acte['rechargement_id'] = $rechargement->id;
    //     Acte::create($acte);
    // }

    // dd($activite);
    return Redirect::route('rechargements.index');
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
