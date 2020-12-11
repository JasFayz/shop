@extends('layouts.dashboard')


@section('content')
    {{ $errors }}
    <div class="block pb-20">
        <div class="block-header block-header-default">
            <h3 class="mb-0">Создание категории</h3>
        </div>
        <div class="block-content">
            <form action="{{route('shop.products.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Родительская категория</label>

                            <select name="category_id" id="category_id" class="form-control js-example-basic-single">
                                <option value="">Choose parent ....</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="part_number">Part number</label>
                            <input type="text" class="form-control" name="part_number">
                        </div>
                        <div class="form-group">
                            <label for="manufacturer_number">Каталожный номер</label>
                            <input type="text" class="form-control" name="manufacturer_number">
                        </div>
                        <div class="form-group">
                            <label for="manufacturer">Производитель</label>
                            <input type="text" class="form-control" name="manufacturer">
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="image" class="label">Загрузить файл</label>
                        <input type="file" class="form-control-file" name="image">
                        <div id="preview" class="my-2"></div>
                    </div>
                    <div class="col-lg-12 d-flex">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">Назад</a>
                        <button class="btn btn-primary ml-auto">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('vendor-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@push('js')
    <script>
        $('input[name=image]').change(function (e) {

            let selectedFile = e.target.files[0]
            let reader = new FileReader();

            let preview = $('#preview');

            reader.onload = function (event) {
                preview.append('<img class="img-fluid rounded">');

                preview.children('img').src = event.target.result;
                console.log(preview.children('img')[0].src = event.target.result)
            }
            reader.readAsDataURL(selectedFile);
        })
        $('.js-example-basic-single').select2();
    </script>
@endpush

@endsection
