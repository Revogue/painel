<form class="ajax dialog" method="post"
      action="{{request()->getSchemeAndHttpHost()}}/{{$url}}"
      data-notification-success-tile="{{$onSuccessTitle ?? 'Sucesso'}}"
      data-notification-success="{{$onSuccess ?? ''}}"
      data-notification-error-tile="{{ $onError ?? 'Ocorreu um erro' }}"
      data-reload="true"
>
    @if(isset($method))
    <input type="hidden" name="_method" value="{{$method ?? 'POST'}}">
    @endif

    @yield('content')

    @if(isset($id))
            <input type="hidden" name="{{$idName}}" value="{{$id}}">
    @endif

    <button type="submit" class="btn btn-{{$type ?? 'success'}} btn-xs">
        <i class="{{$icon}}"></i>
    </button>
</form>
