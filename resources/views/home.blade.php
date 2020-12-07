@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($categories as $category)

                            {{$category->name}}

{{--                            {{ dump($category->children) }}--}}
                            @if(isset($category->children))
                                @include('shop.categories.view',['subcategories' => $category->children])
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
