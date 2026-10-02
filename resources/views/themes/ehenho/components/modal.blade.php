@props([
  'id' => 'themeModal',
  'title' => 'Thông báo',
  'submitLabel' => 'Xác nhận',
  'action' => null,
  'method' => 'POST'
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      @if($action)
        <form action="{{ $action }}" method="{{ strtolower($method) === 'get' ? 'GET' : 'POST' }}">
          @if(strtolower($method) !== 'get')
            @csrf
            @if(!in_array(strtoupper($method), ['GET', 'POST']))
              @method($method)
            @endif
          @endif
      @endif

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="{{ $id }}Label">{{ $title }}</h4>
      </div>

      <div class="modal-body">
        {{ $slot }}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        @if($action)
          <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
        @endif
      </div>

      @if($action)
        </form>
      @endif
    </div>
  </div>
</div>
