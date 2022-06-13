<div class="space-y-4">
    <img src="{{ $selectedImgUrl }}" alt="">

    <div class="grid grid-cols-6 gap-2">
        @foreach($product->getMedia() as $media)
            <button type="button" wire:click="selectImgUrl('{{ $media->getUrl() }}')">
                <img src="{{ $media->getUrl('thumb200x200') }}" alt="">
            </button>
        @endforeach
    </div>
</div>

