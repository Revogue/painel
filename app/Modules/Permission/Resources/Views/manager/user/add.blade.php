<!-- Admin Form Popup -->
<div id="modal-add-user" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
              <span class="panel-title"><i class="fa fa-user"></i>Adicionar Usuário</span>
        </div>
        <!-- end .panel-heading section -->

        <form method="post" action="/" id="comment">
            <div class="panel-body p25">
                <div class="section row">
                    <div class="col-xs-7">
                        <div class="row">
                            @textarea([
                                'layout' => 'admin-form',
                                'size' => 12,
                                'id' => 'permissions',
                                'name' => 'permissions',
                                'icon' => 'fa fa-comments',
                                'placeholder' => 'Username ou UUID',
                                'footer' => 'Digite as usuários a serem adicionadas. Uma por linha',
                            ])
                            @endtextarea

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            @input_date([
                                'layout' => 'admin-form',
                                'size' => 12,
                                'id' => 'datetime-expires',
                                'name' => 'datetime-expires',
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
                                'name' => 'groups',
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
