<button type="{{ $type }}" wire:{{ $wire }}="{{ $action }}" class="btn btn-{{ $color }}"
    {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
