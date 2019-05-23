<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Avaliação</title>
    </head>
    <body>
         
 
 
<h1>Cabeçalho</h1>
 
<br>
@foreach($questoes as $key=>$questao)
{{ $key+1 }}  {!!$questao->enunciado!!} 
<br><br><br>

@endforeach
       
    </body>
</html>