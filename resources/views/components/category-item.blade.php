@props(['category'])

<div>
    <li class="category-list">
        <a class="text-decoration-none" href="{{ route('customer.category', $category->id) }}">
            {{ $category->category_name }}
        </a>
    </li>

    @foreach ($category->children as $child)
        <div style="margin-left: 20px;">
            <x-category-item :category="$child"></x-category-item>
        </div>
    @endforeach
</div>
