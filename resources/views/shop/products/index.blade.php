@extends('layouts.dashboard')


@section('content')
    <div class="block">
        <div class="block-header ">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <a href="{{route('shop.products.create')}}" class="btn btn-alt-primary  my-2 mr-2">Добавить</a>

                    <button type="button" class="btn btn-primary js_attach_file_btn">Файл
                        @push('js')
                            {{--                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
                            <script>
                                $(document).ready(function () {
                                    $('.js_attach_file_btn').click(function (e) {
                                        $('.js_file_input').trigger('click')
                                    })

                                    $('.js_file_input').change(function () {

                                        let data = new FormData();
                                        let file = document.getElementById('file-test').files[0]
                                        let fileExtension = file.name.split('.').pop();
                                        let token = '{{ csrf_token() }}';
                                        // data.append('test','dads');
                                        data.append('filename', file)
                                        data.append("_token", token);
                                        if (fileExtension == 'xlsx') {
                                            $.ajax({
                                                url: '{{ route('upload-file') }}',
                                                type: "POST",
                                                data: data,
                                                processData: false,
                                                contentType: false,
                                                // cache: false,
                                                timeout: 600000,
                                                success: function (response) {
                                                    window.location.pathname = '/dashboard/products/import'
                                                    // console.log(response.data)
                                                },
                                                error: function () {
                                                }
                                            });
                                        }


                                        {{--    }--}}
                                        {{--});--}}
                                        {{--$.post('{{ route('categories.store') }}', data)--}}
                                        {{--    .then(response => {--}}
                                        {{--        console.log(response.status)--}}
                                        {{--    })--}}
                                        {{--    .catch()--}}

                                    });
                                })
                            </script>
                        @endpush
                    </button>
                    <input type="file" class="form-control-file js_file_input" hidden id="file-test">
                </div>
            </div>
        </div>
        <div class="block-content">

            <table class="table table-striped">
                <thead class="table-light">
                <tr>
                    <th style="width: 70px; text-align: center">#</th>
                    <th>Name</th>
                    <th>Part number</th>
                    <th>Номер каталога</th>
                    <th>Производитель</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                <tr>
                    <form action="?" method="get">
                        <td><input type="text" placeholder="id" value='{{request('id')}}' class="form-control" name="id"></td>
                        <td><input type="text" placeholder="Название" value="{{ request('name') }}" class="form-control" name="name"></td>
                        <td><input type="text" placeholder="Part number" value="{{request('part_number')}}" class="form-control"
                                   name="part_number"></td>
                        <td><input type="text" placeholder="Номер каталога" value="{{ request('manufacturer_number') }}" class="form-control" name="manufacturer_number"></td>
                        <td><input type="text" placeholder="Производитель" value="{{ request('manufacturer') }}" class="form-control" name="manufacturer"></td>
                        <td><input type="text" placeholder="Цена" value="{{ request('price') }}" class="form-control" name="price"></td>
                        <button class="btn" type="submit" hidden>Отправить</button>
                    </form>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        {{--                        <td>{{  $product->parent->name ?? "NO PARENT" }} </td>--}}
                        <td>{{ $product->part_number }}</td>
                        <td>{{ $product->manufacturer_number }}</td>
                        <td>{{ $product->manufacturer }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a class="btn py-0" href="{{ route('shop.products.edit', $product->id) }}">
                                <i class="si si-pencil"></i>
                            </a>
                            <a class="btn py-0" href="{{ route('shop.products.show', $product->id) }}">
                                <i class="si si-eye"></i>
                            </a>

                            <form class="d-inline-block"
                                  action="{{ route('shop.products.destroy', $product->id ) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn py-0">
                                    <i class="si si-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $products->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{asset('assets/js/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('assets/js/awesomplete.min.js')}}"></script>

@endsection

@push('js')
    <script>
        $(".js-flatpickr").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d",
        });
    </script>
@endpush
