<?php

namespace App\dao;

use Illuminate\Support\Facades\DB;

class LgnCommandeService
{


    public function top_dix_appli()
    {
        $AppliService = DB::table('application', 'a');

        $query = $AppliService->join('ligne_facturation', 'a.IRT', '=', 'ligne_facturation.IRT')
            ->join('clients', 'ligne_facturation.CentreActiviteID', '=', 'clients.CentreActiviteID')
            ->join('grandclients', 'clients.GrandClientID' ,'=', 'grandclients.GrandClientID')
            ->selectRaw('a.nomAppli AS nom_application,
                SUM(ligne_facturation.prix) AS total_en_euros')
            ->groupBy('a.nomAppli')
            ->orderBy('total_en_euros', 'DESC')
            ->limit(10)
            ->get();

        return $query;
    }
    public function evol_top_cinq_client()
    {
        $LigneService = DB::table('ligne_facturation', 'lf');

        $query = $LigneService->join('clients', 'lf.CentreActiviteID' , '=', 'clients.CentreActiviteID')
            ->selectRaw('clients.ClientID,
                clients.NomClient,
                DATE_FORMAT(lf.mois, \'%Y-%m\') AS mois,
                SUM(lf.prix) AS total_en_euros')
            ->whereRaw('lf.mois BETWEEN \'2021-01-01\' AND \'2022-04-30\'
            AND clients.ClientID IN (1, 3, 5, 7, 10)')
            ->groupBy('clients.ClientID','clients.NomClient', 'mois')
            ->orderBy('clients.ClientID')
            ->get();
        return $query;
    }

    public function evol_vol_produit()
    {
        $LigneService = DB::table('ligne_facturation', 'lf');

        $query = $LigneService->join('produit', 'lf.produitID', '=', 'produit.produitID')
            ->selectRaw('produit.NOM_PRODUIT, lf.mois, SUM(lf.volume) AS volume')
            ->whereRaw('lf.mois BETWEEN \'2021-01-01\' AND \'2022-04-30\'
                AND produit.produitID IN (13, 20)')
            ->groupBy('produit.NOM_PRODUIT', 'lf.mois')
            ->orderBy('lf.mois')
            ->orderBy('produit.NOM_PRODUIT')
            ->get();

        return $query;
    }
}
