<!-- Admin Form Popup -->
<div id="modal-add-parent" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-group"></i>Adicionar Grupo</span>
        </div>
        <!-- end .panel-heading section -->

        <form class="ajax dialog" method="post"
              action="http://painel.localhost/api/permission/group/parent"
              data-notification-success-tile="Adicionado"
              data-notification-success="Parent adicionado"
              data-notification-error-tile="Erro ao adicionar Parent ao grupo"
        >
            <input type="hidden" name="idGroup" value="{{$group['id']}}">
            <div class="panel-body p25">
                <div class="section row">
                    <p class="text-muted">
                        <span class="fa fa-exclamation-circle text-warning fs15 pr5"></span> Escolha o grupo a adicionar
                    </p>
                    <hr class="alt short mv15">

                    @foreach($groups as $group)
                        @checkbox([
                        'layout' => 'admin-form',
                        'size' => 12,
                        'id' => 'idGroupParent',
                        'name' => 'idGroupParent[]',
                        'value' => $group['id'],
                        'text' => $group['name'],
                        'checked' => strcasecmp($group['name'], $groupName) == 0 ? true : false
                        ])
                        @endcheckbox
                        <br>
                    @endforeach
                </div>
            </div>
            <!-- end .form-body section -->

            <div class="panel-footer">
                <div class="text-right">
                    <button type="submit" class="button btn-primary">Adicionar</button>
                </div>
            </div>
            <!-- end .form-footer section -->
        </form>
    </div>
    <!-- end: .panel -->
</div>
<!-- end: .admin-form -->

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
@endpush

@push('scripts')
    <!-- DateTime Plugin -->
    <script src="{{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- AdminForms JS -->
    <script src="{{ asset('assets/admin-tools/admin-forms/js/jquery-ui-datepicker.min.js') }}"></script>
@endpush
