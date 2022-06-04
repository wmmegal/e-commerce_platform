<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid md:grid-cols-2 lg:grid-cols-4">
        @foreach($categories as $category)
            <x-category :category="$category" />
        @endforeach
    </div>
</x-app-layout>
