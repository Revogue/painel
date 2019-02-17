@extends('admin::index')



@section('content')

    <!-- begin: .tray-left -->
    <aside class="tray tray-left tray290" data-tray-height="match">
        <div class="text-center">
            <button id="animation-switcher" class="btn btn-system w250">Adicionar Grupo</button>
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
        <div class="">
            <form class="">

                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">
                            <span class="fa fa-table"></span>Informações
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="section row">

                            @input_text([
                            'size' => 10,
                            'id' => 'group-name',
                            'name' => 'group-name',
                            'text' => 'Nome',
                            'placeholder' => 'Nome do grupo',
                            'value' => $group['name']
                            ])
                            @endinput_text

                            @input_text([
                            'size' => 2,
                            'id' => 'group-rank',
                            'name' => 'group-rank',
                            'text' => 'Rank',
                            'placeholder' => 'Rank do grupo',
                            'value' => $group['rank']
                            ])
                            @endinput_text

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">

                                    @select([
                                    'size' => 6,
                                    'id' => 'group-rank',
                                    'name' => 'group-rank',
                                    'text' => 'Lider do Grupo',
                                    'values' => $groups,
                                    'text_property' => 'name',
                                    'selected_id' => $group['leader']
                                    ])
                                    @endselect

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">

                                    @select([
                                    'size' => 6,
                                    'id' => 'group_parent',
                                    'name' => 'group_parent',
                                    'text' => 'Pais do grupo',
                                    'values' => $groups,
                                    'text_property' => 'name',
                                    'selected_group' => $group['parent']
                                    ])
                                    @endselect


                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                @panel([
                'title' => 'Prefixos'
                ])
                <table class="table" id="table_prefix" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Prefixo</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group['prefix'] as $prefix)
                        <tr>
                            <td>{{$prefix['value']}}</td>
                            <td>{{$prefix['server']}}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button type="button" permission-id="{{$prefix['id']}}" action="remove-permission" class="btn btn-danger btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
                    @foreach($group['suffix'] as $suffix)
                        <tr>
                            <td>{{$suffix['value']}}</td>
                            <td>{{$suffix['server']}}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button type="button" permission-id="{{$suffix['id']}}"
                                            action="remove-permission"
                                            class="btn btn-danger btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endpanel


            </form>

        </div>
    </div>


    @include('permission::manager.group.add')
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

            setupModal('#animation-switcher', '#modal-add-permission', 'mfp-with-fade');
        });

    </script>
@endpush
