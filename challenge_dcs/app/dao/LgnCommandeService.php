<?php

use Illuminate\Support\Facades\DB;

class LgnCommandeService
{
    public function evol_top_cinq_client()
    {
        $LigneService = DB::table('ligne_facturation', 'lf')
            ->join('clients', 'lf.CentreActiviteID' , '=', 'clients.CentreActiviteID')
            ->selectRaw('clients.ClientID,
                clients.NomClient,
                DATE_FORMAT(lf.mois, \'%Y-%m\') AS mois,
                SUM(lf.prix) AS total_en_euros')
            ->whereRaw('lf.mois BETWEEN \'2021-01-01\' AND \'2022-04-30\'
            AND clients.ClientID IN (1, 3, 5, 7, 10)')
            ->groupBy('clients.ClientID','clients.NomClient', 'mois')
            ->orderBy('clients.ClientID');
        $val = $LigneService->get();
        return view('index', ['val' =>$val]);
    }

    public function evol_vol_produit()
    {
        $LigneService = DB::table('ligne_facturation', 'lf')
            ->join('produit', 'lf.produitID', '=', 'produit.produitID')
            ->selectRaw('produit.NOM_PRODUIT, lf.mois, SUM(lf.volume)')
            ->whereRaw('lf.mois BETWEEN \'2021-01-01\' AND \'2022-04-30\'
    AND produit.produitID IN (13, 20)')
            ->groupBy('produit.NOM_PRODUIT', 'lf.mois')
            ->orderBy('lf.mois')
            ->orderBy('produit.NOM_PRODUIT');
        $query = $LigneService->get();

        return view ('index', ['val' =>$query]);
    }
}
