@extends('admin::index')

@section('title', 'Gerenciar Permissões')

@section('topbar')
    @parent
    <!-- Start: Topbar -->
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                @foreach($servers as $server)
                    <li class="@if (strcasecmp($server['id'], $serverName) == 0) active @endif">
                        <a href="{{route('permission.edit.permission', ['serverName' => $server['id'], 'groupName' => $groupName])}}">{{$server['name']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="topbar-right hidden-xs hidden-sm">
            <a href="{{route('permission.edit.user', ['serverName' => $serverName, 'groupName' => $groupName])}}" class="btn btn-default btn-sm fw600 ml10" title="Gerenciar Usuários">
                <span class="fa fa-user"></span>
            </a>
        </div>
    </header>
    <!-- End: Topbar -->
@endsection

@section('content')

    <!-- begin: .tray-left -->
    <aside class="tray tray-left tray290" data-tray-height="match">
        <div class="text-center">
            <button id="animation-switcher" class="btn btn-system w250">Adicionar Permissão</button>
        </div>
        <div id="nav-spy">
            <ul class="nav tray-nav tray-nav-border" data-smoothscroll="-145" data-spy="affix" data-offset-top="105">
                @foreach($groups as $group)
                    <li class="@if (strcasecmp($group['name'], $groupName) == 0) active @endif">
                        <a href="{{route('permission.edit.permission', ['serverName' => $serverName, 'groupName' => $group['name']])}}">{{$group['name']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <!-- end: .tray-left -->


    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <div>
            <div class="panel-menu">
                <input id="tableFilter" type="text" class="form-control" placeholder="Digite um critério...">
            </div>
            <div class="panel-body pn">
                <table class="table"  data-page-navigation=".pagination" data-filter="#tableFilter" data-page-size="8">
                    <thead>
                    <tr>
                        <th>Permissão</th>
                        <th>Mundo</th>
                        <th>Expiração</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission['node']}}</td>
                            <td>{{$permission['world'] ?? 'Todos' }}</td>
                            <td>{{$permission['expire'] ?? 'Nunca' }}</td>
                            <td class="text-right">
                                @ajaxAction([
                                'url' => 'api/permission/group/permission/'. $permission['id'],
                                'method' => 'DELETE',
                                'onSuccessTitle' => 'Removido',
                                'onSuccess' => 'Permissão foi removido',
                                'onError' => 'Erro ao remover Permissão',
                                'type' => 'danger',
                                'icon' => 'fa fa-times'
                                ])
                                @endajaxAction
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="footer-menu">
                    <tr>
                        <td>
                            <select id="change-page-size">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </td>
                        <td colspan="4">

                            <nav class="text-right">
                                <ul class="pagination hide-if-no-paging"></ul>
                            </nav>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- end: .tray-center -->
    </div>
    @include('permission::manager.permission.add')
@endsection


@push('styles')
    <!-- FooTable Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/footable/css/footable.core.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/magnific/magnific-popup.css') }}">

@endpush


@push('scripts')
    <!-- FooTable Plugin -->
    <script src="{{ asset('vendor/plugins/footable/js/footable.all.min.js') }}"></script>

    <!-- FooTable Addon -->
    <script src="{{ asset('vendor/plugins/footable/js/footable.filter.min.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            setupModal('#animation-switcher', '#modal-add-permission', 'mfp-with-fade');

            $('table').footable();

            $('#change-page-size').change(function (e) {
                e.preventDefault();
                var pageSize = $(this).val();
                $('table').data('page-size', pageSize);
                $('table').trigger('footable_initialized');
            });
            //setupTable('#datatable2');
        });

    </script>
@endpush
