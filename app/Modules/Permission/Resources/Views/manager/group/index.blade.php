@extends('admin::index')

@section('title', 'Gerenciar Grupos')
@section('title', 'Gerenciar Grupos')

@section('content')

    <!-- begin: .tray-left -->
    <aside class="tray tray-left tray290" data-tray-height="match">
        <div class="text-center">
            <button id="add-group" class="btn btn-system w250">Adicionar Grupo</button>
        </div>
        <div id="nav-spy">
            <ul class="nav tray-nav tray-nav-border" data-smoothscroll="-145" data-spy="affix" data-offset-top="105">
                @foreach($groups as $_group)
                    <li class="@if (strcasecmp($_group['name'], $groupName) == 0) active @endif">
                        <a href="{{route('permission.edit.group', ['groupName' => $_group['name']])}}">{{$_group['name']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <!-- end: .tray-left -->

    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        @if($group)
            <div class="">

                @panel([
                'title' => 'Informações'
                ])
                @slot('menu')
                    <form class="ajax dialog" method="post"
                          action="http://painel.localhost/api/permission/group/{{$group['id']}}"
                          data-notification-success-tile="Apagado"
                          data-notification-success="Grupo apagado!"
                          data-notification-error-tile="Erro ao apagar grupo"
                          data-reload="true"
                    >
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger">
                            <span class="glyphicon glyphicon-trash fs11 mr5"></span>Apagar
                        </button>
                    </form>
                @endslot
                <div class="section row">
                    <form class="ajax dialog" method="post" id="update-group"
                          action="http://painel.localhost/api/permission/group/{{$group['id']}}"
                          data-notification-success-tile="Atualizado"
                          data-notification-success="Grupo atualizado!"
                          data-notification-error-tile="Erro ao atualizar informações grupo"
                          data-reload="true"
                          data-method="PUT">
                        @input_text([
                        'size' => 6,
                        'id' => 'group-name',
                        'name' => 'name',
                        'text' => 'Nome',
                        'placeholder' => 'Nome do grupo',
                        'value' => $group['name']
                        ])
                        @endinput_text

                        @input_text([
                        'size' => 2,
                        'id' => 'group-rank',
                        'name' => 'rank',
                        'text' => 'Rank',
                        'placeholder' => 'Rank do grupo',
                        'value' => $group['rank']
                        ])
                        @endinput_text

                        @input_text([
                        'size' => 4,
                        'id' => 'group-ladder',
                        'name' => 'ladder',
                        'text' => 'Escada do Grupo',
                        'value' => $group['ladder']
                        ])
                        @endinput_text
                    </form>
                </div>
                @slot('footer')
                    <div class="text-right">
                        <button type="submit" form="update-group" class="btn btn-success">Salvar</button>
                    </div>
                @endslot
                @endpanel


                @panel([
                'title' => 'Pais do Grupo'
                ])
                @slot('menu')
                    <button id="add-parent" type="button" class="btn btn-xs btn-success">
                        <span class="fa fa-plus fs11 mr5"></span>Adicionar
                    </button>
                @endslot
                <table class="table" id="table_parent" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Grupo</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($group)
                        @foreach($group['parent'] as $parent)
                            <tr>
                                <td>{{$parent['group']['name']}}</td>
                                <td class="text-right">
                                    @ajaxAction([
                                    'url' => 'api/permission/group/parent/'. $parent['id'],
                                    'method' => 'DELETE',
                                    'onSuccessTitle' => 'Removido',
                                    'onSuccess' => 'Parent foi removido',
                                    'onError' => 'Erro ao remover Parent',
                                    'type' => 'danger',
                                    'icon' => 'fa fa-times'
                                    ])
                                    @endajaxAction
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @endpanel

                @panel([
                'title' => 'Prefixos'
                ])
                <table class="table" id="table_prefix" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Prefixo</th>
                        <th>Server</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($group)
                        @foreach($group['prefix'] as $prefix)
                            <tr>
                                <td>{{$prefix['value']}}</td>
                                <td>{{$prefix['server']}}</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" id-prefix="{{$prefix['id']}}" action="remove-permission" class="btn btn-danger btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @endpanel

                @panel([
                'title' => 'Sufixos'
                ])
                <table class="table " id="table_suffix" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Sufixo</th>
                        <th>Server</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($group)
                        @foreach($group['suffix'] as $suffix)
                            <tr>
                                <td>{{$suffix['value']}}</td>
                                <td>{{$suffix['server']}}</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" id-suffix="{{$suffix['id']}}"
                                                action="remove-permission"
                                                class="btn btn-danger btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @endpanel


            </div>
        @endif
    </div>


    @include('permission::manager.group.add')
    @if($group)
        @include('permission::manager.group.addParent')
    @endif
@endsection


@push('styles')
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">

    <!-- Datatables Editor Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">

    <!-- Datatables ColReorder Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">


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

    <!-- Page Plugins -->
    <script src="{{ asset('vendor/plugins/magnific/jquery.magnific-popup.js') }}"></script>

    <!-- DateTime Plugin -->
    <script src="/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {

            setupModal('#add-group', '#modal-add-permission', 'mfp-with-fade');
            setupModal('#add-parent', '#modal-add-parent', 'mfp-with-fade');


        });

    </script>
@endpush
