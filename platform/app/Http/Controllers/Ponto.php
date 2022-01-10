<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class Ponto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function falta()
    {
        if (Auth::user()->tipo == 1) {
            return view('falta');
        }
    }
    public function horaextra()
    {
        if (Auth::user()->tipo == 1) {
            return view('horaextra');
        }
    }
    public function listarPontos()
    {
        try {
            return DB::table('registro_escala')
                ->join('associados', 'registro_escala.associado', '=', 'associados.id')
                ->join('locais', 'registro_escala.local', '=', 'locais.id')
                ->join('equipes', 'registro_escala.equipe', '=', 'equipes.id')
                ->select('registro_escala.horario_escala_entrada', 'registro_escala.horario_escala_saida', 'associados.nome as associadoNome', 'locais.nome as localNome', 'equipes.nome as equipeNome', 'equipes.cor') //
                ->get();
        } catch (Exception $e) {
            return false;
        }
    }

    public function listarEscalas()
    {
        try {
            return DB::table('registro_escala')
                ->join('associados', 'registro_escala.associado', '=', 'associados.id')
                ->join('locais', 'registro_escala.local', '=', 'locais.id')
                ->join('equipes', 'registro_escala.equipe', '=', 'equipes.id')
                ->select('registro_escala.horario_escala_entrada as entrada', 'registro_escala.horario_escala_saida as saida', 'associados.nome as associadoNome', 'locais.nome as localNome', 'equipes.nome as equipeNome', 'equipes.cor') //
                ->get();
        } catch (Exception $e) {
            return false;
        }
    }

    public function addEscala(Request $request)
    {
        try {
            $escala = DB::table('registro_escala')->insertGetId([
                'associado' => $request->input('nome'),
                'local' => $request->input('local'),
                'equipe' => $request->input('equipe'),
                'data_escala' => $request->input('dataEntrada'),
                'horario_escala_entrada' => $request->input('dataEntrada'),
                'horario_escala_saida' => $request->input('dataSaida'),
            ]);
            DB::table('registro_ponto')->insert([
                'id_escala' => $escala,
                'presenca' => 1
            ]);
            return view('dashadmin');
        } catch (Exception $e) {
            return false;
        }
    }

    public function addEscalaGrupo(Request $request)
    {
        try {
            $dataCheck = $request->all();
            $mesRef = $dataCheck['mesRef'];
            $anoRef = $dataCheck['anoRef'];
            if (isset($dataCheck['seg']) && $dataCheck['seg'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Monday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            if (isset($dataCheck['ter']) && $dataCheck['ter'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Tuesday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            if (isset($dataCheck['qua']) && $dataCheck['qua'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Wednesday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            if (isset($dataCheck['qui']) && $dataCheck['qui'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Thursday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            if (isset($dataCheck['sex']) && $dataCheck['sex'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Friday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            if (isset($dataCheck['sab']) && $dataCheck['sab'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Saturday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            if (isset($dataCheck['dom']) && $dataCheck['dom'] == 'on') {
                $days = Ponto::getAllDaysInAMonth($anoRef, $mesRef, 'Sunday');
                Ponto::salvarDiasNaEscala($days, $dataCheck, $mesRef);
            }
            return view('dashadmin');
        } catch (Exception $e) {
        }
    }

    public function addEscalaEquipe(Request $request)
    {
        try {
            $listaIds = DB::table('associados')->where('equipe', $request['equipe'])->get('id');
            for($i = 0; $i < count($request['dataEntradaTabela']);$i++){
                $dataEntrada = new \DateTime($request['dataEntradaTabela'][$i]);
                $dataSaida = new \DateTime($dataEntrada->format('Y-m-d') . $request['dataSaidaTabela'][$i]);
                
                foreach ($listaIds as $ids) {
                    $escala = DB::table('registro_escala')->insertGetId([
                        'associado' => $ids->id,
                        'local' => $request['local'],
                        'equipe' => $request['equipe'],
                        'data_escala' => $dataEntrada->format('Y-m-d'),
                        'horario_escala_entrada' => $dataEntrada,
                        'horario_escala_saida' => $dataSaida,
                    ]);
                    DB::table('registro_ponto')->insert([
                        'id_escala' => $escala,
                        'presenca' => 1
                    ]);
                }
            }            
            return view('dashadmin');
        } catch (Exception $e) {
            return false;
        }
    }

    public function listarDatas(Request $request)
    {
        return DB::table('registro_escala')
            ->join('registro_ponto', 'registro_escala.id', 'registro_ponto.id_escala')
            ->where('registro_ponto.presenca', '1')
            ->where('registro_escala.associado', $request->input('id'))
            ->select('registro_escala.id as id', 'registro_escala.horario_escala_entrada as horario_escala_entrada')
            ->get();
    }

    public function registrarFalta(Request $request)
    {
        DB::table('registro_ponto')
            ->where('registro_ponto.id_escala', $request->input('data'))
            ->update([
                'presenca' => '0',
                'observacao' => $request->input('obs')
            ]);
        return view('falta');
    }

    public function registrarHoraExtra(Request $request)
    {
        DB::table('registro_extra')->insert([
            'id_escala' => $request->input('data'),
            'hora' => $request->input('hora'),
            'observacao' => $request->input('obs')
        ]);
        return view('horaextra');
    }

    function salvarDiasNaEscala($days, $itens, $mes)
    {
        $horaEntrada = new \DateTime($itens['dataEntrada']);
        $horaSaida = new \DateTime($itens['dataSaida']);

        foreach ($days as $day) {
            $dataEntrada = new \DateTime($day->format('Y-m-d') . $horaEntrada->format('H:i:s'));
            $dataSaida = new \DateTime($day->format('Y-m-d') . $horaSaida->format('H:i:s'));
            if ($dataEntrada->format("m") == $mes) {
                $listaIds = DB::table('associados')->where('equipe', $itens['equipe'])->get('id');
                foreach ($listaIds as $ids) {
                    try {
                        $escala = DB::table('registro_escala')->insertGetId([
                            'associado' => $ids->id,
                            'local' => $itens['local'],
                            'equipe' => $itens['equipe'],
                            'data_escala' => $day->format('Y-m-d'),
                            'horario_escala_entrada' => $dataEntrada,
                            'horario_escala_saida' => $dataSaida,
                        ]);
                        DB::table('registro_ponto')->insert([
                            'id_escala' => $escala,
                            'presenca' => 1
                        ]);
                    } catch (Exception $e) {
                        echo "<pre>";
                        echo $e;
                        echo "</pre>";
                    }
                }
                /*print_r($dataEntrada);
                echo '<br>';
                print_r($dataSaida);
                echo '<br>';*/
            }
        }
    }
    /**
     * Get an array of \DateTime objects for each day (specified) in a year and month
     *
     * @param integer $year
     * @param integer $month
     * @param string $day
     * @param integer $daysError    Number of days into month that requires inclusion of previous Monday
     * @return array|\DateTime[]
     * @throws Exception      If $year, $month and $day don't make a valid strtotime
     */
    function getAllDaysInAMonth($year, $month, $day, $daysError = 3)
    {
        $dateString = 'first ' . $day . ' of ' . $year . '-' . $month;

        if (!strtotime($dateString)) {
            throw new \Exception('"' . $dateString . '" is not a valid strtotime');
        }

        $startDay = new \DateTime($dateString);

        if ($startDay->format('j') > $daysError) {
            $startDay->modify('- 7 days');
        }

        $days = array();

        while ($startDay->format('Y-m') <= $year . '-' . str_pad($month, 2, 0, STR_PAD_LEFT)) {
            $days[] = clone ($startDay);
            $startDay->modify('+ 7 days');
        }

        return $days;
    }
}
