@extends('adminlte::page')

@section('title', 'Crear post')

@section('content_header')
    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{ html()->form('POST', route('admin.posts.store'))->acceptsFiles()->open() }}

            @include('admin.posts.partials.form')

            {{ html()->button('crear Post', 'submit')->class('btn btn-primary') }}
            {{ html()->form()->close() }}


        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
            <style>
                .image-wrapper {
                    position: relative;
                    padding-bottom: 56.25%;
                }

                .image-wrapper img {
                    position: absolute;
                    object-fit: cover;
                    height: 100%;
                    width: 100%;
                }
            </style>

        @stop

        @section('js')

            <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>


            <script>
                $("#name").keyup(function() {
                    var Text = $(this).val();
                    Text = Text.toLowerCase();
                    Text = Text.replace(/[^\w ]+/g, "").replace(/ +/g, "-");
                    $("#slug").val(Text);
                });


                /* text area enrriquecido */
                ClassicEditor
                    .create(document.querySelector('#body'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#extract'))
                    .catch(error => {
                        console.error(error);
                    });


                const $seleccionArchivos = document.querySelector("#file"),
                    $imagenPrevisualizacion = document.querySelector("#picture");
                $seleccionArchivos.addEventListener("change", () => {
                    const archivos = $seleccionArchivos.files;
                    if (!archivos || !archivos.length) {
                        $imagenPrevisualizacion.src = "";
                        return;
                    }
                    const primerArchivo = archivos[0];
                    const objectURL = URL.createObjectURL(primerArchivo);
                    $imagenPrevisualizacion.src = objectURL;

                });
            </script>
        @stop
