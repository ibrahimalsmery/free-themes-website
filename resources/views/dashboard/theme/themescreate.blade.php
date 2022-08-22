@extends('dashboard.layouts.common')

@section('content')
    <div class="card card-body">
        <a href="{{route('dashboard.themes.index')}}" class="text-primary m-1 mb-3">Themes list</a>
        @include('dashboard.layouts.messages')

        <form action="{{ route('dashboard.themes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="title" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror" placeholder="Theme Title">
            </div>
            <div class="form-group">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="Theme description">{{ old('description') }}</textarea>
            </div>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-2 float-sm-left pt-0 ">Status</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" {{old('status') ==  1 ? 'checked': ''}} type="radio" name="status" id="status1" value="1" checked>
                        <label class="form-check-label" for="status1">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" {{old('status') ==  0 ? 'checked': ''}} type="radio" name="status" id="status2" value="0">
                        <label class="form-check-label" for="status2">
                            In Active
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="themeimage">Theme image</label>
                <input id="themeimage" type="file" name="image_path"
                    class="form-control @error('image_path') is-invalid @enderror">
            </div>
            <div class="form-group">
                <input type="text" name="preview_link" value="{{ old('preview_link') }}"
                    class="form-control @error('preview_link') is-invalid @enderror" placeholder="Preview link">
            </div>

            <div class="form-group">
                <label for="sourcefile">Source file</label>
                <input id="sourcefile" type="file" name="source_link" value="{{ old('source_link') }}"
                    class="form-control @error('source_link') is-invalid @enderror" placeholder="Source link">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save <i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>
@endsection
