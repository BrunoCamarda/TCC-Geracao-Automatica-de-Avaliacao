@extends('adminlte::page')

@section('title', 'Gerar Avaliação')

@section('content_header')

    <h1>Gerar Avaliação</h1>
@stop

@section('content') 
   <form method="get" action="{{route('gerarAva')}}">
        @csrf
       
        <div class="form-row">
            <div class="col-7">
                <label for="assunto">Assuntos </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                    <select class="js-example-basic-multiple js-states form-control" id="assunto_id[]" name="assunto_id[]" required multiple="multiple">
                        @foreach($assuntos as $a)
                                <option value={{$a->id}}> {{$a->nome}} </option>
                        @endforeach
                    </select>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.js-example-basic-multiple').select2({
                                theme: "classic"
                            });
                            $('[data-toggle="tooltip"]').tooltip();
                        });
                    </script>
            </div>
        </div>

            <div class="col">
                <label for="dificuldade">Tipo </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option selected disabled value="">SELECIONE</option>
                    <option value="1">Lista de Exercícios</option>
                    <option value="2">Avaliação</option>
                    <option value="3">Avaliação Especial</option>
                </select>
            </div>

       
            <div class="col">
                    <label for="tempo">Tempo </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                    <input type="number" placeholder="tempo em minutos" class="form-control" id="tempo" name="tempo" required>
            </div>


            <div class="col">
                <label for="numeroQuestoesF">Quantidade de Questões Fáceis </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                <input type="number" class="form-control" id="numeroQuestoesF" name="numeroQuestoesF" required>
            </div>

            <div class="col">
                <label for="numeroQuestoesM">Quantidade de Questões Médias </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                <input type="number" class="form-control" id="numeroQuestoesM" name="numeroQuestoesM" required>
            </div>

            <div class="col">
                <label for="numeroQuestoesD">Quantidade de Questões Dificeis </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                <input type="number" class="form-control" id="numeroQuestoesD" name="numeroQuestoesD" required>
            </div>
        

        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar">
        
</form>
@stop
