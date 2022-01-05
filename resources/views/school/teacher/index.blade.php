@extends('layouts.index')

@section('content')
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

    <div class="page-section bg-alt border-bottom-2">
        <div class="container page__container">

            <div class="d-flex flex-column flex-lg-row align-items-center">
                <div class="d-flex flex-column align-items-center align-items-lg-start flex mb-16pt mb-lg-0 text-center text-lg-left">
                    <h1 class="h2 m-0">Teachers</h1>
                    <div class="lead measure-lead text-70">Learn from the best industry experts in Business and Technology.</div>
                </div>
                {{-- <div class="ml-lg-16pt">
                    <a href="#"
                       data-target="#library-drawer"
                       data-toggle="sidebar"
                       class="btn btn-light">
                        <i class="material-icons icon--left">tune</i> Filters
                        <span class="badge badge-notifications badge-accent icon--right">2</span>
                    </a>
                </div> --}}
            </div>

        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">

            {{-- <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt"
                 style="white-space: nowrap;">
                <small class="flex text-muted text-headings text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 teachers</small>
                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
                    <small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort by</small>

                    <a href="#"
                       class="sort desc small text-headings text-uppercase">Newest</a>

                    <a href="#"
                       class="sort small text-headings text-uppercase ml-2">Popularity</a>

                </div>

                <a href="#"
                   data-target="#library-drawer"
                   data-toggle="sidebar"
                   class="btn btn-sm btn-white ml-sm-16pt">
                    <i class="material-icons icon--left">tune</i> Filters
                </a>

            </div> --}}

            <div class="page-separator">
                <div class="page-separator__text">Top Teachers</div>
            </div>

            <div class="row card-group-row">
                @foreach ($teachers as $item)
                <div class="col-md-6 col-lg-4 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-header d-flex align-items-center">
                            <a href="{{ route('teachers.show', $item->slug) }}"
                               class="card-title flex mr-12pt">{{ $item->full_name }}</a>
                            {{-- <a href="{{ route('teachers.show', $item->slug) }}"
                               class="btn btn-light btn-sm"
                               data-toggle="tooltip"
                               data-title="Unfollow"
                               data-placement="bottom">Following</a> --}}
                        </div>
                        <div class="card-body flex text-center d-flex flex-column align-items-center justify-content-center">
                            {{-- <a href="{{ route('teachers.show', $item->slug) }}"
                               class="avatar avatar-xl overlay js-overlay overlay--primary rounded-circle p-relative o-hidden mb-16pt">
                                <img src="{{ URL::to('/images/'.$item->avatar) }}"
                                     alt="teacher"
                                     class="avatar-img">
                                <span class="overlay__content"><i class="overlay__action material-icons icon-40pt">face</i></span>
                            </a> --}}
                            <div class="flex">
                                {{-- <div class="d-inline-flex align-items-center mb-8pt">
                                    <div class="rating mr-8pt">

                                        <span class="rating__item"><span class="material-icons">@if( $item->rating >= 1){{"star"}}@else{{'star_border'}}@endif</span></span>

                                        <span class="rating__item"><span class="material-icons">@if( $item->rating >= 2){{"star"}}@else{{'star_border'}}@endif</span></span>

                                        <span class="rating__item"><span class="material-icons">@if( $item->rating >= 3){{"star"}}@else{{'star_border'}}@endif</span></span>

                                        <span class="rating__item"><span class="material-icons">@if( $item->rating >= 4){{"star"}}@else{{'star_border'}}@endif</span></span>

                                        <span class="rating__item"><span class="material-icons">@if( $item->rating >= 5){{"star"}}@else{{'star_border'}}@endif</span></span>

                                    </div>
                                    <small class="text-muted">{{ $item->rating }}/5</small>
                                </div> --}}

                                <p class="text-70 measure-paragraph"  style="padding: 10px; text-align: justify;">{{ $item->description}}</p>

                                <a href="javascript:void()"
                                   data-toggle="tooltip"
                                   data-title="Browse Topic"
                                   data-placement="bottom"
                                   class="chip chip-outline-secondary">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="mb-32pt">
                

                <ul class="pagination justify-content-start pagination-xsm m-0">
                    {{ $teachers->render("pagination::bootstrap-4") }}
                </ul>

            </div>

        </div>
    </div>

    <div class="page-section bg-alt">
        <div class="container page__container">

            <div class="page-separator">
                <div class="page-separator__text">{{__("Feedback")}}</div>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">{{__("On developing a business plan and getting a loan to start a business.i  learnt to stay focused in other to get to the top. Also on who am I. I now know that I am a unique being that doesn't need to copy other to achieve my goals in life.")}}</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">EL</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">{{ __("Ejibe L. Abia State")}}</a>
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
                            <p class="text-70 small mb-0">{{__("This course has opened my eyes and offered me the opportunity of utilising my potentials to the fullest. I was able to acquire knowledge on jobs that would thrive in future, maintaining good accounting system in an organization, and how to use the social media to boost business opportunities among many others.")}}</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">SB</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">{{__("SAiDU ABDULLAHI Borno State")}}</a>
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
                            <p class="text-70 small mb-0">{{__("Great lessons. What I learnt here cannot be found in higher institution syllabus. I have learnt a lot on discovering who I am through personality test By asking people about myself. I have learnt that qualification alone cannot showcase u but the skill u acquire can take u to higher level.")}}</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">GU</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">{{__("Grace U, Lagos State")}}</a>
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
@endsection('content')