<div class="col-md-{{$size ?? '12'}}">
    <label for="{{$id ?? $name}}" class="field prepend-icon">
        <input type="text"
               id="{{$id ?? $name}}"
               name="{{$name ?? $id}}"
               data-type="date"
               class="gui-input"
               placeholder="{{$placeholder ?? ''}}"
        >
        <label class="field-icon">
            <i class="{{$icon ?? ''}}"></i>
        </label>
    </label>
</div>

