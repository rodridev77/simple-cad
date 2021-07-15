<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $data = Client::orderby('id', 'desc')->get();
        return view('index', ["clients" => $data]);
    }

    public function store(Request $request)
    {
        $client = new Client();

        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->cpf = str_replace(['.','-'], "", $request->cpf ?? '');
        $client->cnpj = str_replace(['.','-','/'], "", $request->cnpj ?? '');
        $client->zipcode = str_replace('-', "", $request->zipcode ?? '');
        $client->street = $request->street;
        $client->number = $request->number;
        $client->district = $request->district;
        $client->city = $request->city;

        $client->save();

        if ($client->id) {
            return response()->json(["success" => true, "message" => "Cadastrado com sucesso!"], 200);
        } else {
            return response()->json(["success" => false, "message" => "Erro ao cadastrar"], 500);
        }
    }

    public function edit(Request $request)
    {
        $client = Client::find($request->id);

        if ($client->count() == 0) {
            return response()->json(["success" => false, "message" => "Cliente não encontrado!"], 200);
        }
        
        return response()->json(["success" => true, "client" => $client], 200);
    }

    public function update(Request $request)
    {
        $client = Client::find($request->id);

        if ($client->count() == 0) {
            return response()->json(["success" => false, "message" => "Cliente não encontrado!"], 200);
        }

        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->cpf = str_replace(['.','-'], "", $request->cpf ?? '');
        $client->cnpj = str_replace(['.','-','/'], "", $request->cnpj ?? '');
        $client->zipcode = str_replace('-', "", $request->zipcode ?? '');
        $client->street = $request->street;
        $client->number = $request->number;
        $client->district = $request->district;
        $client->city = $request->city;

        if ($client->save()) {
            return response()->json(["success" => true, "message" => "Atualizado com sucesso!", "client" => $client], 200);
        } else {
            return response()->json(["success" => false, "message" => "Erro ao atualizar", "client" => []], 500);
        }
    }

    public function destroy(Request $request)
    {
        $client = Client::find($request->id);

        if ($client->count() == 0) {
            return response()->json(["success" => true, "message" => "Cliente não encontrado!"], 200);
        }

        if ($client->delete()) {
            return response()->json(["success" => true, "message" => "Excluido com sucesso!"], 200);
        } else {
            return response()->json(["success" => false, "message" => "Erro ao excluir"], 500);
        }
    }
}
