<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class colaboradorGer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function colaborador()
    {
        if(Auth::user()->tipo == 1){ 
            return view('colaborador');
        }
    }

    public function salvarColaborador(Request $request)
    {
        try{
            $banco = $request->input('banco');
            $chave_pix = $request->input('chave_pix');
            $cpf = $request->input('cpf');
            $email = $request->input('email');
            $especialidade = $request->input('especialidade');
            $funcao = $request->input('funcao');
            $local = $request->input('local');
            $equipe = $request->input('equipe');
            $nome = $request->input('nome');
            $numero_agencia = $request->input('numero_agencia');
            $numero_conta = $request->input('numero_conta');
            $setor = $request->input('setor');
            $telefone = $request->input('telefone');
            $tipo_de_conta = $request->input('tipo_de_conta');

            DB::table('associados')->insert([
                'banco' => $banco, 
                'chave_pix' => $chave_pix,
                'cpf' => $cpf,
                'email' => $email,
                'especialidade' => $especialidade,
                'funcao' => $funcao,
                'local' => $local,
                'equipe' => $equipe,
                'nome' => $nome,
                'numero_agencia' => $numero_agencia,
                'numero_conta' => $numero_conta,
                'setor' => $setor,
                'telefone' => $telefone,
                'tipo_de_conta' => $tipo_de_conta,
            ]);

            return redirect('/colaborador');
        }catch(Exception $e){
            return $e;
        }
    }
    
    public function editarColaborador(Request $request){
        try{
            $id = $request->input('id');
            $banco = $request->input('banco');
            $chave_pix = $request->input('chave_pix');
            $cpf = $request->input('cpf');
            $email = $request->input('email');
            $especialidade = $request->input('especialidade');
            $funcao = $request->input('funcao');
            $local = $request->input('local');
            $equipe = $request->input('equipe');
            $nome = $request->input('nome');
            $numero_agencia = $request->input('numero_agencia');
            $numero_conta = $request->input('numero_conta');
            $setor = $request->input('setor');
            $telefone = $request->input('telefone');
            $tipo_de_conta = $request->input('tipo_de_conta');

            DB::table('associados')->where('id', $id)->update([
                'banco' => $banco, 
                'chave_pix' => $chave_pix,
                'cpf' => $cpf,
                'email' => $email,
                'especialidade' => $especialidade,
                'funcao' => $funcao,
                'local' => $local,
                'equipe' => $equipe,
                'nome' => $nome,
                'numero_agencia' => $numero_agencia,
                'numero_conta' => $numero_conta,
                'setor' => $setor,
                'telefone' => $telefone,
                'tipo_de_conta' => $tipo_de_conta,
            ]);

            return view('colaborador');
        }catch(Exception $e){
            return $e;
        }
    }
    
    public function listarColaboradores()
    {
        return DB::table('associados')
            ->join('locais', 'associados.local','=','locais.id')
            ->join('setores', 'associados.setor','=','setores.id')
            ->join('funcoes', 'associados.funcao','=','funcoes.id')
            ->join('especialidades', 'associados.especialidade','=','especialidades.id')
            ->select('associados.id as id','associados.nome as nomeAssociado','locais.nome as localNome','setores.nome as setorNome','funcoes.nome as funcaoNome','especialidades.nome as especialidadeNome')//
            ->get();
    }

    public function listarColaboradoresPorNome(Request $request)
    {
        return DB::table('associados')
            ->join('locais', 'associados.local','=','locais.id')
            ->join('setores', 'associados.setor','=','setores.id')
            ->join('funcoes', 'associados.funcao','=','funcoes.id')
            ->join('especialidades', 'associados.especialidade','=','especialidades.id')
            ->where('associados.nome','LIKE', '%'.$request->input('nome').'%')
            ->select('associados.id as id','associados.nome as nomeAssociado','locais.nome as localNome','setores.nome as setorNome','funcoes.nome as funcaoNome','especialidades.nome as especialidadeNome')//
            ->get();
    }

    public function pegaTotalHorasColaborador(Request $request)
    {
        $mes = date('m');
        $ano = date('Y');
        return DB::table('associados')
            ->join('registro_escala', 'associados.id','=','registro_escala.associado')
            ->where('associados.id',$request->input('id'))
            ->whereMonth('registro_escala.horario_escala_entrada','=',$mes)
            ->whereYear('registro_escala.horario_escala_entrada','=',$ano)
            ->select(
                'associados.id as id',
                DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(-TIMEDIFF(registro_escala.horario_escala_entrada,registro_escala.horario_escala_saida)))) as Total"))
            ->groupBy('id')
            ->get();
    }
    
    public function deletarColaborador(Request $request)
    {
        try{
            DB::table('associados')->where('id', '=', $request->query('id'))->delete();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function listaColaborador(Request $request)
    {
        try{
            return DB::table('associados')->where('id',$request->input('id'))->get();
        }catch(Exception $e){
            return false;
        }
    }
    
}
