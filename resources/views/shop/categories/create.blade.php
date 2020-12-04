@extends('layouts.dashboard')


@section('content')
    <div class="block pb-20">
        <div class="block-header block-header-default">
            <h3 class="mb-0">Создание категории</h3>
        </div>
        <div class="block-content">
            <form action="{{route('shop.categories.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Родительская категория</label>

                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Choose parent ....</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
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
        </script>
    @endpush

@endsection
