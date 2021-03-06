@extends('admin::index')

@section('title', 'Gerenciar Usuários')

@section('topbar')
    @parent
    <!-- Start: Topbar -->
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                @foreach($servers as $server)
                    <li class="@if (strcasecmp($server['id'], $serverName) == 0) active @endif">
                        <a href="{{route('permission.edit.user', ['serverName' => $server['id'], 'groupName' => $groupName])}}">{{$server['name']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="topbar-right hidden-xs hidden-sm">
            <a href="{{route('permission.edit.permission', ['serverName' => $serverName, 'groupName' => $groupName])}}" class="btn btn-default btn-sm fw600 ml10" title="Gerenciar Permissões">
                <span class="fa fa-check"></span>
            </a>
        </div>
    </header>
    <!-- End: Topbar -->
@endsection

@section('content')

    <!-- begin: .tray-left -->
    <aside class="tray tray-left tray290" data-tray-height="match">

        <div class="text-center">
            <button id="animation-switcher" class="btn btn-system w250">Adicionar Usuário</button>
        </div>
        <div id="nav-spy">
            <ul class="nav tray-nav tray-nav-border" data-smoothscroll="-145" data-spy="affix" data-offset-top="105">
                @foreach($groups as $group)
                    <li class="@if (strcasecmp($group['name'], $groupName) == 0) active @endif">
                        <a href="{{route('permission.edit.user', ['serverName' => $serverName, 'groupName' => $group['name']])}}">{{$group['name']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <!-- end: .tray-left -->


    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <div>
            <div class="panel-body pn">
                <form class="form-horizontal">
                    <table class="table admin-form mn" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>UUID</th>
                            <th>Expiração</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['user']}}</td>
                                <td>{{$user['uuid'] ?? ''}}</td>
                                <td>{{$user['expire'] ?? 'Nunca'}}</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" user-id="{{$user['id']}}" action="remove-user" class="btn btn-danger btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <!-- end: .tray-center -->
    </div>
    @include('permission::manager.user.add')
@endsection


@push('styles')
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">

    <!-- Datatables Editor Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">

    <!-- Datatables ColReorder Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/magnific/magnific-popup.css') }}">

@endpush


@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>

    <!-- Datatables ColReorder addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>

    <!-- Datatables Bootstrap Modifications  -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            setupModal('#animation-switcher', '#modal-add-user', 'mfp-with-fade');

            setupTable('#datatable2');

        });
    </script>
@endpush
