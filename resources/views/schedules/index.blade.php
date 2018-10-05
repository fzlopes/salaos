@extends('layouts.admin')

@section('css')
    <link href="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
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
        <small>lista de todos os serviços do sistema</small>
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
                                        <button class="btn sbold btn-primary" data-toggle="modal" data-target="#modal-novaconsulta">Nova Consulta</button>
                                    </a>
                                    <a href="javascript:;">
                                        <button class="btn sbold btn-primary" data-toggle="modal" data-target="#modal-buscaagenda">Busca Agenda</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 datahoje">
                                <div class="col-md-5">
                                    <a href="javascript:;" class="anterior" data-filter="prev">
                                        <i class="glyphicon glyphicon-backward prev-diary"></i>
                                    </a>
                                    <h3 class="sbold diary-date">{{$dataHoje}}</h3>
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
                            <th> Convênio  </th>
                            <th> Atividade </th>
                            <th>           </th>
                        </tr>
                        </thead>
                        <tbody class="mybody">
                        @if($schedules!=null)
                            @foreach ($schedules as $item)
                                @if($item->action_id == 1)
                                    <tr class="info">
                                @else
                                    @if($item->action_id == 2)
                                        <tr class="success">
                                    @else
                                        <tr class="odd gradeX">
                                            @endif
                                            @endif
                                            <td> {{$item->hour}} </td>
                                            <td class="uppercase"> {{$item->patient}} </td>
                                            @if($item->agreement)
                                                <td> {{$item->agreement->name}} </td>
                                            @else
                                                <td> {{$item->agreement}} </td>
                                            @endif
                                            <td> {{$item->action}} </td>
                                            <td>
                                                <div class="clearfix">
                                                    <a href="{{ route('consultas.edit', $item->id) }}"><button class="btn grey" type="button"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                    <button class="btn red mt-sweetalert" type="button" data-button="del" data-id="{{ $item->id }}" data-title="Confirma exclusão da consulta do paciente {{ $item->patient }}?" data-type="error" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-default" data-cancel-button-text="Não" data-confirm-button-text="Sim, confirmo!" data-confirm-button-class="btn-danger"> <i class="glyphicon glyphicon-remove"></i> </button>
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

    <div class="modal fade" id="modal-novaconsulta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title bold">Nova Consulta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(!empty($diary))
                        {!! Form::model($diary, ['url' => route('consultas.update', $diary->id), 'class' =>'', 'id' =>'submit_form','method' => 'put']) !!}
                        {!! Form::hidden('id', $diary->id) !!}
                    @else
                        {!! Form::open(['url' => route('consultas.store'), 'class' =>'', 'id' =>'submit_form', 'method' => 'post']) !!}
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
                                                    {!! Form::label('hour', 'Hora*', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::time('hour', null, ['class' => 'form-control', 'placeholder' => 'Hora']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('date') ? 'has-error' :'' }}">
                                                    {!! Form::label('date', 'Data*', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::date('date', null , ['class' => 'form-control', 'placeholder' => 'Data']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('hour') ? 'has-error' :'' }}">
                                                    {!! Form::label('patient', 'Paciente*', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::text('patient', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('agreement_id') ? 'has-error' :'' }}">
                                                    {!! Form::label('agreement_id', 'Convênio', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::select('agreement_id', $agreements, !empty($diary->agreement)?$diary->agreement->id:null,  ['class' => 'form-control','placeholder' => 'Selecione o convênio...']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('action') ? 'has-error' :'' }}">
                                                    {!! Form::label('action', 'Atividade', ['class' => 'control-label']) !!}
                                                    <br>
                                                    {!! Form::text('action', null, ['class' => 'form-control', 'placeholder' => 'Atividade']) !!}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" form-group {{ $errors->has('action_id') ? 'has-error' :'' }}">
                                                    @foreach($actions as $action)
                                                        <div class="form-group">
                                                            {!! Form::radio('action_id',$action->id ,false,  ['class' => 'field', 'required' => 'required']) !!}
                                                            {!! Form::label('action_id['.$action->id.']',$action->name, ['class' => 'control-label']) !!}
                                                        </div>
                                                    @endforeach
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
                    url:'/consultas/'+sa_id,
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

                var dataPt = $('.diary-date').html();

                var data = new Date(dataPt.substr(6,4)+'-'+dataPt.substr(3,2)+'-'+dataPt.substr(0,2));

                var prevDate = data.getFullYear() + '-' + (data.getMonth()+1) + '-' + data.getDate();

                $('.diary-date').html(data.toLocaleDateString("pt-BR"));

                $.ajax({
                    type:"GET",
                    url:'/consultas/search/'+prevDate,
                    dataType: 'json',
                    success: function(data){
                        var str = '';
                        var classe = '';
                        data['diaries'].forEach(function(valor, chave){

                            if(valor['action_id'] == 1) {
                                classe='info';
                            }
                            if(valor['action_id'] == 2) {
                                classe='success';
                            }

                            str += '<tr class='+ classe +'><td>'+valor['hour']+'</td><td>'+valor['patient']+
                                '</td><td>';

                            if( valor['agreement_id'] != null) {
                                str += data['agreements'][valor['agreement_id']];
                            }

                            str += '</td><td>';

                            if( valor['action'] != null) {
                                str += valor['action'];
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

                var dataPt = $('.diary-date').html();

                var data = new Date(dataPt.substr(6,4)+'-'+dataPt.substr(3,2)+'-'+dataPt.substr(0,2));

                data.setDate(data.getDate()+2);

                var nextDate = data.getFullYear() + '-' + (data.getMonth()+1) + '-' + data.getDate();

                $('.diary-date').html(data.toLocaleDateString("pt-BR"));

                $.ajax({
                    type:"GET",
                    url:'/agendas/search/'+nextDate,
                    dataType: 'json',
                    success: function(data){
                        var str = '';
                        var classe = '';
                        data['diaries'].forEach(function(valor, chave){

                            if(valor['action_id'] == 1) {
                                classe='info';
                            }
                            if(valor['action_id'] == 2) {
                                classe='success';
                            }

                            str += '<tr class='+ classe +'><td>'+valor['hour']+'</td><td>'+valor['patient']+
                                '</td><td>';

                            if( valor['agreement_id'] != null) {
                                str += data['agreements'][valor['agreement_id']];
                            }

                            str += '</td><td>';

                            if( valor['action'] != null) {
                                str += valor['action'];
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
