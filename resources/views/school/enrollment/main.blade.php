@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">

                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <div
                        class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                        <div class="avatar mb-16pt mb-md-0 mr-md-16pt">
                            <img src="../../public/images/paths/typescript_40x40@2x.png" class="avatar-img rounded"
                                alt="lesson">
                        </div>
                        <div class="flex">
                            <h1 class="h2 m-0">{{ $lesson->title }}</h1>
                            <div class="rating mb-8pt d-inline-flex">
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="ml-lg-16pt">
                        <a href="courses.html" class="btn btn-light">Library</a>
                    </div> --}}
                </div>

            </div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-8">

                        <div class="js-player card bg-primary embed-responsive embed-responsive-16by9 mb-24pt">
                            <div class="player embed-responsive-item">
                                <div class="player__content">
                                    <div class="player__image"
                                        style="--player-image: url(../../public/images/illustration/player.svg)"></div>
                                    <a href="" class="player__play bg-primary">
                                        <span class="material-icons">play_arrow</span>
                                    </a>
                                </div>
                                <div>
                                    <iframe
                                        src="{{$lesson->video_url}}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;h=cf300c057c"
                                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                        title="Welcome Address &amp;amp; Personality Test"></iframe>
                                    {{-- <iframe class="embed-responsive-item"
                                        src="{{$lesson->video_url}}?title=0&amp;byline=0&amp;portrait=0"
                                        allowfullscreen=""></iframe> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- {{ $lesson->audio_url }} --}}
                            <iframe allowtransparency="true" height="150" width="100%" style="border: none; min-width: min(100%, 430px);" scrolling="no" data-name="pb-iframe-player" src="{{ $lesson->audio_url }}"></iframe>

                        <div class="mb-24pt">
                            <span class="chip chip-outline-secondary d-inline-flex align-items-center">
                                <i class="material-icons icon--left">schedule</i>
                                {{ $lesson->duration }}
                            </span>
                            <span class="chip chip-outline-secondary d-inline-flex align-items-center">
                                <i class="material-icons icon--left">assessment</i>
                                {{ $lesson->level }}
                            </span>
                        </div>

                        <p class="lead measure-lead text-70 mb-24pt">{{ $lesson->description }}</p>

                        

                    </div>
                    <div class="col-lg-4">

                        <div class="page-separator">
                            <div class="page-separator__text">Course</div>
                        </div>

                        {{-- <a href="student-course.html" class="d-flex flex-nowrap mb-24pt">
                            <span class="mr-16pt">
                                <img src="{{ $lesson->course_data->thumbnail }}" width="40" alt="Angular"
                                    class="rounded">
                            </span>
                            <span class="flex d-flex flex-column align-items-start">
                                <span class="card-title">{{ $lesson->course_data->title}}</span>
                                <span class="card-subtitle text-50">16 Lessons</span>
                            </span>
                        </a> --}}

                        {{-- <div class="page-separator">
                            <div class="page-separator__text">Author</div>
                        </div>

                        <div class="media align-items-center mb-16pt">
                            <span class="media-left mr-16pt">
                                <img src="{{ $lesson->author_data->avatar}}" width="40" alt="avatar"
                                    class="rounded-circle">
                            </span>
                            <div class="media-body">
                                <a class="card-title m-0" href="teacher-profile.html">{{ $lesson->author_data->full_name}}</a>
                                <p class="text-50 lh-1 mb-0">Instructor</p>
                            </div>
                        </div>
                        <p class="text-70">{{ $lesson->author_data->description}}</p>

                        <a href="teacher-profile.html" class="btn btn-white mb-24pt">Follow</a> --}}

                    </div>
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
                                <a href="."
                                    class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">EL</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="."
                                    class="card-title">{{ __("Ejibe L. Abia State")}}</a>
                                {{-- <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div> --}}
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
                                <a href="."
                                    class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">SB</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="."
                                    class="card-title">{{__("SAiDU ABDULLAHI Borno State")}}</a>
                                {{-- <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div> --}}
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
                                <a href="."
                                    class="avatar avatar-sm">
                                    <!-- <img src="public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                    <span class="avatar-title rounded-circle">GU</span>
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <a href="." class="card-title">{{__("Grace U, Lagos State")}}</a>
                                {{-- <div class="rating mt-4pt">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div> --}}
                            </div>
                        </div>
    
                    </div>
    
                </div>
            </div>
        </div>

    </div>
    <!-- // END Header Layout Content -->

@endsection
