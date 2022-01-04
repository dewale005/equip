@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                <div class="flex d-flex flex-column flex-sm-row align-items-center">

                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                        <h2 class="mb-0">Create a new course</h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item">

                                <a href="">Course</a>

                            </li>

                            <li class="breadcrumb-item active">

                                Create

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
                {!! Form::open(['route' => 'course.store']) !!}
                <div class="form-group">
                    {{ Form::label('Course Title', null, ['class' => 'form-label']) }}
                    {{ Form::text('title', null, array_merge(['class' => 'form-control', 'placeholder' => 'Course title ...'])) }}
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('Course Author', null, ['class' => 'form-label']) }}
                    {{ Form::select('author', $teachers->pluck('full_name', 'id'), null, array_merge(['class' => 'form-control custom-select', 'placeholder' => 'Course Author ...'])) }}
                    @error('author')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('Course Duration', null, ['class' => 'form-label']) }}
                    {{ Form::text('duration', null, array_merge(['class' => 'form-control', 'placeholder' => 'Course duration(2hours 3min) ...'])) }}
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('Course Description', null, ['class' => 'form-label']) }}
                    {{ Form::textarea('description', null, array_merge(['class' => 'form-control', 'placeholder' => 'Course description ...'])) }}
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('Course Trailer', null, ['class' => 'form-label']) }}
                    {{ Form::text('trailler_url', null, array_merge(['class' => 'form-control', 'placeholder' => 'Course Trailler URL ...'])) }}
                    @error('trailler_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                </form>
            </div>
        </div>
    </div>
    

    {{-- </div> --}}
    <!-- // END Header Layout Content -->

@endsection


            