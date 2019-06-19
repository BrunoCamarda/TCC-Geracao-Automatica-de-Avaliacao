<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gabarito</title>
    </head>
    <body>
          
<br>
<center>
<h1> Gabarito</h1>
</center>
@foreach($questoes->questoes as $chave=>$questao)
    @foreach($respostas as $key=>$resposta)
    <?php 
        
        if($questao == $resposta->id_questao){
            if ($resposta->alternativa == null){
                ?>
                Resposta da questão {{$chave+1}}:{!!$resposta->texto!!}
                <br>
            <?php
            }else{
                
                if ($resposta->alternativa == 0){
                    $alt = "A";
                }else if($resposta->alternativa == 1){
                    $alt = "B"; 
                }else if ($resposta->alternativa == 2){
                    $alt = "C";
                }else if ($resposta->alternativa == 3){
                    $alt = "D";
                }else{
                    $alt = "E";
                }
                
                ?>
                Resposta da questão {{$chave+1}}: {{ $alt }} 
                <br><br>
            <?php
            }
        }
            ?>
    @endforeach
@endforeach

       
    </body>
</html>