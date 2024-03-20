<?php 

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;

class SeriesRepository
{
    public function add(SeriesFormRequest $request): Series 
    {
        $seasons = [];
        $episodes = [];

        $serie = Series::create($request->all());

        // $request->validate([
        //     'nome' => 'required|min:3|max:24'
        // ]);
        
        
        for($i=1; $i <= $request->seasonsQty; $i++){
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }

        Season::insert($seasons);
        
        foreach($serie->seasons as $season){
            for($j=1; $j <= $request->episodesPerSeason; $j++){
                $episodes[] =[
                    'season_id' => $season->id,
                    'number'=> $j,
                ];
            }
        }

        Episode::insert($episodes);

        return $serie;
    }
}
