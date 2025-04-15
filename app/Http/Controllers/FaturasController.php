<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use App\Models\Cliente;
use Illuminate\Http\Request;

class FaturasController extends Controller
{
    public function index(Request $request)
    {
        // Obtém o valor de 'campo' (cliente ou id) e 'search' (termo de busca)
        $campo = $request->input('campo', 'nome');  // Padrão é 'nome' para Cliente
        $search = $request->input('search');  // O valor da pesquisa

        // Consulta para filtrar faturas com base no campo e no termo de pesquisa
        $faturas = Fatura::with('cliente')  // Carrega os dados do cliente junto com a fatura
            ->when($search, function ($query) use ($campo, $search) {
                if ($campo == 'nome') {
                    return $query->whereHas('cliente', function ($q) use ($search) {
                        $q->where('nome', 'like', '%' . $search . '%');
                    });
                } else {
                    return $query->where('id', 'like', '%' . $search . '%');
                }
            })
            ->paginate($request->input('perPage', 10));  // Paginação, com valor padrão de 10 por página

        // Retorna a view com as faturas filtradas
        return view('faturas.index', compact('faturas'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        return view('faturas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data' => 'required|date',
            'idCliente' => 'required|exists:clientes,id',
            'totalLiquido' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        Fatura::create($validated);

        return redirect()->route('faturas.index')
            ->with('success', 'Fatura criada com sucesso!');
    }

    public function show(Fatura $fatura)
    {
        return view('faturas.show', compact('fatura'));
    }

    public function edit(Fatura $fatura)
    {
        $clientes = Cliente::all();
        return view('faturas.edit', compact('fatura', 'clientes'));
    }

    public function update(Request $request, Fatura $fatura)
    {
        $validated = $request->validate([
            'data' => 'required|date',
            'idCliente' => 'required|exists:clientes,id',
            'totalLiquido' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        $fatura->update($validated);

        return redirect()->route('faturas.index')
            ->with('success', 'Fatura atualizada com sucesso!');
    }

    public function destroy(Fatura $fatura)
    {
        $fatura->delete();
        return redirect()->route('faturas.index')
            ->with('success', 'Fatura eliminada com sucesso!');
    }
}
