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

        return view('topDix', ['val' => $query]);
    }

    public function topCinq()
    {
        $LgnCommandeService = new LgnCommandeService();
        $query = $LgnCommandeService->evol_top_cinq_client();

        return view('topCinq', ['val' => $query]);
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
