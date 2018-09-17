bi@extends('layouts.admin')

@section('css')
    <link href="{{ asset('vendor/pages/css/profile.css') }}" rel="stylesheet" type="text/css" />
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
                <span>Dashboard</span>
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

    <h1 class="page-title"> Dashboard
        <small>principais eventos e estatísticas</small>
    </h1>

@endsection


@section('content')

    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$usuarios}}">0</span>
                    </div>
                    <div class="desc"> Usuários ativos </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="0">0</span>
                    </div>
                    <div class="desc"> Clientes ativos</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="89"></span>% </div>
                    <div class="desc"> Recebido do total até o momento </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1539,00">0</span>R$ </div>
                    <div class="desc"> Falta receber no mês </div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-lg-6 col-xs-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Volume de recebimento</span>
                        <span class="caption-helper">análise diária</span>
                    </div>
                    {{--<div class="actions">--}}
                        {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                            {{--<label class="btn red btn-outline btn-circle btn-sm active">--}}
                                {{--<input type="radio" name="options" class="toggle" id="option1">New</label>--}}
                            {{--<label class="btn red btn-outline btn-circle btn-sm">--}}
                                {{--<input type="radio" name="options" class="toggle" id="option2">Returning</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="portlet-body">
                    <div id="site_statistics_loading">
                        <img src="{{ asset('vendor/global/img/loading.gif') }}" alt="loading" />
                    </div>
                    <div id="site_statistics_content" class="display-none">
                        <div id="site_statistics" class="chart"> </div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-red-sunglo hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Faturamento</span>
                        <span class="caption-helper">mês a mês</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_loading">
                        <img src="{{ asset('vendor/global/img/loading.gif') }}" alt="loading" /> </div>
                    <div id="site_activities_content" class="display-none">
                        <div id="site_activities" style="height: 228px;"> </div>
                    </div>
                    <div style="margin: 20px 0 10px 30px">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-success"> Revenue: </span>
                                <h3>$13,234</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-info"> Tax: </span>
                                <h3>$134,900</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-danger"> Shipment: </span>
                                <h3>$1,134</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-warning"> Orders: </span>
                                <h3>235090</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('vendor/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendor/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendor/pages/scripts/dashboard.js') }}" type="text/javascript"></script>
@endsection
