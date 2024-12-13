@extends('adminlte::page')

@section('title', 'Ver posts')

@section('content_header')
    <h1>Tus posts</h1>

@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.posts-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop