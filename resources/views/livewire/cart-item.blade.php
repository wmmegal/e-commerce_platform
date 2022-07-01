<div class="border-b py-3 flex items-start last:border-0 last:pb-0">
    <div class="w-20 mr-4">
        <img src="{{ $variation->getFirstMediaUrl('default', 'thumb200x200') }}" alt="" class="w-20">
    </div>

    <div class="space-y-2">
        <div>
            <div class="font-semibold text-lg">
                {{ $variation->formattedPrice() }}
            </div>
            <div class="space-y-1">
                <div>{{ $variation->product->title }}</div>

                <div class="flex items-center text-sm">
                    @foreach($variation->ancestorsAndSelf->reverse() as $ancestor)
                        {{ $ancestor->title }} @if(!$loop->last) <span class="text-gray-400 mx-1">/</span> @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <div class="text-sm flex items-center space-x-2">
                <div class="font-semibold">Quantity</div>
                <input type="text" class="text-sm w-12" wire:model="quantity">
            </div>

            <button class="text-sm" wire:click="remove">
                Remove
            </button>
        </div>
    </div>
</div>
