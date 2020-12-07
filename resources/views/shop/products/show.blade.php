@extends('layouts.dashboard')



@section('content')

    <div class="block pb-20">
        <div class="block-header block-header-default">
            <h3 class="block-title">Категория</h3>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="block">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="">Название</label>
                                <input type="text" class="form-control" disabled value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Категория</label>
                                <input type="text" class="form-control" disabled
                                       value="{{ $product->category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="part_number">Part number</label>
                                <input type="text" class="form-control" name="part_number"
                                       value="{{ $product->part_number }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="manufacturer_number">Каталожный номер</label>
                                <input type="text" class="form-control" name="manufacturer_number"
                                       value="{{$product->manufacturer_number}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Производитель</label>
                                <input type="text" class="form-control" name="manufacturer"
                                       value="{{ $product->manufacturer }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" class="form-control" name="price"
                                       value="{{ $product->price }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset( $product->image) }}" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

@endsection

