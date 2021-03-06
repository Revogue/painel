<!-- Admin Form Popup -->
<div id="modal-add-permission" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
              <span class="panel-title"><i class="fa fa-check"></i>Adicionar Permissão</span>
        </div>

        <form class="ajax dialog" method="post"
              action="http://painel.localhost/api/permission/group/permission"
              data-notification-success-tile="Adicionado"
              data-notification-success="Permissção adicionada"
              data-notification-error-tile="Erro ao adicionar permissão"
        >
            <input type="hidden" name="serverName" value="{{$serverName}}">
            <div class="panel-body p25">
                <div class="section row">
                    <div class="col-xs-7">
                        <div class="row">
                            @textarea([
                                'layout' => 'admin-form',
                                'size' => 12,
                                'id' => 'nodes',
                                'name' => 'nodes',
                                'icon' => 'fa fa-comments',
                                'placeholder' => 'Permissiões',
                                'required' => 'true',
                                'footer' => 'Digite as permissões a serem adicionadas. Uma por linha',
                            ])
                            @endtextarea
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            @input_text([
                            'layout' => 'admin-form',
                            'size' => 12,
                            'id' => 'world',
                            'name' => 'world',
                            'icon' => 'fa fa-globe',
                            'placeholder' => 'Mundo',
                            ])
                            @endinput_text
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            @input_date([
                                'layout' => 'admin-form',
                                'size' => 12,
                                'id' => 'expires',
                                'name' => 'expires',
                                'icon' => 'fa fa-calendar-o',
                                'placeholder' => 'Expiração da permissão',
                            ])
                            @endinput_date
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-muted">
                            <span class="fa fa-exclamation-circle text-warning fs15 pr5"></span> Escolha o grupo a adicionar
                        </p>
                        <hr class="alt short mv15">

                        @foreach($groups as $group)
                            @checkbox([
                                'layout' => 'admin-form',
                                'size' => 12,
                                'id' => 'groups',
                                'name' => 'groups[]',
                                'value' => $group['id'],
                                'text' => $group['name'],
                                'checked' => strcasecmp($group['name'], $groupName) == 0 ? true : false
                            ])
                            @endcheckbox
                            <br>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <div class="text-right">
                    <button type="submit" class="button btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
@endpush

@push('scripts')



@endpush
