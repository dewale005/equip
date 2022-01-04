@extends('layouts.index')
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px !important;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: "FontAwesome";
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px !important;
        height: 192px !important;
        position: relative;
        border-radius: 100% !important;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100% !important;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

</style>

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                <div class="flex d-flex flex-column flex-sm-row align-items-center">

                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                        <h2 class="mb-0">Update teacher</h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item">

                                <a href="">teacher</a>

                            </li>

                            <li class="breadcrumb-item active">

                                Update

                            </li>

                        </ol>

                    </div>
                </div>

            </div>
        </div>

        <div class="container page__container page-section">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (session()->has(" alert-$msg"))
                    <div class="alert alert alert-soft-{{ $msg }} d-flex d-flex" role="alert">
                        <div class="text-body" style="text-align: center">{{ session()->get("alert-$msg") }}</div>
                    </div>
                @endif
            @endforeach
            <div class="page-separator">
                <div class="page-separator__text">Basic Information</div>
            </div>
            <div class="col-md-6 ">
                {!! Form::open(['route' => ['teachers.update', $teachers->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url({{ URL::to('/images/'.$teachers->avatar) }});">
                        </div>
                    </div>
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Rate this Teacher:</label>
                    <div class="input-group input-group-merge">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" checked />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                    @error('rate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label("Teacher's Title", null, ['class' => 'form-label']) }}
                    {{ Form::text('title', $teachers->title, array_merge(['class' => 'form-control', 'placeholder' => "Teacher's title ..."])) }}
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('Teachers Full Name', null, ['class' => 'form-label']) }}
                    {{ Form::text('full_name', $teachers->full_name, array_merge(['class' => 'form-control', 'placeholder' => 'Teachers full name ...'])) }}
                    @error('full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label("Teacher's Bio", null, ['class' => 'form-label']) }}
                    {{ Form::textarea('description', $teachers->description, array_merge(['class' => 'form-control', 'placeholder' => "Teacher's bio ..."])) }}
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('facebook handle', null, ['class' => 'form-label']) }}
                    {{ Form::text('facebook', $teachers->facebook, array_merge(['class' => 'form-control', 'placeholder' => 'Teachers Facebook handle ...'])) }}
                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('instagram handle', null, ['class' => 'form-label']) }}
                    {{ Form::text('instagram', $teachers->instagram, array_merge(['class' => 'form-control', 'placeholder' => 'Teachers Instagram handle ...'])) }}
                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {!! Form::submit('Update Teacher', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                </form>
            </div>
        </div>
    </div>

    {{-- </div> --}}
    <!-- // END Header Layout Content -->

@endsection
