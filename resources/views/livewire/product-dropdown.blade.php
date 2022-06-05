<div class="mt-3">
    <div class="font-semibold mb-1">
        {{ \Illuminate\Support\Str::title($variations->first()?->type) }}
    </div>

    <x-select class="w-full" wire:model="selectedVariation">
        <option value="">Choose an option</option>

        @foreach($variations as $variation)
            <option value="{{ $variation->id }}">
                {{ $variation->title }}
            </option>
        @endforeach
    </x-select>

    @if($this->selectedVariationModel?->children->count())
        <livewire:product-dropdown :variations="$this->selectedVariationModel?->children"
                                   :key="$this->selectedVariation"/>
    @endif
</div>
