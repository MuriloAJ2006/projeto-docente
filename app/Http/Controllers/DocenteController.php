<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // READ - Exibe todos os docentes cadastrados
    public function index() {

        // Busca todos os registros
        $docentes = Docente::all();

        // Retorna a interface com os dados
        return view('docentes.index', compact('docentes'));

    }

    // CREATE - Exibe o formulario para cadastro
    public function create() {
        
        // Retorna o forms de cadastro
        return view('docentes.create');

    }

    // CREATE - Registra o novo docente no banco
    public function store(Request $request) {

        // Verifica se os dados sao validos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'titulo' => 'required|in:Doutorado,Mestrado',
            'area' => 'required|in:Contabilidade,Administração,Economia',
            'ano_contratacao' => 'required|integer|digits:4',
            'status' => 'required|in:Ativo,Inativo',
        ]);

        // Cria o registro no banco
        Docente::create($validatedData);

        // Redireciona o usuario com sucesso
        return redirect()->route('docentes.index')
                         ->with('success','Docente cadastrado com sucesso!');

    }

    // UPDATE - Exibe a pagina com os dados atuais para edicao
    public function edit(string $id) {

        // Busca o docente atraves de seu ID
        $docente = Docente::findOrFail($id);

        // Retorna a interface com os dados
        return view('docentes.edit', compact('docente'));

    }

    // UPDATE - Atualiza as informacoes no banco
    public function update(Request $request, string $id) {

        // Verifica se os dados sao validos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'titulo' => 'required|in:Doutorado,Mestrado',
            'area' => 'required|in:Contabilidade,Administração,Economia',
            'ano_contratacao' => 'required|integer|digits:4',
            'status' => 'required|in:Ativo,Inativo',
        ]);

        // Busca o docente atraves de seu ID
        $docente = Docente::findOrFail($id);

        // Atualiza o registro no banco
        $docente->update($validatedData);

        // Redireciona o usuario com sucesso
        return redirect()->route('docentes.index')
                         ->with('success','Docente atualizado com sucesso!');

    }

    // DELETE - Exclui o registro do docente
    public function destroy(string $id) {
        
        // Busca o docente atraves de seu ID
        $docente = Docente::findOrFail($id);

        // Deleta o registro do banco
        $docente->delete();

        // Redireciona o usuario com sucesso
        return redirect()->route('docentes.index')
                         ->with('success','Docente removido com sucesso!');

    }
}
