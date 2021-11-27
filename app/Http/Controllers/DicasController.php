<?php

namespace App\Http\Controllers;

use App\Http\Requests\DicasStoreRequest;
use App\Models\Dica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DicasController extends Controller
{
    public function listar()
    {
        $dicas = Dica::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
        return view('dicas.listar', \compact('dicas'));
    }

    public function edit($id)
    {
        $dicaEdit = Dica::find($id);
        $dicas = Dica::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
        return view('dicas.listar', \compact('dicas', 'dicaEdit'));
    }

    public function update(DicasStoreRequest $request, int $id)
    {
        try {
            DB::beginTransaction();
            $dados = $request->validated();

            $dica = Dica::find($id);
            $dica->dica_tipo_id = $dados['tipo_dica'];
            $dica->marca = $dados['marca'];
            $dica->modelo = $dados['modelo'];
            $dica->versao = $dados['versao'];
            $dica->text = $dados['text'];

            $dica->save();

            DB::commit();
            $classe = 'alert-success';
            $mensagem = 'Dica atualizada com sucesso!';
        } catch (\Throwable $th) {
            report($th);
            dd($th);
            DB::rollBack();
            $classe = 'alert-danger';
            $mensagem = 'Não foi possível atualizar a dica, por favor entre em contato com o Administrador do Sistema.';
        }

        return redirect()->route('dica.listar')
            ->with('class',$classe)
            ->with('message',$mensagem);
    }

    public function store(DicasStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $dados = $request->validated();

            $dica = array(
                'user_id'         => Auth::user()->id,
                'dica_tipo_id'    => $dados['tipo_dica'],
                'marca'           => $dados['marca'],
                'modelo'          => $dados['modelo'],
                'versao'          => $dados['versao'],
                'text'            => $dados['text']
            );

            Dica::create($dica);

            DB::commit();
            $classe = 'alert-success';
            $mensagem = 'Dica registrada com sucesso!';
        } catch (\Throwable $th) {
            report($th);
            dd($th);
            DB::rollBack();
            $classe = 'alert-danger';
            $mensagem = 'Não foi registrar sua dica, por favor entre em contato com o Administrador do Sistema.';
        }

        return redirect()->route('dica.listar')
            ->with('class',$classe)
            ->with('message',$mensagem);
    }

    public function delete(int $id)
    {
        try {
            DB::beginTransaction();
            $dica = Dica::find($id);
            $dica->delete();

            DB::commit();
            $classe = 'alert-success';
            $mensagem = 'Dica excluído com sucesso!';
        } catch (\Throwable $th) {
            report($th);
            DB::rollBack();
            $classe = 'alert-danger';
            $mensagem = 'Não foi possível excluir a dica, por favor entre em contato com o Administrador do Sistema.';
        }

        return redirect()->route('dica.listar')
            ->with('class',$classe)
            ->with('message',$mensagem);
    }
}
