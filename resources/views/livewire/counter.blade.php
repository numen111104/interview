<div>
    <x-button type="button" action="increment" wire="click" color="success" :disabled='false'>+</x-button>
    <x-button type="button" action="decrement" wire="click" color="danger" :disabled='$count == 0'>-</x-button>
    
    <span>Hasil : {{ $count }}</span>
</div>
