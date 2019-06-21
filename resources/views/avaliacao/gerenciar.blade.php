@extends('adminlte::page')

@section('title', 'Gerar Avaliação')

@section('content_header')

    <h1>Gerenciar Avaliação</h1>
@stop

@section('content') 

<p> Gere sua avaliação conforme suas configurações.</p>

<p> Selecione um ou mais assuntos, defina o tempo e o número de questões </p>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border:none;border-color:#ccc;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
    .tg .tg-qtf5{border-color:#000000;text-align:left}
    .tg .tg-s268{text-align:left}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    </style>
    <table class="tg">
      <tr>
        <th class="tg-qtf5">Nome</th>
        <th class="tg-s268">Data</th>
        <th class="tg-s268">Ações</th>
      </tr>
      @foreach ($avaliacoes as $a)
      <tr>
        <td class="tg-0lax">{{$a->nome}}</td>
        <td class="tg-0lax">{{$a->created_at}}</td>
        <td class="tg-0lax"></td>
      </tr>
      @endforeach
    </table>
