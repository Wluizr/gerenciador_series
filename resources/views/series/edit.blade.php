<x-layout title="Editar Série '{!! $series->nome !!}' ">
     <!-- <
      :action="route('series.update', $series->id )" :nome="$series->nome" update="true" 
      /> -->

     <form action="{{ route('series.update', $series->id) }}"  method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label"> Nome: </label>
            <input type="text" 
                id="nome"
                name="nome"
                class="form-control"
                value="{{ $series->nome  }}" >
        </div>

        <button class="btn btn-primary">Atualizar - OK</button>
    </form>

</x-layout>