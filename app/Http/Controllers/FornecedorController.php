<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtém o campo de pesquisa e o valor de busca
        $campo = $request->input('campo', 'nome');  // Padrão: 'nome' se não for fornecido
        $search = $request->input('search');  // O valor da pesquisa

        // Filtra os fornecedores com base no campo e no termo de pesquisa
        $fornecedores = Fornecedor::when($search, function ($query) use ($campo, $search) {
            // Aplica o filtro de acordo com o campo escolhido
            return $query->where($campo, 'like', '%' . $search . '%');
        })
        ->paginate($request->input('perPage', 10));  // Paginação, com valor padrão de 10 por página

        // Retorna a view com os fornecedores filtrados
        return view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores,email',  // Verificar se o e-mail é único
            'morada' => 'required|string|max:255',
        ]);

        // Criação do fornecedor
        Fornecedor::create($request->all());

        // Redireciona para a lista de fornecedores com mensagem de sucesso
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        // Exibe os detalhes do fornecedor
        return view('fornecedores.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor)
    {
        // Exibe o formulário de edição do fornecedor
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores,email,' . $fornecedor->id,  // Verificar se o e-mail é único, exceto o atual
            'morada' => 'required|string|max:255',
        ]);

        // Atualização do fornecedor
        $fornecedor->update($request->all());

        // Redireciona para a lista de fornecedores com mensagem de sucesso
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        // Exclui o fornecedor
        $fornecedor->delete();
        // Redireciona para a lista de fornecedores com mensagem de sucesso
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
