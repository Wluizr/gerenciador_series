<form action="{{ $action }}" method="post">
    @csrf

    <!-- Caso o Nome exista, saberemos que é o de atualizar -->
    @if($update)
    @method("PUT")
    @endif
  

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" 
               id="nome"
               name="nome"
               class="form-control"
               @isset($nome) value="{{ $nome }}" @endisset>
    </div>

    @if($update)
        <button class="btn btn-primary">Atualizar</button>
    @else
        <button class="btn btn-primary">Adicionar - Save</button>
    @endif
</form>