@props(['category'])

<div>
    <li>
        <a href="{{ route('customer.category', $category->id) }}">
            {{ $category->category_name }}
        </a>
    </li>

    @foreach ($category->children as $child)
        <x-sidebar-category :category="$child"></x-sidebar-category>
    @endforeach

</div>
