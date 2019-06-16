@extends('adminlte::page')

@section('title', 'Cadastrar Questões')

@section('content_header')
    <h1>Cadastro de Questões</h1>
@stop

@section('content')    
  <div id="myWizard">
  <form method="post" id=formquestao action="{{route('questoes.store')}}">
        @csrf
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 20%;">
                Passo 1 de 5
            </div>
        </div>

        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav nav-pills nav-wizard">
                    <li class="active">
                        <a class="hidden-xs" href="#step1" data-toggle="tab" data-step="1">1. Enunciado</a>
                        <a class="visible-xs" href="#step1" data-toggle="tab" data-step="1">1.</a>
                        <div class="nav-arrow"></div>
                    </li>
                    <li class="disabled">
                        <div class="nav-wedge"></div>
                        <a class="hidden-xs" href="#step2" data-toggle="tab" data-step="2">2. Assuntos</a>
                        <a class="visible-xs" href="#step2" data-toggle="tab" data-step="2">2.</a>
                        <div class="nav-arrow"></div>
                    </li>
                    <li class="disabled">
                        <div class="nav-wedge"></div>
                        <a class="hidden-xs" href="#step3" data-toggle="tab" data-step="3">3. Configurações</a>
                        <a class="visible-xs" href="#step3" data-toggle="tab" data-step="3">3.</a>
                        <div class="nav-arrow"></div>
                    </li>
                    <li class="disabled">
                        <div class="nav-wedge"></div>
                        <a class="hidden-xs" href="#step4" data-toggle="tab" data-step="4">4. Tipos</a>
                        <a class="visible-xs" href="#step4" data-toggle="tab" data-step="4">4.</a>
                        <div class="nav-arrow"></div>
                    </li>
                    <li class="disabled">
                        <div class="nav-wedge"></div>
                        <a class="hidden-xs" href="#step5" data-toggle="tab" data-step="5">5. Resposta</a>
                        <a class="visible-xs" href="#step5" data-toggle="tab" data-step="5">5.</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="step1">
                <div class="well">
                <script src="vendor/tinymce/js/tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                    tinymce.init({
                    selector: '#enunciado',
                    language: 'pt_BR',
                    browser_spellcheck: true, 
                    toolbar: 'undo redo | styleselect | bold italic  | fontselect fontsizeselect  | alignleft aligncenter alignright | bullist numlist outdent indent |  image | codesample',
                    menubar: true,
                    contextmenu: true,
                    plugins: 'advlist toc insertdatetime tabfocus hr pagebreak nonbreaking image image imagetools print preview lists charmap autoresize searchreplace emoticons help paste table codesample', 
                    height: 150,
                    width: 800,
                    codesample_dialog_width: '400',
                    codesample_dialog_height: '400',
                    font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt', 
                    image_caption: true,
                    indentation: '20pt', 
                    image_advtab: true,
                    paste_data_images: true,
                    elementpath: false,
                    resize: 'both', 
                    branding: false,
                    mobile: {
                        theme: "mobile",
                        plugins: [ 'autosave', 'lists', 'autolink' ],
                        toolbar: ['undo', 'redo', 'bold', 'italic', 'numlist', 'bullist', 'fontsizeselect', 'image'],
        
                    },
                    codesample_languages: [
                            {text: 'HTML/XML', value: 'markup'},
                            {text: 'JavaScript', value: 'javascript'},
                            {text: 'CSS', value: 'css'},
                            {text: 'PHP', value: 'php'},
                            {text: 'Ruby', value: 'ruby'},
                            {text: 'Python', value: 'python'},
                            {text: 'Java', value: 'java'},
                            {text: 'C', value: 'c'},
                            {text: 'C#', value: 'csharp'},
                            {text: 'C++', value: 'cpp'},
                    ],
                    });
                </script>
            <center>
            <h1></h1>
            <textarea id="enunciado" name="enunciado"><div class="panel-body">
            Insira aqui o enunciado da sua questão
            
            </textarea>
            </center>
            <br>
            <button class="btn btn-default btn-lg next" style="float: right;" href="#" >Continue&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button>
          </div>
            </div>

          <div class="tab-pane fade" id="step2">
              <div class="well">
            <div class="col">
              
                  <label for="assunto">Assuntos </label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="Insira um ou mais assuntos!" data-placement="right"></span>
                      <select class="js-example-basic-multiple js-states form-control" id="assunto_id[]" name="assunto_id[]" required multiple="multiple">
                          @foreach($assuntos as $a)
                                  <option value={{$a->id}}> {{$a->nome}} </option>
                          @endforeach
                      </select>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
             
          </div>
          <div class="input-group-prepend">
            <span class="input-group-btn">
                    <button 
                    class="btn btn-success btn-add" 
                    type="button"
                    data-toggle="modal"
                    data-target="#modalAdicionarAssunto">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
            </span>
          </div> 
          <script type="text/javascript">
          $('#modalAdicionarAssunto').on('hidden.bs.modal', function () {
            location.reload();
           })
          </script>
          <br>
          <button class="btn btn-default btn-lg next" style="float: right;" href="#" >Continue&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button>
          </div> 
        </div>

          <div class="tab-pane fade" id="step3">
            <div class="well">
              <div class="col">
                <label for="dificuldade">Dificuldade</label>
                <select class="form-control" id="dificuldade" name="dificuldade" required>
                    <option selected disabled value="">SELECIONE</option>
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                </select>
            </div>

            <div class="col">
                <label for="tempo">Tempo</label>
                <input type="number" class="form-control" id="tempo" name="tempo" required>
            </div>
            <br>
            <button class="btn btn-default btn-lg next" style="float: right;" href="#" >Continue&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button>
          </div>
        </div>

          <div class="tab-pane fade" id="step4">
              <div class="well">
            <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Tipo</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo" id="tipo1" value="1">
                          <label class="form-check-label" for="tipo1">
                            Discursiva
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo" id="tipo2" value="2">
                          <label class="form-check-label" for="tipo2">
                            Objetiva
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <br>
                  <button class="btn btn-default btn-lg next" style="float: right;" href="#" >Continue&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button>
              </div>
          </div>

          <div class="tab-pane fade" id="step5">
          <div class="well">
            <!--- Discursiva --->
            <div class="tipo1 box" hidden>
                <script type="text/javascript">
                  tinymce.init({
                    selector: '#resposta',
                    language: 'pt_BR',
                    browser_spellcheck: true, 
                    toolbar: 'undo redo | codesample',
                    menubar: true,
                    contextmenu: true,
                    plugins: 'advlist toc insertdatetime tabfocus hr pagebreak nonbreaking print preview lists charmap autoresize searchreplace emoticons help paste table codesample', 
                    height: 150,
                    width: 800,
                    codesample_dialog_width: '400',
                    codesample_dialog_height: '400',
                    font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt', 
                    image_caption: true,
                    indentation: '20pt', 
                    image_advtab: true,
                    paste_data_images: true,
                    elementpath: false,
                    resize: 'both', 
                    branding: false,
                    mobile: {
                        theme: "mobile",
                        plugins: [ 'autosave', 'lists', 'autolink' ],
                        toolbar: ['undo', 'redo', 'bold', 'italic', 'numlist', 'bullist', 'fontsizeselect', 'image'],
        
                    },
                    codesample_languages: [
                            {text: 'HTML/XML', value: 'markup'},
                            {text: 'JavaScript', value: 'javascript'},
                            {text: 'CSS', value: 'css'},
                            {text: 'PHP', value: 'php'},
                            {text: 'Ruby', value: 'ruby'},
                            {text: 'Python', value: 'python'},
                            {text: 'Java', value: 'java'},
                            {text: 'C', value: 'c'},
                            {text: 'C#', value: 'csharp'},
                            {text: 'C++', value: 'cpp'},
                    ],
                    });
                </script>
            <center>
            <h1></h1>
            <textarea id="resposta" name="resposta"><div class="panel-body">
            Insira aqui a resposta da sua questão
            
            </textarea>
            </center>
          </div>

            
            <div class="tipo2 box" hidden>
                <label for="alternativa">Alternativa Correta</label>
                <select class="form-control" id="alternativa" name="alternativa" required>
                    <option selected disabled value="">SELECIONE</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                    <option value="4">D</option>
                    <option value="5">E</option>
                </select>
            </div>
            <br>
            <input class="btn btn-default btn-lg next" value="Cadastrar" type="submit" style="float: right;">
          </div>
        </div>
        </div> 
        <div id="push"></div>


        <!--- Script Progress Bar --> 
        <script type="text/javascript">
        $(document).ready(function(){
            $('.next').click(function(){
              var nextId = $(this).parents('.tab-pane').next().attr("id");
            $('[href=#'+nextId+']').tab('show');
              return false;
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            //update progress
              var step = $(e.target).data('step');
              var percent = (parseInt(step) / 5) * 100;
            $('.progress-bar').css({width: percent + '%'});
            $('.progress-bar').text("Passo " + step + " de 5");
            e.relatedTarget // previous tab
            });
            $('.first').click(function(){
            $('#myWizard a:first').tab('show')
            });
            $('input[type="radio"]').click(function(){
              var inputValue = $(this).attr("id");
              var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
            });
            $('.js-example-basic-multiple').select2({
              theme: "classic"
            });
            $('[data-toggle="tooltip"]').tooltip();
          });
        </script>

        <!--- CSS for Nav Pills --> 
        <style>
            li.active > a.hidden-xs {
            display: block!important;
            }
            li.active > a.visible-xs {
              display: none!important; 
            }
            .nav-pills.nav-wizard > li {
              position: relative;
              overflow: visible;
              border-right: 10px solid #fff;
              border-left: 10px solid #fff;
            }
            .nav-pills.nav-wizard > li:first-child {
              border-left: 0;
            }
            .nav-pills.nav-wizard > li:first-child a {
              border-radius: 5px 0 0 5px;
            }
            .nav-pills.nav-wizard > li:last-child {
              border-right: 0;
            }
            .nav-pills.nav-wizard > li:last-child a {
              border-radius: 0 5px 5px 0;
            }
            .nav-pills.nav-wizard > li a {
              border-radius: 0;
              background-color: #eee;
              padding: 10px;
            }
            .nav-pills.nav-wizard > li .nav-arrow {
              position: absolute;
              top: 0px;
              right: -20px;
              width: 0px;
              height: 0px;
              border-style: solid;
              border-width: 20px 0 20px 20px;
              border-color: transparent transparent transparent #eee;
              z-index: 150;
            }
            .nav-pills.nav-wizard > li .nav-wedge {
              position: absolute;
              top: 0px;
              left: -20px;
              width: 0px;
              height: 0px;
              border-style: solid;
              border-width: 20px 0 20px 20px;
              border-color: #eee #eee #eee transparent;
              z-index: 150;
            }
            .nav-pills.nav-wizard > li:hover .nav-arrow {
              border-color: transparent transparent transparent #aaa;
            }
            .nav-pills.nav-wizard > li:hover .nav-wedge {
              border-color: #aaa #aaa #aaa transparent;
            }
            .nav-pills.nav-wizard > li:hover a {
              background-color: #aaa;
              color: #fff;
            }
            .nav-pills.nav-wizard > li.active .nav-arrow {
              border-color: transparent transparent transparent #428bca;
            }
            .nav-pills.nav-wizard > li.active .nav-wedge {
              border-color: #428bca #428bca #428bca transparent;
            }
            .nav-pills.nav-wizard > li.active a {
              background-color: #428bca;
            }
        </style>
</form>
@stop


<!-- Modal -->
<div class="modal fade" id="modalAdicionarAssunto" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Adicionar novo assunto</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('assuntos.store')}}">
            @csrf
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>
           
        
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cancelar</button>
           <input type="submit" id="add" class="btn btn-success" value="Adicionar">
           <script>
           $('#add').submit(function(e) {
                e.preventDefault();
                // Coding
                $('#modalAdicionarAssunto').modal('hide');
            return false;
            });
          </script> 
        </form>
      </div>
    </div>
  </div>
</div>