
<x-layout title="Séries">
    <a href="{{ route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($msgSucesso)
        <div class="alert alert-success">
            {{$msgSucesso}}
        </div>
    @endisset
    
   <ul class="list-group">
        
        @foreach($seriesC as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}" class="">{{ $serie->nome }}</a>
            

                <span class="d-flex">                                
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-dark mb-2"> Alterar</a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf                    
                        @method('DELETE')
                        <button class="btn btn-danger"> X {{$serie->id}} </button>                    
                    </form>
                </span>
            </li>
        @endforeach
        
    </ul>
</x-layout>    
