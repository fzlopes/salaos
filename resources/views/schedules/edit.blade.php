@extends('layouts.admin')

@section('css')
    <link href="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/global/css/schedule.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('pagebar')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('profile.dashboard') }}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Agenda</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="pull-right tooltips btn btn-sm">
                <i class="icon-calendar"></i>&nbsp;
                {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->

@endsection

@section('title')

    <h1 class="page-title"> Agenda
        <small>lista de todos os clientes agendados do sistema</small>
    </h1>

@endsection


@section('content')

    <div class="alert hide" id="alert-messages"></div>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable" id="alertSucesso">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Maravilha!</strong> {{ Session::get('success') }}
        </div>
    @endif

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-left">
                                    <a href="javascript:;">
                                        <button class="btn sbold btn-primary" data-toggle="modal" data-target="#modal-novaagenda">Nova Agenda</button>
                                    </a>
                                    <a href="javascript:;">
                                        <button class="btn sbold btn-primary" data-toggle="modal" data-target="#modal-buscaagenda">Busca Agenda</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modal-buscaagenda" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title bold">Busca Agenda</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="portlet-body form">

                                            {!! Form::open(['url' => route('agendas.buscar'), 'class' =>'', 'id' =>'submit_form', 'method' => 'post']) !!}
                                            <div class="form-wizard">
                                                <div class="form-body">
                                                    <div class="tab-content">
                                                        <div class="alert alert-danger display-none">
                                                            <button class="close" data-dismiss="alert"></button> Você precisa preencher os campos abaixo. </div>
                                                        <div class="alert alert-success display-none">
                                                            <button class="close" data-dismiss="alert"></button> Validação correta </div>
                                                        <div class="tab-pane active" id="tab1">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class=" form-group {{ $errors->has('date') ? 'has-error' :'' }}">
                                                                            {!! Form::label('date', 'Data*', ['class' => 'control-label']) !!}
                                                                            <br>
                                                                            {!! Form::date('date', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Data']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="margiv-top-10">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            {!! Form::submit('Buscar', ['class' => 'btn green']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 datahoje">
                                <div class="col-md-5">
                                    <a href="javascript:;" class="anterior" data-filter="prev">
                                        <i class="glyphicon glyphicon-backward prev-diary"></i>
                                    </a>
                                    <h3 class="sbold schedule-date">{{$dataHoje}}</h3>
                                    <a href="javascript:;" class="proximo" data-filter="next">
                                        <i class="glyphicon glyphicon-forward next-diary"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th> Hora      </th>
                            <th> Cliente   </th>
                            <th> Serviço   </th>
                            <th>           </th>
                        </tr>
                        </thead>
                        <tbody class="mybody">
                        @if($schedules!=null)
                            @foreach ($schedules as $item)
                                @if($item->service_id == 1)
                                    <tr class="info">
                                @endif
                                @if($item->service_id == 2)
                                    <tr class="success">
                                @endif
                                @if($item->service_id == 3)
                                    <tr class="primary">
                                @endif
                                @if($item->service_id == 4)
                                    <tr class="secondary">
                                @endif
                                @if($item->service_id == 5)
                                    <tr class="danger">
                                @endif
                                @if($item->service_id == 6)
                                    <tr class="warning">
                                @endif
                                @if($item->service_id == 7)
                                    <tr class="light">
                                @endif
                                @if($item->service_id == 8)
                                    <tr class="muted">
                                @endif
                                @if($item->service_id == 9)
                                    <tr class="dark">
                                @else
                                    <tr class="odd gradeX">
                                @endif
                                        <td> {{$item->hour}} </td>
                                        <td> {{$item->client->name}} </td>
                                        <td> {{$item->service->name}} </td>
                                        <td>
                                            <div class="clearfix">
                                                <a href="{{ route('agendas.edit', $item->id) }}"><button class="btn grey" type="button"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                <button class="btn red mt-sweetalert" type="button" data-button="del" data-id="{{ $item->id }}" data-title="Confirma exclusão da consulta do cliente {{ $item->client }}?" data-type="error" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-default" data-cancel-button-text="Não" data-confirm-button-text="Sim, confirmo!" data-confirm-button-class="btn-danger"> <i class="glyphicon glyphicon-remove"></i> </button>
                                            </div>
                                            {!! Form::open(['url' => '', 'method' => 'deleter', 'id' => 'formDelete']) !!} {!! Form::close() !!}
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <div class="modal fade" id="modal-novaagenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title bold">Nova Agenda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(!empty($schedule))
                        {!! Form::model($schedule, ['url' => route('agendas.update', $schedule->id), 'class' =>'', 'id' =>'submit_form','method' => 'put']) !!}
                        {!! Form::hidden('id', $schedule->id) !!}
                    @else
                        {!! Form::open(['url' => route('agendas.store'), 'class' =>'', 'id' =>'submit_form', 'method' => 'post']) !!}
                    @endif

                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button> Você precisa preencher os campos abaixo. </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button> Validação correta </div>
                                <div class="tab-pane active" id="tab1">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('hour') ? 'has-error' :'' }}">
                                                    {!! Form::label('hour', 'Hora *', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::time('hour', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Hora']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('date') ? 'has-error' :'' }}">
                                                    {!! Form::label('date', 'Data *', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::date('date', null , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Data']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('client_id') ? 'has-error' :'' }}">
                                                    {!! Form::label('client_id', 'Cliente *', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::select('client_id', $clients, !empty($schedule->client)?$schedule->client->id:null,  ['class' => 'form-control','required' => 'required', 'placeholder' => 'Selecione o cliente...']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('service_id') ? 'has-error' :'' }}">
                                                    {!! Form::label('service_id', 'Serviço *', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::select('service_id', $services, !empty($schedule->service)?$schedule->service->id:null,  ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Selecione o serviço...']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('observation') ? 'has-error' :'' }}">
                                                    {!! Form::label('observation', 'Observação', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::text('observation', null, ['class' => 'form-control', 'placeholder' => 'Observação']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('value') ? 'has-error' :'' }}">
                                                    {!! Form::label('value', 'Valor', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Valor pago']) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="margiv-top-10">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    {!! Form::submit('Salvar', ['class' => 'btn green']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
    <script>
        var agree_action = function (sa_button, sa_id) {
            if (sa_button == 'del') {

                $.ajax({
                    type:"DELETE",
                    url:'/agendas/'+sa_id,
                    data:$('#formDelete').serialize(),
                    dataType: 'json',
                    success: function(data){
                        location.reload(false);
                    },
                    error : function(data){
                        location.reload(false);
                    }
                });

            }
            $('button').focus(function() {
                this.blur();
            });
        }
        var not_agree_action = function () {
            $('button').focus(function() {
                this.blur();
            });
        }
    </script>
    <script src="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pages/scripts/ui-sweetalert.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            $('.anterior').on('click', function() {

                var dataPt = $('.schedule-date').html();

                var data = new Date(dataPt.substr(6,4)+'-'+dataPt.substr(3,2)+'-'+dataPt.substr(0,2));

                var prevDate = data.getFullYear() + '-' + (data.getMonth()+1) + '-' + data.getDate();

                $('.schedule-date').html(data.toLocaleDateString("pt-BR"));

                $.ajax({
                    type:"GET",
                    url:'/agendas/search/'+prevDate,
                    dataType: 'json',
                    success: function(data){
                        var str = '';
                        var classe = '';
                        data['schedules'].forEach(function(valor, chave){

                            if(valor['service_id'] == 1) {
                                classe='info';
                            }
                            if(valor['service_id'] == 2) {
                                classe='success';
                            }
                            if(valor['service_id'] == 3) {
                                classe='primary';
                            }
                            if(valor['service_id'] == 4) {
                                classe='secondary'
                            }
                            if(valor['service_id'] == 5) {
                                classe='danger';
                            }
                            if(valor['service_id'] == 6) {
                                classe='warning';
                            }
                            if(valor['service_id'] == 7) {
                                classe='lighy';
                            }
                            if(valor['service_id'] == 8) {
                                classe='muted';
                            }
                            if(valor['service_id'] == 9) {
                                classe='dark';
                            }

                            str += '<tr class='+ classe +'><td>'+valor['hour']+'</td><td>'+valor['clientt']+
                                '</td><td>';

                            str += '</td><td>';

                            if( valor['service'] != null) {
                                str += valor['service'];
                            }

                            str += '</td><td>'

                            str += '<div class="clearfix"><a href="/consultas/'+valor['id']+'/edit"><button class="btn grey" type="button"><i class="glyphicon glyphicon-pencil"></i></button></a>';
                            str += '<form method="POST" action="/consultas/'+valor['id']+'" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="EpzHCLDT5hrvvktJRhBSc8gnxE1eoH7GP0kl612s">';
                            str += '<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></form></div>';
                            str += '</td></tr>';

                        });
                        $('.mybody').html(str);

                    },
                    error : function(data){
                        console.log(data);
                    }
                });

            });

            $('.proximo').on('click', function() {

                var dataPt = $('.schedule-date').html();

                var data = new Date(dataPt.substr(6,4)+'-'+dataPt.substr(3,2)+'-'+dataPt.substr(0,2));

                data.setDate(data.getDate()+2);

                var nextDate = data.getFullYear() + '-' + (data.getMonth()+1) + '-' + data.getDate();

                $('.schedule-date').html(data.toLocaleDateString("pt-BR"));

                $.ajax({
                    type:"GET",
                    url:'/agendas/search/'+nextDate,
                    dataType: 'json',
                    success: function(data){
                        var str = '';
                        var classe = '';
                        data['schedules'].forEach(function(valor, chave){

                            if(valor['service_id'] == 1) {
                                classe='info';
                            }
                            if(valor['action_id'] == 2) {
                                classe='success';
                            }

                            str += '<tr class='+ classe +'><td>'+valor['hour']+'</td><td>'+valor['client']+
                                '</td><td>';

                            str += '</td><td>';

                            if( valor['service'] != null) {
                                str += valor['service'];
                            }

                            str += '</td><td>'

                            str += '<div class="clearfix"><a href="/agendas/'+valor['id']+'/edit"><button class="btn grey" type="button"><i class="glyphicon glyphicon-pencil"></i></button></a>';
                            str += '<form method="POST" action="/agendas/'+valor['id']+'" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="EpzHCLDT5hrvvktJRhBSc8gnxE1eoH7GP0kl612s">';
                            str += '<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></form></div>';
                            str += '</td></tr>';

                        });
                        $('.mybody').html(str);

                    },
                    error : function(data){
                        console.log(data);
                    }
                });

            });

            var agree_action = function (sa_button, sa_id) {
                if (sa_button == 'del') {

                    $.ajax({
                        type:"DELETE",
                        url:'/agendas/'+sa_id,
                        data:$('#formDelete').serialize(),
                        dataType: 'json',
                        success: function(data){
                            location.reload(false);
                        },
                        error : function(data){
                            location.reload(false);
                        }
                    });
                }
                $('button').focus(function() {
                    this.blur();
                });
            }

        });
    </script>
@endsection