
<div class="col-md-{{$size ?? '12'}}">
    <label class="field option mt15">
        <input type="checkbox"
               id="{{$id ?? $name}}"
               name="{{$name ?? $id}}"
               value="{{$value}}"
               {{isset($checked) ? (is_bool($checked) && $checked ? 'checked' : '') : ''}}
               @if(isset($required)) required @endif
        >
        <span class="checkbox mr10"></span> {{$text}}
    </label>
</div>
