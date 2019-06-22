@extends('adminlte::page')

@section('title', 'Gerenciar Avaliação')

@section('content_header')
    <h1>Avaliação</h1>
@stop

@section('content')  


    <p> Para imprimir, basta clicar no ícone da impressora, na barra de menus do editor. Ou seguir pelo menu <strong>Arquivo > Imprimir </strong> </p>
    
    <script src="vendor/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
        selector: '#avaliacao',
        language: 'pt_BR',
        browser_spellcheck: true, 
        toolbar: 'undo redo eqneditor| print | bold italic  | fontselect fontsizeselect  | alignleft aligncenter alignright | bullist numlist outdent indent |  image | codesample',
        menubar: true,
        contextmenu_never_use_native: true,
        contextmenu: "link image imagetools table",
        plugins: 'eqneditor advlist toc insertdatetime tabfocus hr pagebreak nonbreaking image image imagetools print preview lists charmap autoresize searchreplace emoticons help paste table codesample', 
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
<textarea id="avaliacao" name="avaliacao"><div class="panel-body">
                <p style="text-align: center;"><span style="font-weight: 400;"><img src="http://cebas.mec.gov.br/images/jpg/brasao_oficial.png" width="66" height="68" /></span></p>
                <p style="text-align: center;"><span style="font-weight: 400;">Minist&eacute;rio da Educa&ccedil;&atilde;o</span></p>
                <p style="text-align: center;"><span style="font-weight: 400;">Universidade Federal de Ouro Preto</span></p>
                <p style="text-align: center;"><span style="font-weight: 400;">Instituto de Ci&ecirc;ncias Exatas e Aplicadas</span></p>
                <p style="text-align: center;"><span style="font-weight: 400;">Departamento de Computa&ccedil;&atilde;o e Sistemas</span></p>
                <table style="height: 174px; width: 735px; border-style: none;">
                <tbody>
                <tr style="height: 46px;">
                <td style="width: 725px; height: 46px;" colspan="3">
                <p>&nbsp;</p>
                </td>
                </tr>
                <tr style="height: 36px;">
                <td style="width: 487px; height: 36px;" colspan="2">
                <p><span style="font-weight: 400;">Aluno:</span></p>
                </td>
                <td style="width: 232px; height: 36px;">
                <p><span style="font-weight: 400;">Matr&iacute;cula:</span></p>
                </td>
                </tr>
                <tr style="height: 46px;">
                <td style="width: 487px; height: 46px;" colspan="2">
                <p><span style="font-weight: 400;">Professor:&nbsp;</span></p>
                </td>
                <td style="width: 232px; height: 46px;">
                <p><span style="font-weight: 400;">Data:&nbsp;</span></p>
                </td>
                </tr>
                <tr style="height: 46px;">
                <td style="width: 274px; height: 46px;">
                <p>&lt;Disciplina&gt;</p>
                </td>
                <td style="width: 207px; height: 46px;">
                <p><span style="font-weight: 400;">Valor:&nbsp;</span></p>
                </td>
                <td style="width: 232px; height: 46px;">
                <p><span style="font-weight: 400;">Nota:</span></p>
                </td>
                </tr>
                </tbody>
                </table>
                <p><strong>O entendimento da prova &eacute; parte da avalia&ccedil;&atilde;o. N&atilde;o&nbsp;ser&aacute; objeto de&nbsp;revis&atilde;o&nbsp;a&nbsp;prova&nbsp;feita a&nbsp;l&aacute;pis.</strong></p>
            @foreach($questoes as $key=>$questao)
            {{ $key+1 }}{!!$questao->enunciado!!} 
            <br><br><br>
            @endforeach
            </div>
        </textarea>

</textarea>
<form method="post" target="_blank" id=questoes action="{{route('viewGabarito')}}">
@csrf
@foreach($questoes as $questao)
<input type="hidden" value="{{$questao->id}}" name="questoes[]">
@endforeach
<br>
<input type="submit" class="btn btn-warning" value="Gerar Gabarito">
</form>
</center>


@stop
