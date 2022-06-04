<div class="{{ $category->depth === 0 ? '' : 'ml-4' }}">
    <a href="categories/{{ $category->slug }}"
       class="{{ $category->depth === 0 ? 'font-bold' : '' }}">{{ $category->name }}</a>
    @foreach($category->children as $child)
        <x-category :category="$child"/>
    @endforeach
</div>
