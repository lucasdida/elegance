@extends('sistema/layouts.app')

@section('content')

<div class="bg-image" style="padding-bottom: 26%; min-height:730px; background-size:103%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">  
                <a href="{{ route('produto') }}">
                    <button class="botao-sistema" style="vertical-align:middle"><span>PRODUTO </span></button>
                </a>
                <a href="{{ route('banner') }}">
                    <button class="botao-sistema" style="vertical-align:middle"><span>BANNER </span></button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
