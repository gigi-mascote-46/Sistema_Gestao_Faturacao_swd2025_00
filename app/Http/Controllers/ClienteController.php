<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
{
    // Obtém o valor de 'campo' (nome, email ou id) e 'search' (termo de busca)
    $campo = $request->input('campo', 'nome');  // Padrão é 'nome'
    $search = $request->input('search');  // O valor da pesquisa

    // Consulta para filtrar clientes com base no campo e no termo de pesquisa
    $clientes = Cliente::when($search, function ($query) use ($campo, $search) {
        return $query->where($campo, 'like', '%' . $search . '%');
    })
    ->paginate($request->input('perPage', 10));  // Paginação, com valor padrão de 10 por página

    // Retorna a view com os clientes filtrados
    return view('clientes.index', compact('clientes'));
}


    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20|regex:/^[0-9]{9}$/',
            'email' => 'required|email|unique:clientes,email',
            'morada' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before_or_equal:today'
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20|regex:/^[0-9]{9}$/',
            'email' => 'required|email|unique:clientes,email,'.$cliente->id,
            'morada' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before_or_equal:today'
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente arquivado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao arquivar cliente: ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $cliente = Cliente::withTrashed()->findOrFail($id);
        $cliente->restore();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente restaurado com sucesso!');
    }

    public function trashed()
    {
        $clientes = Cliente::onlyTrashed()->get();
        return view('clientes.trashed', compact('clientes'));
    }

    public function forceDelete($id)
    {
        $cliente = Cliente::withTrashed()->findOrFail($id);
        $cliente->forceDelete();

        return redirect()->route('clientes.trashed')
            ->with('success', 'Cliente removido permanentemente!');
    }

    public function exemplo()
    {
        return view('clientes.exemplo_template');
    }
}
