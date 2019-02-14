<!-- Admin Form Popup -->
<div id="modal-add-permission" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>Adicionar Permissão</span>
        </div>
        <!-- end .panel-heading section -->

        <form method="post" action="/" id="comment">
            <div class="panel-body p25">
                <div class="section row">
                    <div class="col-xs-7">
                        <label for="permissions" class="field prepend-icon">
                            <textarea class="gui-textarea" id="permissions" name="permissions" placeholder="Permissiões" cols="7"></textarea>
                            <label for="comment" class="field-icon">
                                <i class="fa fa-comments"></i>
                            </label>
                            <span class="input-footer">Digite as permissões a serem adicionadas. Uma por linha</span>
                        </label>
                        <br>
                        <br>
                        <label for="datetime-expires" class="field prepend-icon">
                            <input type="text" id="datetime-expires" name="datetime-expires" class="gui-input" placeholder="Expiração da permissão">
                            <label class="field-icon">
                                <i class="fa fa-calendar-o"></i>
                            </label>
                        </label>
                    </div>
                    <div class="col-xs-5">
                        {{-- <p class="text-muted">
                            <span class="fa fa-exclamation-circle text-warning fs15 pr5"></span> Escolha o grupo a adicionar
                        </p>
                        <hr class="alt short mv15">
--}}
                        <label class="field option">
                            <input type="checkbox" name="info">
                            <span class="checkbox mr10"></span> Ajudante
                        </label>
                        <br>
                        <label class="field option mt15">
                            <input type="checkbox" name="info">
                            <span class="checkbox mr10"></span> Moderador
                        </label>
                        <br>
                        <label class="field option mt15">
                            <input type="checkbox" name="info">
                            <span class="checkbox mr10"></span> Fundador
                        </label>

                    </div>
                    <!-- end section -->
                </div>
            </div>
            <!-- end .form-body section -->

            <div class="panel-footer">
                <div class="text-right">
                    <button type="submit" class="button btn-primary">Adicionar Servidor</button>
                </div>
            </div>
            <!-- end .form-footer section -->
        </form>
    </div>
    <!-- end: .panel -->
</div>
<!-- end: .admin-form -->

@push('styles')
    <link rel="stylesheet" type="text/css" href="/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
@endpush

@push('scripts')
    <!-- DateTime Plugin -->
    <script src="{{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- AdminForms JS -->
    <script src="{{ asset('assets/admin-tools/admin-forms/js/jquery-ui-datepicker.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            //$('#datetimepicker1').datetimepicker();

            $('#datetime-expires').datetimepicker({
                dateFormat: 'dd/mm/yy',
                timeFormat: "HH:mm:ss",
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                beforeShow: function(input, inst) {
                    var newclass = 'admin-form';
                    var themeClass = $(this).parents('.admin-form').attr('class');
                    var smartpikr = inst.dpDiv.parent();
                    if (!smartpikr.hasClass(themeClass)) {
                        inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                    }
                }
            });
        });
    </script>
@endpush
