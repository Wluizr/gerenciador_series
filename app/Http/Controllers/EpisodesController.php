<?php

namespace App\Http\Controllers;

use App\Models\Season;

class EpisodesController
{

    public function index (Season $season){
        return view( 'episodes.index', ['episodes' => $season->episodes]);
    }

    // Testar com uma arrow funcion ( 03. Salvando no Banco)

}