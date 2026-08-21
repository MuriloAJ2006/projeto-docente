<!-- Estende o layout padrão do sistema (app.blade.php) -->
@extends('layouts.app')

<!-- Inicia a seção onde o conteúdo principal será inserido -->
@section('content')

<!-- Cabeçalho da página com título e botão para voltar à lista -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Editar Docente</h2>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Voltar</a>

</div>

<!-- Bloco de Exibição de Erros -->
<!-- Exibe mensagens de alerta caso as novas informações enviadas violem as regras de validação do Controller -->
@if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>

@endif

<!-- Início do Formulário de Edição -->
<!-- Diferente do cadastro, a rota 'update' precisa saber QUAL registro alterar, por isso passamos o $docente->id -->
<form action="{{ route('docentes.update', $docente->id) }}" method="POST">
    
    <!-- Token de segurança obrigatório do Laravel -->
    @csrf
    
    <!-- O HTML puro só suporta métodos GET e POST. O Laravel usa a diretiva @method('PUT') para adaptar o formulário para a rota de atualização -->
    @method('PUT')
    
    <!-- Linha 1: Campos de Nome e Cidade -->
    <div class="row mb-3">

        <div class="col-md-6">

            <label for="nome" class="form-label">Nome</label>
            <!-- A função old() aqui recebe um segundo parâmetro: se não houver erro de validação recente, ela preenche o campo com o valor que veio do banco ($docente->nome) -->
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $docente->nome) }}" required>
        
        </div>

        <div class="col-md-6">

            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade', $docente->cidade) }}" required>
        
        </div>

    </div>

    <!-- Linha 2: Campos de Título, Área, Ano e Status -->
    <div class="row mb-3">
        
        <!-- Campo Título -->
        <div class="col-md-4">

            <label for="titulo" class="form-label">Título</label>
            <select class="form-select" id="titulo" name="titulo" required>

                <!-- O operador ternário verifica se o dado do banco bate com a opção atual para marcá-la como 'selected' -->
                <option value="Doutorado" {{ old('titulo', $docente->titulo) == 'Doutorado' ? 'selected' : '' }}>Doutorado</option>
                <option value="Mestrado" {{ old('titulo', $docente->titulo) == 'Mestrado' ? 'selected' : '' }}>Mestrado</option>
            
            </select>

        </div>
        
        <!-- Campo Área -->
        <div class="col-md-4">

            <label for="area" class="form-label">Área</label>
            <select class="form-select" id="area" name="area" required>

                <option value="Contabilidade" {{ old('area', $docente->area) == 'Contabilidade' ? 'selected' : '' }}>Contabilidade</option>
                <option value="Administração" {{ old('area', $docente->area) == 'Administração' ? 'selected' : '' }}>Administração</option>
                <option value="Economia" {{ old('area', $docente->area) == 'Economia' ? 'selected' : '' }}>Economia</option>
            
            </select>

        </div>
        
        <!-- Campo Ano de Contratação -->
        <div class="col-md-2">

            <label for="ano_contratacao" class="form-label">Ano Contratação</label>
            <input type="number" class="form-control" id="ano_contratacao" name="ano_contratacao" value="{{ old('ano_contratacao', $docente->ano_contratacao) }}" required>
        
        </div>
        
        <!-- Campo Status -->
        <div class="col-md-2">

            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>

                <option value="Ativo" {{ old('status', $docente->status) == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="Inativo" {{ old('status', $docente->status) == 'Inativo' ? 'selected' : '' }}>Inativo</option>
            
            </select>
        
        </div>

    </div>

    <!-- Botão de submissão (com a cor de alerta amarela do Bootstrap para indicar uma alteração) -->
    <button type="submit" class="btn btn-warning">Atualizar Cadastro</button>
    
</form>

<!-- Encerra a seção de conteúdo -->
@endsection