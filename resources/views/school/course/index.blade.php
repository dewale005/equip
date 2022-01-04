@extends('layouts.index')

@section('content')
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">

                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <div
                        class="d-flex flex-column align-items-center align-items-lg-start flex mb-16pt mb-lg-0 text-center text-lg-left">
                        <h1 class="h2 mb-4pt">Courses</h1>
                        <div class="lead measure-lead text-70">Follow through the courses from level one.</div>
                    </div>
                    <div class="ml-lg-16pt">
                        <a href="#" data-target="#library-drawer" data-toggle="sidebar" class="btn btn-light">
                            <i class="material-icons icon--left">tune</i> Filters
                            <span class="badge badge-notifications badge-accent icon--right">2</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt"
                            style="white-space: nowrap;">
                            <small class="flex text-muted text-headings text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out
                                of 10 courses</small>
                            <div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
                                <small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort
                                    by</small>

                                <a href="#" class="sort desc small text-headings text-uppercase">Newest</a>

                                <a href="#" class="sort small text-headings text-uppercase ml-2">Popularity</a>

                            </div>

                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Popular Courses</div>
                        </div>

                        <div class="row card-group-row">
                            @foreach ($course as $item)
                                <div class="col-md-6 col-lg-3 card-group-row__col">
                                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                                        data-toggle="popover" data-trigger="click">

                                        <a href="{{ route('course.show', $item->slug) }}" class="card-img-top js-image"
                                            data-position="" data-height="140">
                                            <img src="{{ URL::to('/images/'.$item->thumbnail) }}" alt="course">
                                            <span class="overlay__content">
                                                <span class="overlay__action d-flex flex-column text-center">
                                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                                    <span class="card-title text-white">Preview</span>
                                                </span>
                                            </span>
                                        </a>

                                        <div class="card-body flex">
                                            <div class="d-flex">
                                                <div class="flex">
                                                    <a class="card-title"
                                                        href="{{ route('course.show', $item->slug) }}">{{ Str::limit($item->title, 18, '...') }}</a>
                                                    <small
                                                        class="text-50 font-weight-bold mb-4pt">{{ $item->author_id->full_name }}</small>
                                                </div>
                                                <a href="{{ route('course.show', $item->slug) }}" data-toggle="tooltip"
                                                    data-title="Add Favorite" data-placement="top" data-boundary="window"
                                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
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
                                                <!-- <small class="text-50">6 hours</small> -->
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row justify-content-between">
                                                <div class="col-auto d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                    <p class="flex text-50 lh-1 mb-0">
                                                        <small>{{ $item->duration }}</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <span
                                                        class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                    {{-- <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popoverContainer d-none">
                                        <div class="media">
                                            <div class="media-left mr-12pt">
                                                <img src="{{ URL::to('/images/'.$item->author_id->avatar) }}" width="40" height="40"
                                                    alt="Angular" class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="card-title mb-0">{{ $item->title }}</div>
                                                <p class="lh-1 mb-0">
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
                                                    <p class="flex text-50 lh-1 mb-0">
                                                        <small>{{ $item->duration }}</small>
                                                    </p>
                                                </div>
                                                {{-- <div class="d-flex align-items-center mb-4pt">
                                                    <span
                                                        class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                </div> --}}
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                                </div>
                                            </div>
                                            <div class="col text-right">
                                                <a href="{{ route('course.show', $item->slug) }}"
                                                    class="btn btn-primary">Watch trailer</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>

                <div class="mb-32pt">

                    <ul class="pagination justify-content-start pagination-xsm m-0">
                        {{ $course->links() }}
                        {{-- <li class="page-item disabled">
                            <a class="page-link"
                               href="#"
                               aria-label="Previous">
                                <span aria-hidden="true"
                                      class="material-icons">chevron_left</span>
                                <span>Prev</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Page 1">
                                <span>1</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Page 2">
                                <span>2</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Next">
                                <span>Next</span>
                                <span aria-hidden="true"
                                      class="material-icons">chevron_right</span>
                            </a>
                        </li> --}}
                    </ul>

                </div>
            </div>
        </div>

        <div class="page-section bg-alt">
            <div class="container page__container">

                <div class="page-separator">
                    <div class="page-separator__text">{{ __('Feedback') }}</div>
                </div>

                <div class="row">

                    <div class="col-sm-6 col-md-4">

                        <div class="card card-feedback card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="text-70 small mb-0">
                                    {{ __("On developing a business plan and getting a loan to start a business.i  learnt to stay focused in other to get to the top. Also on who am I. I now know that I am a unique being that doesn't need to copy other to achieve my goals in life.") }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">EL</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">{{ __('Ejibe L. Abia State') }}</a>
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
                                <p class="text-70 small mb-0">
                                    {{ __('This course has opened my eyes and offered me the opportunity of utilising my potentials to the fullest. I was able to acquire knowledge on jobs that would thrive in future, maintaining good accounting system in an organization, and how to use the social media to boost business opportunities among many others.') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">SB</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html"
                                    class="card-title">{{ __('SAiDU ABDULLAHI Borno State') }}</a>
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
                                <p class="text-70 small mb-0">
                                    {{ __('Great lessons. What I learnt here cannot be found in higher institution syllabus. I have learnt a lot on discovering who I am through personality test By asking people about myself. I have learnt that qualification alone cannot showcase u but the skill u acquire can take u to higher level.') }}
                                </p>
                            </blockquote>
                        </div>
                        <div class="media ml-12pt">
                            <div class="media-left mr-12pt">
                                <a href="student-profile.html" class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">GU</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="student-profile.html" class="card-title">{{ __('Grace U, Lagos State') }}</a>
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
@endsection()
