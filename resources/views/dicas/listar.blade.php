@extends('layouts.base')
@section('content')

<!---cabeçalho  -->
<section id="page-title" class="page-title-parallax page-title-dark skrollable skrollable-between" style="background-image: url('{{asset('imagens/hero-slider/4.jpg')}}'); background-size: cover; padding: 120px 0px; background-position: 0px -178.979px;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
    <div class="container clearfix">
        <h1>Minhas Dicas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dica.listar')}}">Cadastrar Dicas</a></li>
        </ol>
    </div>
</section>
<!---Fim cabeçalho  -->

<div class="section m-0 bg-transparent clearfix" style="padding: 50px 0;"></div>

<section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100" data-dots="true" data-loop="true" data-grab="false">

    <!---Titulo dicas  -->
    <div class="container clearfix">
        <div class="heading-block center">
            <h3 class="fw-bold">Minhas Dicas</h3>
        </div>
    </div>
    <!---Fim Titulo dicas  -->

    <div class="container">
        <!---mensagens  -->
        @include('componentes.mensagem_padrao')

        <div class="row">
            <div class="col-md-3 shadow grid-container">
                <form class="mb-1 custom-form-user" action="{{ Request::route()->getName() == 'edit.dica' ? route('dica.edit', $dicaEdit->id) : route('dica.salvar') }}" method="post">
                    @csrf
                    <div class="col-md-12 form-group">
                        <label for="template-contactform-service">Tipo<small>*</small></label>
                        <select class="selectpicker customjs form-control @error('tipo_dica') is-invalid @enderror" title="Selecionar Tipo"  data-size="10" data-live-search="true" data-live-search="true" title="Selecionar tipo" name="tipo_dica" required>
                            <option value="">Selecionar Tipo</option>
                            <option value="1" {{ (isset($dicaEdit->dica_tipo_id) && $dicaEdit->dica_tipo_id || old('tipo_dica')  == '1' ? "selected":"") }} >Caminhão</option>
                            <option value="2" {{ (isset($dicaEdit->dica_tipo_id) && $dicaEdit->dica_tipo_id || old('tipo_dica')  == '2' ? "selected":"") }} >Carro</option>
                            <option value="3" {{ (isset($dicaEdit->dica_tipo_id) && $dicaEdit->dica_tipo_id || old('tipo_dica')  == '3' ? "selected":"") }} >Moto</option>
                        </select>

                        @error('tipo_dica')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if (Request::route()->getName() == 'edit.dica')
                        <input type="hidden" name="id" value="{{ isset($dicaEdit->id) ? $dicaEdit->id : old('id') }}">
                    @endif

                    <div class="col-md-12 form-group">
                        <label for="template-contactform-subject">Marca <small>*</small></label>
                        <input type="text" id="template-contactform-subject" class="form-control text-start" name="marca" value="{{ isset($dicaEdit->marca) ? $dicaEdit->marca : old('marca') }}" required>
                        @error('marca')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="template-contactform-subject">Modelo <small>*</small></label>
                        <input type="text" id="template-contactform-subject" class="form-control text-startl @error('modelo') is-invalid @enderror" name="modelo" value="{{ isset($dicaEdit->modelo) ? $dicaEdit->modelo : old('modelo') }}" required>
                        @error('modelo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="template-contactform-subject">Versão </label>
                        <input type="text" id="template-contactform-subject" class="form-control text-start @error('versao') is-invalid @enderror" name="versao" value="{{ isset($dicaEdit->versao) ? $dicaEdit->versao : old('versao') }}">
                        @error('versao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="w-100"></div>

                    <div class="col-12 form-group">
                        <label for="template-contactform-message">Dica <small>*</small>(max 180 car.)</label>
                        <textarea class="form-control text-start @error('text') is-invalid @enderror" id="template-contactform-message" rows="5" cols="30" name="text" required>{{ isset($dicaEdit->text) ? $dicaEdit->text : old('text') }}</textarea>
                        @error('text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <button class="button button-3d m-0" type="submit" id="template-contactform-submit" value="submit">Salvar</button>

                        @if (Request::route()->getName() == 'edit.dica')
                            <a href="{{route('dica.listar')}}" class="button button-3d m-0" id="template-contactform-submit" style="background-color: #5164c8">Voltar</a>
                        @endif
                    </div>
                </form>
                <!---Fim Form cadastro e/ou edição dicas  -->
            </div>

            <div class="col-md-9">
                <div class="section m-0 pt-0 bg-transparent" style="overflow: visible;">
                    <div class="section m-0 pt-0 bg-transparent">
                        <div class="container">

                            <!-- Mensagem caso vazio dicas -->
                            @if ($dicas->isEmpty())
                                <div class="container clearfix">
                                    <div class="center">
                                        <div class="before-heading text-uppercase ls1" style="font-size: 13px; font-style: normal;">Você não possuiu nenhuma dica cadastrada.</div>
                                    </div>
                                </div>
                            @endif
                             <!-- Fim Mensagem caso vazio dicas -->

                            <div id="portfolio" class="portfolio row gutter-30 grid-container" data-layout="fitRows">

                                @foreach ($dicas as $dica)
                                 <!-- Fim Dicas -->
                                    <article class="portfolio-item col-12 col-sm-6 col-lg-4 cf-sedan">
                                        <a href="">
                                            <div class="icones-acao">
                                                <a class="a-icones-acao" href="{{route('edit.dica',$dica->id)}}"><img src="{{asset('imagens/edit.png')}}" title="Editar"></a>
                                                <a class="a-icones-acao cursor" id="danger-alert" data-link="{{route('delete.dica',$dica->id)}}"><img src="{{asset('imagens/trash.png')}}" title="Excluir"></a>
                                            </div>

                                            <div class="grid-inner card shadow-sm">
                                                <div class="portfolio-desc" style="height: 172px;">
                                                    <h3><a href="" style="color: #1ABC9C;">{{$dica->user->name}}</a></h3>
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
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
