@extends('adminlte::page')

@section('title', 'Cadastrar Questões')

@section('content_header')
    <h1>Cadastro de Questões</h1>
@stop

@section('content')    
   <form method="post" action="{{route('questoes.store')}}">
        @csrf
        <div>
                <label for="enunciado">Enunciado</label>
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
              <div class="pergunta pergunta_pre">
              <p style="text-align: left;">Observe a imagem e leia o poema a seguir</p>
              </div>
              <div class="imagem imagem_pre" style="text-align: center;"><a class="lytebox" href="https://cdn1.estuda.com/sis_questoes/posts/211865_pre.jpg?1523621958"><img class="grande" src="https://cdn1.estuda.com/sis_questoes/posts/211865_pre.jpg?1523621958" /></a></div>
              <div class="pergunta" style="text-align: center;">
              <p>&nbsp;</p>
              <p>Um galo sozinho n&atilde;o tece uma manh&atilde;:</p>
              <p>ele precisar&aacute; sempre de outros galos.</p>
              <p>De um que apanhe esse grito que ele</p>
              <p>e o lance a outro; de um outro galo</p>
              <p>que apanhe o grito de um galo antes</p>
              <p>e o lance a outro; e de outros galos</p>
              <p>que com muitos outros galos se cruzem</p>
              <p>os fios de sol de seus gritos de galo,</p>
              <p>para que a manh&atilde;, desde uma teia t&ecirc;nue,</p>
              <p>se v&aacute; tecendo, entre todos os galos.</p>
              <p>&nbsp;</p>
              <p>E se encorpando em tela, entre todos,</p>
              <p>se erguendo tenda, onde entrem todos,</p>
              <p>se entretendendo para todos, no toldo</p>
              <p>(a manh&atilde;) que plana livre de arma&ccedil;&atilde;o.</p>
              <p>A manh&atilde;, toldo de um tecido t&atilde;o a&eacute;reo</p>
              <p>que, tecido, se eleva por si: luz bal&atilde;o.</p>
              <p><em><small>MELO NETO, Jo&atilde;o Cabral de. Tecendo a manh&atilde;. Dispon&iacute;vel em: &lt;http://www.jornaldepoesia.jor.br/joao02.html&gt;. Acesso em: 24 ago. 2017.</small></em></p>
              <p>&nbsp;</p>
              </div>
              <div class="pergunta pergunta_pos" style="text-align: center;">
              <p style="text-align: left;">A leitura da pintura e do poema permite que se entreveja a import&acirc;ncia da</p>
              </div>
              </div>
              <div class="panel-body" style="text-align: center;">
              <ol style="list-style-type: lower-alpha;">
              <li class="respostas form form-group"><label class="check btn-block "><label class="check btn-block "><span class="letra">expectativa de pessoas e animais que anseiam pela constru&ccedil;&atilde;o de um mundo melhor.</span></label></label></li>
              <li class="respostas form form-group"><label class="check btn-block "><label class="check btn-block "><span class="letra"><label class="check btn-block "><label class="check btn-block ">solidariedade e da comunica&ccedil;&atilde;o para a constru&ccedil;&atilde;o de v&iacute;nculos e de novas realidades.</label></label></span></label></label></li>
              <li class="respostas form form-group"><label class="check btn-block "><label class="check btn-block "><span class="letra"><label class="check btn-block "><label class="check btn-block ">&ecirc;nfase a sentidos que se estabelecem por meio do isolamento individual.</label></label></span></label></label></li>
              <li class="respostas form form-group"><label class="check btn-block "><label class="check btn-block "><span class="letra"><label class="check btn-block "><label class="check btn-block ">indiferen&ccedil;a e da informa&ccedil;&atilde;o para constituir narrativas ficcionais de car&aacute;ter social.</label></label></span></label></label></li>
              <li class="respostas form form-group"><span class="letra">caracteriza&ccedil;&atilde;o literal de figuras cujo retrato metaforiza o desencontro entre os seres.</span></li>
              </ol>
              </div>
              <p style="text-align: center;">&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></textarea>
            </center>
            </div>


        <div class="form-row">
            <div class="col-7">
                <label for="assunto">Assunto</label>
                <select class="form-control" id="assunto_id[]" name="assunto_id[]" aria-describedby="basic-addon3" required>
                    <option selected disabled value="">SELECIONE</option>
                    @foreach ($assuntos as $a)
                    <option value={{$a->id}}> {{$a->nome}} </option>
                    @endforeach
                </select>
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
               
            </div>

            <div class="form-row">
              <div class="col-7">
                  <label for="assunto">Assunto</label>
                  <select class="form-control" id="assunto_id[]" name="assunto_id[]" aria-describedby="basic-addon3" required>
                      <option selected disabled value="">SELECIONE</option>
                      @foreach ($assuntos as $a)
                      <option value={{$a->id}}> {{$a->nome}} </option>
                      @endforeach
                  </select>
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
                 
              </div>

              <div class="form-row">
                <div class="col-7">
                    <label for="assunto">Assunto</label>
                    <select class="form-control" id="assunto_id[]" name="assunto_id[]" aria-describedby="basic-addon3" required>
                        <option selected disabled value="">SELECIONE</option>
                        @foreach ($assuntos as $a)
                        <option value={{$a->id}}> {{$a->nome}} </option>
                        @endforeach
                    </select>
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
                   
                </div>  

            <div class="col">
                <label for="dificuldade">Dificuldade</label>
                <select class="form-control" id="dificuldade" name="dificuldade" required>
                    <option selected disabled value="">SELECIONE</option>
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                </select>
            </div>

            <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Tipo</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo" id="tipo1" value="1" checked>
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

            <div class="col">
                    <label for="tempo">Tempo</label>
                    <input type="number" class="form-control" id="tempo" name="tempo" required>
            </div>
        </div>

        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar">
        
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