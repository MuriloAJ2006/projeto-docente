<!-- Estende o layout padrão do sistema (app.blade.php) -->
@extends('layouts.app')

<!-- Inicia a seção onde o conteúdo principal será inserido -->
@section('content')

<!-- Cabeçalho da página com título e botão para voltar à lista -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Cadastrar Novo Docente</h2>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Voltar</a>

</div>

<!-- Bloco de Exibição de Erros -->
<!-- O Laravel envia os erros de validação automaticamente para a variável $errors caso o Controller rejeite os dados -->
@if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            <!-- Percorre todos os erros recebidos e os exibe em formato de lista -->
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>

    </div>

@endif

<!-- Início do Formulário -->
<!-- Aponta para a rota 'docentes.store' e utiliza o método POST para enviar os dados de forma segura -->
<form action="{{ route('docentes.store') }}" method="POST">
    
    <!-- Token de segurança (Cross-Site Request Forgery). Obrigatório no Laravel para formulários POST, PUT ou DELETE -->
    @csrf
    
    <!-- Linha 1: Campos de Nome e Cidade -->
    <div class="row mb-3">

        <div class="col-md-6">

            <label for="nome" class="form-label">Nome</label>
            <!-- A função old('nome') mantém o valor digitado pelo usuário caso a página recarregue devido a um erro de validação -->
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        
        </div>

        <div class="col-md-6">

            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" required>
        
        </div>

    </div>

    <!-- Linha 2: Campos de Título, Área, Ano e Status -->
    <div class="row mb-3">
        
        <!-- Campo Título -->
        <div class="col-md-4">

            <label for="titulo" class="form-label">Título</label>
            <select class="form-select" id="titulo" name="titulo" required>

                <option value="" disabled selected>Selecione...</option>
                <!-- O operador ternário verifica se o valor antigo (old) bate com a opção para mantê-la selecionada (selected) -->
                <option value="Doutorado" {{ old('titulo') == 'Doutorado' ? 'selected' : '' }}>Doutorado</option>
                <option value="Mestrado" {{ old('titulo') == 'Mestrado' ? 'selected' : '' }}>Mestrado</option>
            
            </select>

        </div>
        
        <!-- Campo Área -->
        <div class="col-md-4">

            <label for="area" class="form-label">Área</label>
            <select class="form-select" id="area" name="area" required>

                <option value="" disabled selected>Selecione...</option>
                <option value="Contabilidade" {{ old('area') == 'Contabilidade' ? 'selected' : '' }}>Contabilidade</option>
                <option value="Administração" {{ old('area') == 'Administração' ? 'selected' : '' }}>Administração</option>
                <option value="Economia" {{ old('area') == 'Economia' ? 'selected' : '' }}>Economia</option>
            
            </select>

        </div>
        
        <!-- Campo Ano de Contratação -->
        <div class="col-md-2">

            <label for="ano_contratacao" class="form-label">Ano Contratação</label>
            <input type="number" class="form-control" id="ano_contratacao" name="ano_contratacao" value="{{ old('ano_contratacao') }}" required>
        
        </div>
        
        <!-- Campo Status -->
        <div class="col-md-2">

            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>

                <option value="Ativo" {{ old('status') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="Inativo" {{ old('status') == 'Inativo' ? 'selected' : '' }}>Inativo</option>
            
            </select>

        </div>

    </div>

    <!-- Botão de submissão do formulário -->
    <button type="submit" class="btn btn-success">Salvar Cadastro</button>
    
</form>

<!-- Encerra a seção de conteúdo -->
@endsection