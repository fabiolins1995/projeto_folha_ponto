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

    public function pesquisa()
    {
        if(Auth::user()->tipo == 1){ 
            return view('pesquisacolaborador');
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
            $conselho = $request->input('conselho');
            $data_entrada = $request->input('data_entrada');
            $data_afastamento = $request->input('data_afastamento');
            $motivo_afastamento = $request->input('motivo_afastamento');
            $uf_conselho = $request->input('uf_conselho');
            $data_emissao_conselho = $request->input('data_emissao_conselho');
            $validade_conselho = $request->input('validade_conselho');
            $titulo_eleitor = $request->input('titulo_eleitor');
            $zona_eleitor = $request->input('zona_eleitor');
            $secao_eleitor = $request->input('secao_eleitor');
            $data_emissao_eleitor = $request->input('data_emissao_eleitor');
            $certificado_reservista = $request->input('certificado_reservista');
            $cnh = $request->input('cnh');
            $tamanho_uniforme = $request->input('tamanho_uniforme');
            $data_nascimento = $request->input('data_nascimento');
            $idade = $request->input('idade');
            $naturalidade = $request->input('naturalidade');
            $nacionalidade = $request->input('nacionalidade');
            $estado_civil = $request->input('estado_civil');
            $regime_casamento = $request->input('regime_casamento');
            $pai = $request->input('pai');
            $mae = $request->input('mae');
            $pis = $request->input('pis');
            $identidade = $request->input('identidade');
            $emissor_identidade = $request->input('emissor_identidade');
            $data_emissao = $request->input('data_emissao');

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
                'data_entrada' => $data_entrada,
                'data_afastamento' => $data_afastamento,
                'motivo_afastamento' => $motivo_afastamento,
                'conselho' => $conselho,
                'uf_conselho' => $uf_conselho,
                'data_emissao_conselho' => $data_emissao_conselho,
                'validade_conselho' => $validade_conselho,
                'titulo_eleitor' => $titulo_eleitor,
                'zona_eleitor' => $zona_eleitor,
                'secao_eleitor' => $secao_eleitor,
                'data_emissao_eleitor' => $data_emissao_eleitor,
                'certificado_reservista' => $certificado_reservista,
                'cnh' => $cnh,
                'tamanho_uniforme' => $tamanho_uniforme,
                'data_nascimento' => $data_nascimento,
                'idade' => $idade,
                'naturalidade' => $naturalidade,
                'nacionalidade' => $nacionalidade,
                'estado_civil' => $estado_civil,
                'regime_casamento' => $regime_casamento,
                'pai' => $pai,
                'mae' => $mae,
                'pis' => $pis,
                'identidade' => $identidade,
                'emissor_identidade' => $emissor_identidade,
                'data_emissao' => $data_emissao,
            ]);

            return redirect('/colaborador');
        }catch(Exception $e){
            return $e;
        }
    }

    public function editarColaborador(Request $request){
        try{
            $id = $request->input('idModal');
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
            $conselho = $request->input('conselho');
            $data_entrada = $request->input('data_entrada');
            $data_afastamento = $request->input('data_afastamento');
            $motivo_afastamento = $request->input('motivo_afastamento');
            $uf_conselho = $request->input('uf_conselho');
            $data_emissao_conselho = $request->input('data_emissao_conselho');
            $validade_conselho = $request->input('validade_conselho');
            $titulo_eleitor = $request->input('titulo_eleitor');
            $zona_eleitor = $request->input('zona_eleitor');
            $secao_eleitor = $request->input('secao_eleitor');
            $data_emissao_eleitor = $request->input('data_emissao_eleitor');
            $certificado_reservista = $request->input('certificado_reservista');
            $cnh = $request->input('cnh');
            $tamanho_uniforme = $request->input('tamanho_uniforme');
            $data_nascimento = $request->input('data_nascimento');
            $idade = $request->input('idade');
            $naturalidade = $request->input('naturalidade');
            $nacionalidade = $request->input('nacionalidade');
            $estado_civil = $request->input('estado_civil');
            $regime_casamento = $request->input('regime_casamento');
            $pai = $request->input('pai');
            $mae = $request->input('mae');
            $pis = $request->input('pis');
            $identidade = $request->input('identidade');
            $emissor_identidade = $request->input('emissor_identidade');
            $data_emissao = $request->input('data_emissao');

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
                'data_entrada' => $data_entrada,
                'data_afastamento' => $data_afastamento,
                'motivo_afastamento' => $motivo_afastamento,
                'conselho' => $conselho,
                'uf_conselho' => $uf_conselho,
                'data_emissao_conselho' => $data_emissao_conselho,
                'validade_conselho' => $validade_conselho,
                'titulo_eleitor' => $titulo_eleitor,
                'zona_eleitor' => $zona_eleitor,
                'secao_eleitor' => $secao_eleitor,
                'data_emissao_eleitor' => $data_emissao_eleitor,
                'certificado_reservista' => $certificado_reservista,
                'cnh' => $cnh,
                'tamanho_uniforme' => $tamanho_uniforme,
                'data_nascimento' => $data_nascimento,
                'idade' => $idade,
                'naturalidade' => $naturalidade,
                'nacionalidade' => $nacionalidade,
                'estado_civil' => $estado_civil,
                'regime_casamento' => $regime_casamento,
                'pai' => $pai,
                'mae' => $mae,
                'pis' => $pis,
                'identidade' => $identidade,
                'emissor_identidade' => $emissor_identidade,
                'data_emissao' => $data_emissao,
            ]);

            return redirect('/pesquisacolaborador');
        }catch(Exception $e){
            return $e;
        }
    }
    
    public function listarColaboradores(Request $request)
    {
        $query = DB::table('associados')
            ->join('funcoes', 'associados.funcao','=','funcoes.id');
            if($request->input('nome') != null){
                $query = $query->orWhere('associados.nome','like','%'.$request->input('nome').'%');
            }
            if($request->input('funcao') != null){
                $query = $query->where('associados.funcao','=',$request->input('funcao'));
            }
            if($request->input('conselho') != null){
                $query = $query->where('associados.conselho','like','%'.$request->input('conselho').'%');
            }
            if($request->input('cpf') != null){
                $query = $query->where('associados.cpf','like','%'.$request->input('cpf').'%');
            }
        $query = $query->select('associados.id as id','associados.nome as nomeAssociado','associados.cpf as cpf','funcoes.nome as funcaoNome','associados.email as email','associados.telefone as telefone','associados.conselho as conselho')//
            ->get();

        return $query;
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
