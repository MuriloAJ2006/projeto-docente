<!-- Estende o layout padrão do sistema (app.blade.php) -->
@extends('layouts.app')

<!-- Inicia a seção onde o conteúdo principal será inserido -->
@section('content')

<!-- Cabeçalho da página com título e o botão de criar um novo registro -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Lista de Docentes</h2>
    <a href="{{ route('docentes.create') }}" class="btn btn-primary">Novo Cadastro</a>

</div>

<!-- Verifica se há alguma mensagem de sucesso na sessão e exibe um alerta verde -->
@if(session('success'))

    <div class="alert alert-success">{{ session('success') }}</div>

@endif

<!-- Inicia a tabela do Bootstrap para listar os registros -->
<table class="table table-striped table-bordered">
    
    <!-- Cabeçalho da tabela com os nomes das colunas -->
    <thead class="table-dark">

        <tr>

            <th>Nome</th>
            <th>Cidade</th>
            <th>Título</th>
            <th>Área</th>
            <th>Ano</th>
            <th>Status</th>
            <th>Ações</th>

        </tr>

    </thead>
    
    <!-- Corpo da tabela onde os dados serão populados -->
    <tbody>
        
        <!-- Loop (laço de repetição) que percorre a lista de docentes vindos do banco de dados -->
        @foreach($docentes as $docente)

        <tr>

            <!-- Exibe os dados do docente atual em cada célula da linha -->
            <td>{{ $docente->nome }}</td>
            <td>{{ $docente->cidade }}</td>
            <td>{{ $docente->titulo }}</td>
            <td>{{ $docente->area }}</td>
            <td>{{ $docente->ano_contratacao }}</td>
            <td>{{ $docente->status }}</td>
            
            <!-- Coluna dedicada aos botões de ação (Editar e Excluir) -->
            <td>
                <!-- Botão de Edição que redireciona para a rota com o ID do docente -->
                <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                
                <!-- Formulário para Exclusão (precisa ser form pois HTML padrão não envia requisição DELETE por link) -->
                <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST" class="d-inline">

                    <!-- Token de segurança obrigatório do Laravel para formulários -->
                    @csrf
                    
                    <!-- Sobrescreve o método POST para DELETE, conforme exigido pelo padrão REST -->
                    @method('DELETE')
                    
                    <!-- Botão que executa o envio do formulário, com uma janela de confirmação nativa do navegador -->
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                
                </form>

            </td>

        </tr>

        <!-- Finaliza o loop -->
        @endforeach
        
    </tbody>
    
</table>

<!-- Encerra a seção de conteúdo -->
@endsection