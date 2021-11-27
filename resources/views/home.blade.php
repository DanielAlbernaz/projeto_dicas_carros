@extends('layouts.base')
@section('content')

<!---Banner car -->
<div class="section mt-0 clearfix" style="padding: 100px 0">
    <div class="running-car mt-6">
        <img class="car" src="{{asset('imagens/moving-car/car.jpg')}}" alt="Image">
        <img class="wheel" src="{{asset('imagens/moving-car/car-tier.png')}}" alt="Image">
    </div>
    <div class="container clearfix">
        <div class="row clearfix" style="position: relative;">
            <div class="col-lg-6 offset-lg-6">
                <div class="heading-block hlarge">
                    <h3>Dicas Veículos</h3>
                </div>
                <p>Bem vindo, aqui você encontra diversar dicas úteis para seu veículos.</p>
            </div>
        </div>
    </div>
</div>
<!---Fim Banner car -->

<section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100" data-dots="true" data-loop="true" data-grab="false">
    <div class="content-wrap pt-0" style="overflow: visible;">
        <div class="container">
            <div class="card p-4 shadow" style="top: 11px;">
            <!--Form pesquisa dica -->
                <form action="{{route('busca.dicas')}}" method="post" class="mb-0">
                    <div class="row">
                        @csrf
                        <div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">
                            <label>Tipo</label>
                            <select class="selectpicker customjs" title="Selecionar Tipo"  data-size="10" data-live-search="true" data-live-search="true" name="tipo">
                                <optgroup label="Tipo">
                                    <option value="">Selecione Tipo</option>
                                    <option value="1" {{ (isset($parametros['tipo']) && $parametros['tipo']  == '1' ? "selected":"") }} >Caminhão</option>
                                    <option value="2" {{ (isset($parametros['tipo']) && $parametros['tipo'] == '2' ? "selected":"") }}>Carro</option>
                                    <option value="3" {{ (isset($parametros['tipo']) && $parametros['tipo'] == '3' ? "selected":"") }}>Moto</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-md-2 col-sm-12">
                            <label>Marca</label>
                            <input class="form-control text-start" type="text" name="marca" value="{{ (isset($parametros['marca']) ? $parametros['marca'] : '') }}">
                        </div>

                        <div class="col-md-2 col-sm-12">
                            <label>Modelo</label>
                            <input class="form-control text-start" type="text" name="modelo" value="{{ (isset($parametros['modelo']) ? $parametros['modelo'] : '') }}">
                        </div>

                        <div class="col-md-2 col-sm-12">
                            <label>Versão</label>
                            <input class="form-control text-start" type="text" name="versao" value="{{ (isset($parametros['versao']) ? $parametros['versao'] : '') }}">
                        </div>

                        <div class="col-md-2 col-sm-6 col-6">
                            <button class="button button-3d button-rounded w-100 ms-0" style="margin-top: 29px;">Filtrar</button>
                        </div>
                    </div>
                </form>
            <!--Fim Form pesquisa dica -->
            </div>
        </div>
    </div>


    <div class="section m-0 pt-0 bg-transparent">

        <!--Mensagem caso vazio dicas -->
        @if ($dicas->isEmpty())
            <div class="container clearfix">
                <div class="center">
                    <div class="before-heading text-uppercase ls1" style="font-size: 13px; font-style: normal;">Não encontramos nenhum resultado com os parâmetros da buscas usados! Por favor Tente novamento com novos parâmetros.</div>
                </div>
            </div>
        @else
            <div class="container clearfix">
                <div class="heading-block center">
                    <h3 class="fw-bold">Dicas</h3>
                </div>
            </div>
        @endif
        <!-- FIm Mensagem caso vazio dicas -->

        <div class="container">
            <div id="portfolio" class="portfolio row gutter-30 grid-container" data-layout="fitRows">

                @foreach ($dicas as $dica)
                <!-- Dicas -->
                    <article class="portfolio-item col-12 col-sm-6 col-lg-4 cf-sedan">
                        <a href="#">
                            <div class="grid-inner card shadow-sm">
                                <div class="portfolio-desc" style="height: 105%;">
                                    <h3><a href="" style="color: #1ABC9C;"> {{$dica->user->name}}</a></h3>
                                    <span>{!!$dica->text!!}</span>
                                </div>
                                <div class="row g-0 car-p-features font-primary clearfix">
                                    <div class="col-lg-4 col-6 p-0"><i class="icon-car-alert"></i><span>{{$dica->tipo->name}}</span></div>
                                    <div class="col-lg-4 col-6 p-0"><i class="icon-car-meter"></i><span>{{$dica->marca}}</span></div>
                                    <div class="col-lg-4 col-6 p-0"><i class="icon-car-wheel"></i><span>{{$dica->modelo}}</span></div>
                                    <div class="col-lg-4 col-6 p-0"><i class="icon-car-fuel2"></i><span>{{$dica->versao}}</span></div>

                                </div>
                            </div>
                        </a>
                    </article>
                <!-- Fim Dicas -->
                @endforeach
            </div>

            <!-- Paginate -->
            <div class="d-flex justify-content-center p-4 p-md-5">
                {!! $dicas->links() !!}
            </div>
            <!-- Fim Paginate -->
        </div>
    </div>

</section>

@endsection
