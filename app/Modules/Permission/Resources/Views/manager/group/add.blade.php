<!-- Admin Form Popup -->
<div id="modal-add-permission" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
              <span class="panel-title"><i class="fa fa-group"></i>Adicionar Grupo</span>
        </div>
        <!-- end .panel-heading section -->

        <form method="post" action="/" id="comment">
            <div class="panel-body p25">
                <div class="section row">
                    @input_text([
                        'layout' => 'admin-form',
                        'size' => 7,
                        'name' => 'group-name',
                        'placeholder' => 'Digite o nome do grupo',
                        'icon' => 'fa fa-group'
                    ])
                    @endinput_text

                    @input_number([
                        'layout' => 'admin-form',
                        'size' => 5,
                        'name' => 'group-rank',
                        'placeholder' => 'Digite rank do Grupo',
                        'icon' => 'fa fa-sort'
                    ])
                    @endinput_number

                    <!-- end section -->
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
