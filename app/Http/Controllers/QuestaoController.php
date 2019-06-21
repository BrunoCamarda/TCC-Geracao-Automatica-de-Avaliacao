<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 180); //3 minutes

use App\Questao;
use App\Assunto;
use App\QuestaoAssunto;
use App\Avaliacao; 
use App\Resposta; 
use Illuminate\Http\Request;
use Auth;

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
      if (Auth::check()){
      $user = auth()->user();
      $request->request->add(['id_user' => $user->id]);
      $id = Questao::create($request->all())->id;
      $r = new Resposta();
      $r->id_questao = $id; 
      if ($request->tipo == 1){
        $r->texto = $request->resposta;
      }else{
        $r->alternativa = $request->alternativa; 
      }
      $r->save();
      foreach($request->assunto_id as $assunto){
        $q = new QuestaoAssunto(); 
        $q->id_questao = $id; 
        $q->id_assunto = $assunto;
        $q->save();
      }
      return redirect ('/cadastrar');
    }else{
        echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
				location.href ='/';
			</script>";
    }
    }

    public function gerar(){
        if (Auth::check()){
            $user = auth()->user();
            $assuntos = Assunto::where('id_user', $user->id)->orderBy('nome', 'ASC')->get();
            return view('avaliacao.gerar')->with("assuntos", $assuntos);
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
				location.href ='/';
			</script>";
        }
    }

    //gerarLista não conta com nenhum tipo de controle sobre o tipo das avaliacoes, apenas insere
    //por ordem de uso
    public function gerarLista($questoes, $questoesUsadas, $avaliacao, $numeroQuestoesF,
                                $numeroQuestoesM, $numeroQuestoesD, $totalDeQuestoes, $tempo, $tipo){

    $numeroQuestoes = 0; 
    
    //Inserir pelo menos uma questão de cada assunto
    foreach ($questoes as $questao){ 
        if (($tempo > 0 && $tempo > $questao->tempo) || ($numeroQuestoes != $totalDeQuestoes)){
            if ($questao->dificuldade == 1){
                if($numeroQuestoesF > 0){
                    $avaliacao->adicionaQuestao($questao, $tipo);
                    array_push($questoesUsadas, $questao); 
                    $tempo -= $questao->tempo;
                    $numeroQuestoes++; 
                    $numeroQuestoesF--;  
                }
            }
            if ($questao->dificuldade == 2){
                if($numeroQuestoesM > 0){
                    $avaliacao->adicionaQuestao($questao, $tipo);
                    array_push($questoesUsadas, $questao);
                    $tempo -= $questao->tempo;
                    $numeroQuestoes++;
                    $numeroQuestoesM--;  
                }
            }
            if ($questao->dificuldade == 3){
                if($numeroQuestoesD > 0){
                    $avaliacao->adicionaQuestao($questao, $tipo);
                    array_push($questoesUsadas, $questao);
                    $tempo -= $questao->tempo; 
                    $numeroQuestoes++;  
                    $numeroQuestoesD--;
                }
            }
        }
    }
    return view('avaliacao.pdf')->with('questoes', $questoesUsadas);
    }

    //gerarAva tem certo tipo de controle sobre o tipo das avaliacoes, nao permitindo que todas
    // as questoes tenham sido usadas em listas (no maximo metade)
    public function gerarAva($questoes, $questoesUsadas, $avaliacao, $numeroQuestoesF,
                                $numeroQuestoesM, $numeroQuestoesD, $totalDeQuestoes, $tempo, $tipo){

        $numeroQuestoes = 0; 
        $numerosNaLista = 0;

        //Inserir pelo menos uma questão de cada assunto
        foreach ($questoes as $questao){ 
            if (($tempo > 0 && $tempo > $questao->tempo) || ($numeroQuestoes != $totalDeQuestoes)){
                if ($questao->tipoAvaliacao == 1 && $numerosNaLista <= ($totalDeQuestoes/2)){
                    if ($questao->dificuldade == 1){
                        if($numeroQuestoesF > 0){
                            $avaliacao->adicionaQuestao($questao, $tipo);
                            array_push($questoesUsadas, $questao); 
                            $tempo -= $questao->tempo;
                            $numeroQuestoes++; 
                            $numeroQuestoesF--;
                            $numerosNaLista++;  
                        }
                    }
                    if ($questao->dificuldade == 2){
                        if($numeroQuestoesM > 0){
                            $avaliacao->adicionaQuestao($questao, $tipo);
                            array_push($questoesUsadas, $questao);
                            $tempo -= $questao->tempo;
                            $numeroQuestoes++;
                            $numeroQuestoesM--;
                            $numerosNaLista++;  
                        }
                    }
                    if ($questao->dificuldade == 3){
                        if($numeroQuestoesD > 0){
                            $avaliacao->adicionaQuestao($questao, $tipo);
                            array_push($questoesUsadas, $questao);
                            $tempo -= $questao->tempo; 
                            $numeroQuestoes++;  
                            $numeroQuestoesD--;
                            $numerosNaLista++;
                        }
                    }
                }else{
                    if ($questao->dificuldade == 1){
                        if($numeroQuestoesF > 0){
                            $avaliacao->adicionaQuestao($questao, $tipo);
                            array_push($questoesUsadas, $questao); 
                            $tempo -= $questao->tempo;
                            $numeroQuestoes++; 
                            $numeroQuestoesF--;
                        }
                    }
                    if ($questao->dificuldade == 2){
                        if($numeroQuestoesM > 0){
                            $avaliacao->adicionaQuestao($questao, $tipo);
                            array_push($questoesUsadas, $questao);
                            $tempo -= $questao->tempo;
                            $numeroQuestoes++;
                            $numeroQuestoesM--;
                        }
                    }
                    if ($questao->dificuldade == 3){
                        if($numeroQuestoesD > 0){
                            $avaliacao->adicionaQuestao($questao, $tipo);
                            array_push($questoesUsadas, $questao);
                            $tempo -= $questao->tempo; 
                            $numeroQuestoes++;  
                            $numeroQuestoesD--;
                        }
                    }
                }
            }
        }
        return view('avaliacao.pdf')->with('questoes', $questoesUsadas);                            
    }

    //gerarExameEspecial tem controle sobre os tipos de avaliacoes, nao permitindo nenhuma questao
    //de listas de exercicios
    public function gerarExameEspecial($questoes, $questoesUsadas, $avaliacao, $numeroQuestoesF,
                                        $numeroQuestoesM, $numeroQuestoesD, $totalDeQuestoes, $tempo, $tipo){
        $numeroQuestoes = 0; 

        //Inserir pelo menos uma questão de cada assunto
        foreach ($questoes as $questao){ 
            if (($tempo > 0 && $tempo > $questao->tempo) || ($numeroQuestoes != $totalDeQuestoes)){
                if ($questao->tipoAvaliacao != 1){
                if ($questao->dificuldade == 1){
                    if($numeroQuestoesF > 0){
                        $avaliacao->adicionaQuestao($questao, $tipo);
                        array_push($questoesUsadas, $questao); 
                        $tempo -= $questao->tempo;
                        $numeroQuestoes++; 
                        $numeroQuestoesF--;  
                    }
                }
                if ($questao->dificuldade == 2){
                    if($numeroQuestoesM > 0){
                        $avaliacao->adicionaQuestao($questao, $tipo);
                        array_push($questoesUsadas, $questao);
                        $tempo -= $questao->tempo;
                        $numeroQuestoes++;
                        $numeroQuestoesM--;  
                    }
                }
                if ($questao->dificuldade == 3){
                    if($numeroQuestoesD > 0){
                        $avaliacao->adicionaQuestao($questao, $tipo);
                        array_push($questoesUsadas, $questao);
                        $tempo -= $questao->tempo; 
                        $numeroQuestoes++;  
                        $numeroQuestoesD--;
                    }
                }
            }
            }
        }
        return view('avaliacao.pdf')->with('questoes', $questoesUsadas); 
    }

    public function gerarAvaliacao(Request $request){ 
        if (Auth::check()){
            $tempo = $request->tempo; 
            $numeroQuestoesF = $request->numeroQuestoesF;
            $numeroQuestoesM = $request->numeroQuestoesM;
            $numeroQuestoesD = $request->numeroQuestoesD;
            $assuntos = $request->assunto_id;
            $tipo = $request->tipo;
            $taxaAceitacao = 0.5;
            $totalDeQuestoes = $numeroQuestoesD + $numeroQuestoesF + $numeroQuestoesM;
            $avaliacao = new Avaliacao; 
            $avaliacao->tipo = $tipo;
            $user = auth()->user();
            $avaliacao->id_user = $user->id;
            $avaliacao->nome = $request->nome;
            $avaliacao->save();

            //Ordenar as questões por uso do último uso(da mais antiga pra mais recente)
            $questoes = Questao::whereHas('assuntos', function ($query) use ($assuntos) {
                $query->whereIn('id_assunto', $assuntos);
            })->orderBy('last_used', 'asc')->get();
            $questoesUsadas = array();

            //Caso um assunto não tenha questão
                if ($questoes->isEmpty()){
                    $avaliacao->delete();
                    return '<script type="text/javascript">alert("Nenhuma questão encontrada");
                    location.href = "/gerar"; </script>';   
                }

                if ($tipo == 1){
                return $this->gerarLista($questoes, $questoesUsadas, $avaliacao, $numeroQuestoesF,
                        $numeroQuestoesM, $numeroQuestoesD, $totalDeQuestoes, $tempo, $tipo);
                }else if ($tipo == 2){
                return $this->gerarAva($questoes, $questoesUsadas, $avaliacao, $numeroQuestoesF,
                    $numeroQuestoesM, $numeroQuestoesD, $totalDeQuestoes, $tempo, $tipo); 
                }else if ($tipo == 3){
                return $this->gerarExameEspecial($questoes, $questoesUsadas, $avaliacao, $numeroQuestoesF,
                    $numeroQuestoesM, $numeroQuestoesD, $totalDeQuestoes, $tempo, $tipo); 
                }
            }else{
                echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
				location.href ='/';
			</script>";  
            }
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
    if (Auth::check()){
        $user = auth()->user();
        $assuntos = Assunto::where('id_user', $user->id)->orderBy('nome', 'ASC')->get();
        return view('questoes.store')->with("assuntos", $assuntos);
    }else{
        echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
        location.href ='/';
    </script>";  
    }
    }
}
