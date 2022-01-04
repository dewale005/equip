@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">
                {{-- @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (session()->get("alert-$msg"))
                                <div class="alert alert-{{ $msg }}" role="alert">
                                    {{ session()->get("alert-$msg") }}
                                </div>
                            @endif
                        @endforeach --}}
                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <div
                        class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                        <div class="avatar avatar mb-16pt mb-md-0 mr-md-16pt">
                            <img src="{{ $course->thumbnail }}" class="avatar-img rounded" alt="lesson">
                        </div>
                        <div class="flex">
                            <h1 class="h2 m-0">{{ $course->title }}</h1>
                            <div class="rating mb-8pt d-inline-flex">
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-lg-16pt">
                        <a href="." class="btn btn-light">Library</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-8">

                        <div class="js-player card bg-primary text-center embed-responsive embed-responsive-16by9 mb-24pt">
                            <div class="player embed-responsive-item">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <p class="lead text-white-70 measure-lead">It’s not every day that one of the most
                                        important front-end libraries in web development gets a complete overhaul. Keep your
                                        skills relevant and up-to-date with this comprehensive introduction to Google’s
                                        popular community project.</p>

                                    {{-- <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center">
                                        <a href="student-take-lesson.html" class="btn btn-white">Resume course</a>
                                    </div> --}}
                                </div>
                                <div class="player__embed d-none">
                                    <iframe class="embed-responsive-item" src="{{ $course->trailler_url }}"
                                        allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="mb-24pt">
                            <span class="chip chip-outline-secondary d-inline-flex align-items-center">
                                <i class="material-icons icon--left">schedule</i>
                                2h 46m
                            </span>
                            <span class="chip chip-outline-secondary d-inline-flex align-items-center">
                                <i class="material-icons icon--left">assessment</i>
                                Beginner
                            </span>
                        </div> --}}

                        <div class="border-left-2 page-section pl-32pt mb-32pt">

                            @foreach ($course->section as $item)
                                <div class="d-flex align-items-center page-num-container">
                                    <div class="page-num">1</div>
                                    <h4>{{ $item->title }}</h4>
                                </div>

                                <p class="text-70 measure-paragraph-max mb-24pt">{{ $item->description }}</p>

                                <ul class="accordion accordion--boxed js-accordion measure-paragraph-max mb-32pt mb-lg-64pt"
                                    id="toc-1">
                                    <li class="accordion__item open">
                                        <a class="accordion__toggle" data-toggle="collapse" data-parent="#toc-1"
                                            href="#toc-content-1">
                                            <span class="flex">Lessons</span>
                                            <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                        </a>
                                        <div class="accordion__menu">
                                            <ul class="list-unstyled collapse show" id="toc-content-1">
                                                @foreach ($item->lesson as $data)
                                                    <li class="accordion__menu-link">
                                                        <span
                                                            class="material-icons icon-16pt icon--left text-body">check_circle</span>
                                                        <a class="flex"
                                                            href="{{ route('lesson.start', $data->id)}}">{{ $data->title }}</a>
                                                        <span class="text-muted">{{ $data->duration }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach

                        </div>

                        <div class="row mb-32pt">
                            <div class="col-md-7">
                                <div class="page-separator">
                                    <div class="page-separator__text">About this course</div>
                                </div>
                                <p class="text-70">{{ $course->description }}</p>
                            </div>
                            <div class="col-md-5">
                                <div class="page-separator">
                                    <div class="page-separator__text ">What you’ll learn</div>
                                </div>
                                <ul class="list-unstyled">
                                    @foreach ($course->features as $item)
                                        <li class="d-flex align-items-center">
                                            <span class="material-icons text-50 mr-8pt">check</span>
                                            <span class="text-70">{{ $item->title }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="page-separator">
                            <div class="page-separator__text">Student Feedback</div>
                        </div>
                        <div class="row mb-32pt">
                            <div class="col-md-3 mb-32pt mb-md-0">
                                <div class="display-1">
                                    {{ number_format($course->rating->average('rating'), 1, '.', '') }}</div>
                                <div class="rating rating-24">
                                    <span class="rating__item"><span
                                            class="material-icons">@if (number_format($course->rating->average('rating'), 1, '.', '') >= 1){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                    <span class="rating__item"><span
                                            class="material-icons">@if (number_format($course->rating->average('rating'), 1, '.', '') >= 2){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                    <span class="rating__item"><span
                                            class="material-icons">@if (number_format($course->rating->average('rating'), 1, '.', '') >= 3){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                    <span class="rating__item"><span
                                            class="material-icons">@if (number_format($course->rating->average('rating'), 1, '.', '') >= 4){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                    <span class="rating__item"><span
                                            class="material-icons">@if (number_format($course->rating->average('rating'), 1, '.', '') >= 5){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                </div>
                                <p class="text-muted mb-0">{{ count($course->rating) }} ratings</p>
                            </div>
                            <div class="col-md-9">

                                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="75% rated 5/5"
                                    data-placement="top">
                                    <div class="col-md col-sm-6">
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="75"
                                                style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="16% rated 4/5"
                                    data-placement="top">
                                    <div class="col-md col-sm-6">
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="16"
                                                style="width: 16%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="12% rated 3/5"
                                    data-placement="top">
                                    <div class="col-md col-sm-6">
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="12"
                                                style="width: 12%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="9% rated 2/5"
                                    data-placement="top">
                                    <div class="col-md col-sm-6">
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="9"
                                                style="width: 9%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="0% rated 0/5"
                                    data-placement="top">
                                    <div class="col-md col-sm-6">
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                        @forelse ($course->rating as $item)
                            <div class="pb-16pt mb-16pt border-bottom row">
                                <div class="col-md-3 mb-16pt mb-md-0">
                                    <div class="d-flex">
                                        <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                                            <!-- <img src="LB" alt="avatar" class="avatar-img rounded-circle"> -->
                                            <span
                                                class="avatar-title rounded-circle">{{ Str::limit($item->ratings->first_name, 1, '') }}{{ Str::limit($item->ratings->last_name, 1, '') }}</span>
                                        </a>
                                        <div class="flex">
                                            <p class="small text-muted m-0">
                                                {{ $item->ratings->created_at->diffForHumans() }}</p>
                                            <a href="student-profile.html"
                                                class="card-title">{{ $item->ratings->first_name }}
                                                {{ Str::limit($item->ratings->last_name, 6, '...') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="rating mb-8pt">
                                        <span class="rating__item"><span
                                                class="material-icons">@if ($item->rating >= 1){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                        <span class="rating__item"><span
                                                class="material-icons">@if ($item->rating >= 2){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                        <span class="rating__item"><span
                                                class="material-icons">@if ($item->rating >= 3){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                        <span class="rating__item"><span
                                                class="material-icons">@if ($item->rating >= 4){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                        <span class="rating__item"><span
                                                class="material-icons">@if ($item->rating >= 5){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                                    </div>
                                    <p class="text-70 mb-0">{{ $item->comments }}</p>
                                </div>
                            </div>
                        @empty

                        @endforelse

                    </div>
                    <div class="col-lg-4">

                        <div class="page-separator">
                            <div class="page-separator__text">Author</div>
                        </div>

                        <div class="media align-items-center mb-16pt">
                            <span class="media-left mr-16pt">
                                <img src="{{ $course->author_id->avatar }}" width="40" alt="avatar"
                                    class="rounded-circle">
                            </span>
                            <div class="media-body">
                                <a class="card-title m-0" href="teacher-profile.html">{{ $course->author_id->full_name }}</a>
                                <p class="text-50 lh-1 mb-0">Instructor</p>
                            </div>
                        </div>
                        <p class="text-70">{{ $course->author_id->description }}</p>

                        {{-- <a href="teacher-profile.html" class="btn btn-white mb-24pt">Follow</a> --}}

                        {{-- <div class="page-separator">
                            <div class="page-separator__text">Recommended</div>
                        </div>

                        <div class="mb-8pt d-flex align-items-center">
                            <a href="student-course.html" class="avatar avatar-4by3 overlay overlay--primary mr-12pt">
                                <img src="../../public/images/paths/angular_routing_200x168.png"
                                    alt="Angular Routing In-Depth" class="avatar-img rounded">
                                <span class="overlay__content"></span>
                            </a>
                            <div class="flex">
                                <a class="card-title mb-4pt" href="student-course.html">Angular Routing In-Depth</a>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span
                                                class="material-icons">star_border</span></span>

                                        <span class="rating__item"><span
                                                class="material-icons">star_border</span></span>

                                    </div>
                                    <small class="text-muted">3/5</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-16pt d-flex align-items-center">
                            <a href="student-course.html" class="avatar avatar-4by3 overlay overlay--primary mr-12pt">
                                <img src="../../public/images/paths/angular_testing_200x168.png" alt="Angular Unit Testing"
                                    class="avatar-img rounded">
                                <span class="overlay__content"></span>
                            </a>
                            <div class="flex">
                                <a class="card-title mb-4pt" href="student-course.html">Angular Unit Testing</a>
                                <div class="d-flex align-items-center">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span class="material-icons">star</span></span>

                                        <span class="rating__item"><span
                                                class="material-icons">star_border</span></span>

                                    </div>
                                    <small class="text-muted">4/5</small>
                                </div>
                            </div>
                        </div>

                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0">
                                <a href="student-course.html" class="card-title mb-4pt">Angular Best Practices</a>
                                <p class="lh-1 mb-0">
                                    <small class="text-muted mr-8pt">6h 40m</small>
                                    <small class="text-muted mr-8pt">13,876 Views</small>
                                    <small class="text-muted">13 May 2018</small>
                                </p>
                            </div>
                            <div class="list-group-item px-0">
                                <a href="student-course.html" class="card-title mb-4pt">Unit Testing in Angular</a>
                                <p class="lh-1 mb-0">
                                    <small class="text-muted mr-8pt">6h 40m</small>
                                    <small class="text-muted mr-8pt">13,876 Views</small>
                                    <small class="text-muted">13 May 2018</small>
                                </p>
                            </div>
                            <div class="list-group-item px-0">
                                <a href="student-course.html" class="card-title mb-4pt">Migrating Applications from
                                    AngularJS to Angular</a>
                                <p class="lh-1 mb-0">
                                    <small class="text-muted mr-8pt">6h 40m</small>
                                    <small class="text-muted mr-8pt">13,876 Views</small>
                                    <small class="text-muted">13 May 2018</small>
                                </p>
                            </div>
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>

        <div class="page-section bg-alt">
            <div class="container page__container">

                <div class="page-separator">
                    <div class="page-separator__text">Feedback</div>
                </div>

                <div class="row">

                    <div class="col-sm-6 col-md-4">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys
                                    all essentials of a becoming a good Angular developer. Very glad to have taken this
                                    course. Thank you Eddie Bryan.</p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">UK</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
                                <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 col-md-4">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys
                                    all essentials of a becoming a good Angular developer. Very glad to have taken this
                                    course. Thank you Eddie Bryan.</p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">UK</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
                                <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 col-md-4">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys
                                    all essentials of a becoming a good Angular developer. Very glad to have taken this
                                    course. Thank you Eddie Bryan.</p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">UK</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">Umberto Kass</a>
                                <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- // END Header Layout Content -->

@endsection