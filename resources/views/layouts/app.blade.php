<!DOCTYPE html>

<!-- Define o idioma da página como Português do Brasil -->
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <!-- Configuração para garantir que a página se adapte a telas de celulares e tablets (responsividade) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Docentes</title>
    
    <!-- Importa o arquivo de estilos (CSS) do framework Bootstrap diretamente da internet (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- Início da Barra de Navegação (Navbar) padrão do Bootstrap com fundo escuro (bg-dark) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">

        <div class="container">

            <!-- Título/Logo da Navbar. O href aponta dinamicamente para a tela inicial (index) -->
            <a class="navbar-brand" href="{{ route('docentes.index') }}">Gestão FEA-RP</a>
        
        </div>

    </nav>

    <!-- Container principal que centraliza o conteúdo e cria margens nas laterais da tela -->
    <div class="container">
        
        <!-- A diretiva yield é o "buraco" onde o Laravel vai encaixar o conteúdo das outras telas (index, create, edit) -->
        <!-- Tudo que estiver dentro de @section('content') nos outros arquivos vai aparecer exatamente aqui -->
        @yield('content')
        
    </div>

    <!-- Importa o arquivo de scripts (JavaScript) do Bootstrap, necessário para fazer alertas e menus funcionarem -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>