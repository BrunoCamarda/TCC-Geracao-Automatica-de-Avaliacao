@extends('layouts.home')
 
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Description</div>
                <div class="panel-body">
                    <textarea class="description">{{$content}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('editor')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea.description' });</script>
@endsection