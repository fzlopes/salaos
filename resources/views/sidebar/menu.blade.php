<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search " action="javascript:;" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" id="busca_cliente" name="busca_cliente" placeholder="Buscar cliente..." autocomplete="off" spellcheck="false" dir="auto">
                        <input type="hidden" id="selected_client" value="">
                        <input type="hidden" id="url_client" value="{{ url('/usuarios/') }}">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit" id="btn_busca_cliente">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
            </li>

            <li class="nav-item {{ Route::getCurrentRoute()->uri() == 'dashboard' ? ' start active open' : '' }}">
                <a href="{{ route('profile.dashboard') }}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    @if (Route::getCurrentRoute()->uri() == 'dashboard')
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item {{ Route::getCurrentRoute()->uri() == 'profile' ? ' start active open' : '' }}">
                <a href="{{ route('profile.profile') }}" class="nav-link">
                    <i class="icon-user"></i>
                    <span class="title">Meu perfil</span>
                    @if (Route::getCurrentRoute()->uri() == 'profile')
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item  {{ strstr(Route::getCurrentRoute()->getName(), '.', true) == 'testes' || Request::is('testes/create') ? ' start active open' : '' }}">
                <a href="{{ route('testes.index') }}" class="nav-link ">
                    <i class="icon-rocket"></i>
                    <span class="title">Teste</span>
                </a>
            </li>

            {{--<li class="heading">--}}
                {{--<h3 class="uppercase">Configurações</h3>--}}
            {{--</li>--}}
            {{--<li class="nav-item  {{ strstr(Route::getCurrentRoute()->getName(), '.', true) == 'usuarios' || strstr(Route::getCurrentRoute()->getName(), '.', true) == 'grupos' ? ' start active open' : '' }}">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-lock"></i>--}}
                    {{--<span class="title">Permissões</span>--}}
                    {{--@if (strstr(Route::getCurrentRoute()->getName(), '.', true) == 'usuarios')--}}
                        {{--<span class="selected"></span>--}}
                        {{--<span class="arrow open"></span>--}}
                    {{--@else--}}
                        {{--<span class="arrow"></span>--}}
                    {{--@endif--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item  {{ strstr(Route::getCurrentRoute()->getName(), '.', true) == 'usuarios' ? ' start active open' : '' }}">--}}
                        {{--<a href="{{ route('usuarios.index') }}" class="nav-link ">--}}
                            {{--<i class="icon-users"></i>--}}
                            {{--<span class="title">Usuários</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item  {{ strstr(Route::getCurrentRoute()->getName(), '.', true) == 'grupos' ? ' start active open' : '' }}">--}}
                        {{--<a href="{{ route('grupos.index') }}" class="nav-link ">--}}
                            {{--<i class="icon-puzzle"></i>--}}
                            {{--<span class="title">Grupos</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}


            {{--<li class="heading">--}}
                {{--<h3 class="uppercase">Financeiro</h3>--}}
            {{--</li>--}}
            {{--<li class="nav-item  ">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-layers"></i>--}}
                    {{--<span class="title">Cadastros</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item  ">--}}
                        {{--<a href="components_date_time_pickers.html" class="nav-link ">--}}
                            {{--<span class="title">Usuários</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item  ">--}}
                        {{--<a href="components_color_pickers.html" class="nav-link ">--}}
                            {{--<span class="title">Grupos</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="nav-item  ">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-graph"></i>--}}
                    {{--<span class="title">Contas a receber</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item  ">--}}
                        {{--<a href="components_date_time_pickers.html" class="nav-link ">--}}
                            {{--<span class="title">Usuários</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item  ">--}}
                        {{--<a href="components_color_pickers.html" class="nav-link ">--}}
                            {{--<span class="title">Grupos</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="heading">--}}
                {{--<h3 class="uppercase">Relatórios</h3>--}}
            {{--</li>--}}
            {{--<li class="nav-item  ">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-bar-chart"></i>--}}
                    {{--<span class="title">Financeiros</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item  ">--}}
                        {{--<a href="components_date_time_pickers.html" class="nav-link ">--}}
                            {{--<i class="icon-users"></i>--}}
                            {{--<span class="title">Usuários</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item  ">--}}
                        {{--<a href="components_color_pickers.html" class="nav-link ">--}}
                            {{--<i class="icon-puzzle"></i>--}}
                            {{--<span class="title">Grupos</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        </ul>
    </div>
</div>
