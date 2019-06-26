@extends('adminlte::page')

@section('title', 'Gerar Avaliação')

@section('content_header')

    <h1>Gerenciar Avaliação</h1>
@stop

@section('content') 

<p> Selecione <strong>ver</strong> para visualizar e imprimir sua avaliação</p>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border:none;border-color:#ccc;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
    .tg .tg-qtf5{border-color:#000000;text-align:left}
    .tg .tg-s268{text-align:left}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    </style>
    <center>
    <table class="tg">
      <tr>
        <th class="tg-qtf5"><strong>Nome</strong></th>
        <th class="tg-s268"><strong>Tipo</strong></th>
        <th class="tg-s268"><strong>Data</strong></th>
        <th class="tg-s268"><strong>Ações</strong></th>
      </tr>
      @foreach ($avaliacoes as $a)
      <tr>
        <td class="tg-0lax">{{$a->nome}}</td>
        <?php 
          if ($a->tipo == 1){ 
            ?>
            <td class="tg-01ax">Lista de Exercício</td>
            <?php
          }else if($a->tipo == 2){
            ?>
            <td class="tg-01ax">Avaliação</td>
            <?php
          }else{
            ?> 
             <td class="tg-01ax">Exame Especial</td>
             <?php
          }
          ?>
        <td class="tg-0lax">{{date('F j, Y', strtotime($a->created_at))}}</td>
        <td class="tg-0lax"><a href="/avaliacao/{{$a->id}}"><input type="button" class="btn btn-info" value="Ver"></a></td>
      </tr>
      @endforeach
    </table>
</center>

@stop 