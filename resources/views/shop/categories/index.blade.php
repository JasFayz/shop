@extends('layouts.dashboard')


@section('content')
    <div class="block">
        <div class="block-header ">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <a href="{{route('shop.categories.create')}}" class="btn btn-alt-primary  my-2 mr-2">Добавить</a>

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
                                                    window.location.pathname = '/dashboard/categories/import'
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
                    <th>Родительская категория</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
                <tr>
                    <form action="?" method="get">
                        <th><input name="id" value="{{ request('id') }}" type="text" class="form-control"></th>
                        <th><input name="name" type="text" value="{{ request('name') }}" class="form-control"></th>
                        <th>
                            <input name="parent_name" type="text" value="{{ request('parent_name') }}" list="mylist"
                                   class="form-control">
                            <datalist id="mylist">
                                @foreach($categories as $category)
                                    <option> {{ $category->name }}</option>
                                @endforeach
                            </datalist>
                        </th>
                        <th>
                            <input type="text"
                                   class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input"
                                   id="category_created_at" name="created_at"
                                   data-enable-time="false" data-date-format="Y-m-d"
                                   data-time_24hr="true" readonly="readonly">

                        </th>
                        <th>
                            <button type="submit" class="" hidden>Search</button>
                        </th>
                    </form>
                </tr>
                </thead>
                <tbody>
                @foreach($pageCategories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{  $category->parent->name ?? "NO PARENT" }} </td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a class="btn" href="{{ route('shop.categories.edit', $category->id) }}">
                                <i class="si si-pencil"></i>
                            </a>
                            <a class="btn" href="{{ route('shop.categories.show', $category->id) }}">
                                <i class="si si-eye"></i>
                            </a>

                            @if($category->parent_id > 0)
                                <form class="d-inline-block" action="{{ route('shop.categories.destroy', $category->id) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <i class="si si-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $pageCategories->links('vendor.pagination.bootstrap-4') }}
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
