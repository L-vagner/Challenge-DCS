<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dao\LgnCommandeService;
class DCSChartController extends Controller
{
    public function topDix()
    {
        $LgnCommandeService = new LgnCommandeService();
        $query = $LgnCommandeService->top_dix_appli();
        $table = [];
        foreach ($query as $item)
        {
            $table[$item->nom_application] = $item->total_en_euros;
        }

        return view('topDix', ['val' => $table]);
    }

    public function topCinq()
    {
        $LgnCommandeService = new LgnCommandeService();
        $query = $LgnCommandeService->evol_top_cinq_client();
        $table = [];
        foreach ($query as $item)
        {
            $table[$item->ClientID][$item->mois] = $item->total_en_euros;
        }

        return view('topCinq', ['val' => $table]);
    }

    public function volumeProduit(){
        $LgnCommandeService = new LgnCommandeService();
        $query = $LgnCommandeService->evol_vol_produit();
        $table = [];
        foreach ($query as $item)
        {
            $table[$item->NOM_PRODUIT][$item->mois] = $item->volume;
        }
        return view('volumeProduits', ['val' => $table]);
    }
}
