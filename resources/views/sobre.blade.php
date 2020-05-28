@extends('layout.app', ["current" => "sobre"])

@section('body')

<div class="bg-image">
    <div class="container" style="background-color:#ffffff;">
        <div class="row" style="box-shadow:0 2px 2px rgba(0,0,0,0.5);">
            <h5 class="fonte-site font-weight-bold margin-box" style="font-size:25px; margin-top:30px">
                Sobre a Elegance
            </h5>
            <h5 class="fonte-site margin-box" style="font-size:19px">  
                A Elegance localizada na Praça Primo Torquato em Nossa Senhora Aparecida surgiu da necessidade de um atendimento personalizado e exclusivo para todos as pessoas da região.
                Com tecidos finos e rendas sofisticadas, nossas peças são inspiradas nas últimas tendências da moda e design.
                Discrição no atendimento é algo que valorizamos neste serviço e estamos à sua disposição em recebê-los em nosso espaço para conhecer a sua necessidade.
                <br>
                <img class="margin-box" style="width:250px; margin-left:50px; margin-right: 100px" src="images/sobre/camisas-sobre.png">
                <img class="margin-box" style="width:250px" src="images/sobre/bolsas-sobre.png">
                <img class="margin-box" style="width:150px; margin-left:140px; margin-right: 50px" src="images/sobre/vestido-sobre.png">
                
            </h5>
            
        </div>
    </div>
</div>



@endsection