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
                                <input type="text" class="form-control" disabled value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Родительская категория</label>
                                <input type="text" class="form-control" disabled
                                       value="{{ $category->parent->name ?? $category->parent->name ?? 'NO PARENT'  }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset( $category->image) }}" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

@endsection

