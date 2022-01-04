@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                        <h2 class="mb-0">Courses</h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item active">

                                Courses

                            </li>

                        </ol>

                    </div>
                </div>

                <div class="row" role="tablist">
                    <div class="col-auto">
                        <a href="{{ route('course.create') }}" class="btn btn-outline-secondary">Add Course</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container page__container page-section">

            <div class="page-separator">
                <div class="page-separator__text">All Courses</div>
            </div>

            <div class="row">

                @forelse ($course as $item)
                    <div class="col-sm-6 col-md-4 col-xl-3">

                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                            data-partial-height="44" data-toggle="popover" data-trigger="click">
                            <a href="{{ route('course.edit', $item->id) }}" class="js-image" data-position="">
                                <img src="{{ URL::to('/images/'.$item->thumbnail) }}" alt="course">
                                <span class="overlay__content align-items-start justify-content-start">
                                    <span class="overlay__action card-body d-flex align-items-center">
                                        <i class="material-icons mr-4pt">edit</i>
                                        <span class="card-title text-white">Edit</span>
                                    </span>
                                </span>
                            </a>
                            <div class="mdk-reveal__content">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex">
                                            <a class="card-title mb-4pt"
                                                href="{{ route('course.edit', $item->id) }}">{{ Str::limit($item->title, 18, '...') }}</a>
                                        </div>
                                        <a href="instructor-edit-course.html"
                                            class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="rating flex">
                                            <span class="rating__item"><span
                                                    class="material-icons">@if ($item->rating->average('rating') >= 1){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">@if ($item->rating->average('rating') >= 2){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">@if ($item->rating->average('rating') >= 3){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">@if ($item->rating->average('rating') >= 4){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">@if ($item->rating->average('rating') >= 5){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                        </div>
                                        <small class="text-50">{{ $item->duration }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left mr-12pt">
                                    <img src="{{ URL::to('/images/'.$item->author_id->avatar) }}" width="40" height="40" alt="Angular"
                                        class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title mb-0">{{ $item->title }}</div>
                                    <p class="lh-1">
                                        <span class="text-50 small">with</span>
                                        <span
                                            class="text-50 small font-weight-bold">{{ $item->author_id->full_name }}</span>
                                    </p>
                                </div>
                            </div>

                            <p class="my-16pt text-70">{{ Str::limit($item->description, 140, '...') }}</p>

                            <div class="mb-16pt">
                                @foreach ($item->features as $data)
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>{{ $data->title }}</small>
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="d-flex align-items-center mb-4pt">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>{{ $item->duration }}</small></p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4pt">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                        {{-- <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p> --}}
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                    </div>
                                </div>
                                <div class="col text-right">
                                    {!! Form::open(['route' => ['course.destroy', $item->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('delete', ['class' => 'btn btn-outline-danger mb-24pt mb-sm-0']) !!}
                                        {!! Form::close() !!}
                                    <a href="{{ route('course.edit', $item->id) }}" class="btn btn-primary">Edit
                                        course</a>
                                </div>
                            </div>

                        </div>

                    </div>
                @empty

                @endforelse

            </div>

        </div>
    </div>
    <!-- // END Header Layout Content -->

@endsection
