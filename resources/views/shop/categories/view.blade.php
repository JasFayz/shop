
@foreach($subcategories as $subcategory)
    <ul>
        <li>{{$subcategory->name}}</li>
        @if(count($subcategory->children))
            @include('shop.categories.view',['subcategories' => $subcategory->children])
        @endif
    </ul>
@endforeach
