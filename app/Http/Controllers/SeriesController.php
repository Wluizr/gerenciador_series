<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
        // Recebo como parâmetro e salvo ele como uma propriedade
        
    }

    public function index(Request $request)
    {

        $series = Series::all();

        $mensagemSucesso = $request->session()->get('menssagem.sucesso');

        return view('series.index')
                    ->with('seriesC', $series)
                    ->with('msgSucesso', $mensagemSucesso);

      
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);
        
        return to_route('series.index')->with('menssagem.sucesso', "Série '{$serie->nome}' Adicionada com sucesso"); // Semelhante ha => redirect(route('series.index'));
    }

    public function edit(Series $series){

        // dd($serie);
        return view('series.edit')->with('series', $series );

    }

    public function update(Series $series, SeriesFormRequest $request){

        
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('menssagem.sucesso', "Série '{$series->nome}' atualizado com sucesso! " );
    }




    /*
        - Ao passar um ID para o controller,
        - E no controller identificar que o tipo do ID é de uma model, no caso de Serie
        - Isso o Laravel já identifica e realiza uma consulta desse id na model.
        
    */
    public function destroy(Series $series, Request $request){
                
        $series->delete();

        $request->session()->flash('menssagem.sucesso', "Série '{$series->nome}' Removida com sucesso");
        

        return to_route('series.index');
    }
}
