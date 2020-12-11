@foreach($subcategories as $subcategory)
    <li @if(count($subcategory['children']) > 0) class="hassubs" @endif>
        <a href="{{ route('category', $subcategory['slug']) }}">
            {{$subcategory['name']}}
             @if(count($category['children']) > 0 ) <i class="fas fa-chevron-right"></i> @endif
        </a>
        @if(count($subcategory['children']) > 0)
            <ul>
                @include('dashboard.shop.categories.view',['subcategories' => $subcategory['children']])
            </ul>
        @endif
    </li>
@endforeach
