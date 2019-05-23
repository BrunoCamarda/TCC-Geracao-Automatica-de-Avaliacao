<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 180); //3 minutes

use App\Questao;
use App\Assunto;
use App\QuestaoAssunto;
use App\Avaliacao; 
use Illuminate\Http\Request;

class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){ 
      $id = Questao::create($request->all())->id;
      foreach($request->assunto_id as $assunto){
        $q = new QuestaoAssunto(); 
        $q->id_questao = $id; 
        $q->id_assunto = $assunto;
        $q->save();
      }
      return redirect ('/cadastrar');
    }

    public function gerar(){
        $assuntos = Assunto::orderBy('nome', 'ASC')->get();
        return view('avaliacao.gerar')->with("assuntos", $assuntos);
    }

    public function gerarAvaliacao(Request $request){ 
        
        $tempo = $request->tempo; 
        $numeroQuestoesF = $request->numeroQuestoesF;
        $numeroQuestoesM = $request->numeroQuestoesM;
        $numeroQuestoesD = $request->numeroQuestoesD;
        $assuntos = $request->assunto_id;
        $tipo = $request->tipo;
        $taxaAceitacao = 0.5;
        $avaliacao = new Avaliacao; 
        $avaliacao->tipo = $tipo;
        $avaliacao->save();

        //Ordenar as questões por uso do último uso(da mais antiga pra mais recente)
        $questoes = Questao::whereHas('assuntos', function ($query) use ($assuntos) {
            $query->whereIn('id_assunto', $assuntos);
        })->orderBy('last_used', 'desc')->get();
        $questoesUsadas = array();
        //Caso um assunto não tenha questão
            if ($questoes->isEmpty()){
                $avaliacao->delete();
                return '<script type="text/javascript">alert("Nenhuma questão encontrada");
                location.href = "/gerar"; </script>';
                
            }

        $totalDeQuestoes = $numeroQuestoesD + $numeroQuestoesF + $numeroQuestoesM;
        $numeroQuestoes = 0; 

        //Inserir pelo menos uma questão de cada assunto
            foreach ($questoes as $questao){ 
                if (($tempo > 0 && $tempo > $questao->tempo) || ($numeroQuestoes != $totalDeQuestoes)){
                    if ($questao->dificuldade == 1){
                        if($numeroQuestoesF > 0){
                            $avaliacao->adicionaQuestao($questao);
                            array_push($questoesUsadas, $questao); 
                            $tempo -= $questao->tempo;
                            $numeroQuestoes++; 
                            $numeroQuestoesF--;  
                        }
                        /* }else{ 
                            $x = self::randomize();
                            if ($x <= $taxaAceitacao){
                                $avaliacao->adicionaQuestao($questao); 
                                $tempo -= $questao->tempo;
                                $numeroQuestoes++;
                            }
                        } */
                    }
                    if ($questao->dificuldade == 2){
                        if($numeroQuestoesM > 0){
                            $avaliacao->adicionaQuestao($questao);
                            array_push($questoesUsadas, $questao);
                            $tempo -= $questao->tempo;
                            $numeroQuestoes++;
                            $numeroQuestoesM--;  
                        }
                       /*  }else{ 
                            $x = self::randomize();
                            if ($x <= $taxaAceitacao){
                                $avaliacao->adicionaQuestao($questao); 
                                $tempo -= $questao->tempo;
                                $numeroQuestoes++;
                            }
                        } */
                    }
                    if ($questao->dificuldade == 3){
                        if($numeroQuestoesD > 0){
                            $avaliacao->adicionaQuestao($questao);
                            array_push($questoesUsadas, $questao);
                            $tempo -= $questao->tempo; 
                            $numeroQuestoes++;  
                            $numeroQuestoesD--;
                        }
                       /*  }else{ 
                            $x = self::randomize(); 
                            if ($x <= $taxaAceitacao){
                                $avaliacao->adicionaQuestao($questao); 
                                $tempo -= $questao->tempo;
                                $numeroQuestoes++;
                            }
                        } */
                    }
                }
                
        }
        $pdf = \PDF::loadView('avaliacao.pdf',['questoes' => $questoesUsadas]);
        return $pdf->stream('avaliacao.pdf');
    }

    public function randomize(){
        return (float) mt_rand() / (float) mt_getrandmax();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function show(Questao $questao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function edit(Questao $questao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *cadastrar
     * @param  \Illuminate\Http\Requecadastrarst  $request
     * @param  \App\Questao  $questaocadastrar
     * @return \Illuminate\Http\Respocadastrarnse
     */
    public function update(Request $request, Questao $questao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questao $questao)
    {
        //
    }

    public function cadastrarView(){
        $assuntos = Assunto::orderBy('nome', 'ASC')->get();
        return view('questoes.store')->with("assuntos", $assuntos);
    }
}
