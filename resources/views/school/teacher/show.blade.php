@extends('layouts.index')

@section('content')
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">

                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <div
                        class="d-flex flex-column flex-md-row align-items-center flex mb-16pt mb-lg-0 text-center text-md-left">
                        <div class="mb-16pt mb-md-0 mr-md-24pt">
                            <img src="../../public/images/illustration/teacher/128/black.svg" width="104" alt="teacher">
                        </div>
                        <div class="flex">
                            <h1 class="h2 mb-0">{{ $teacher->full_name }}</h1>
                            {{-- <div class="rating mb-16pt d-inline-flex">
                                <span class="rating__item"><span
                                        class="material-icons">@if ($teacher->rating >= 1){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>

                                <span class="rating__item"><span
                                        class="material-icons">@if ($teacher->rating >= 2){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>

                                <span class="rating__item"><span
                                        class="material-icons">@if ($teacher->rating >= 3){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>

                                <span class="rating__item"><span
                                        class="material-icons">@if ($teacher->rating >= 4){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>

                                <span class="rating__item"><span
                                        class="material-icons">@if ($teacher->rating >= 5){{ 'star' }}@else{{ 'star_border' }}@endif</span></span>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="ml-lg-16pt">
                        <a href="" class="btn btn-light">Follow</a>
                    </div> --}}
                </div>

            </div>
        </div>

        <div class="page-section">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-8">

                        <div class="row card-group-row mb-8pt">
                            {{-- <p>{{ $teacher->courses}}</p> --}}
                            @foreach ($teacher->courses as $item)
                                <div class="col-sm-6 card-group-row__col">
                                    <div class="card card-sm card-group-row__card">
                                        <div class="card-body d-flex align-items-center">
                                            <a href="course.html"
                                                class="avatar avatar-4by3 overlay overlay--primary mr-12pt">
                                                <img src="{{$item->thumbnail}}"
                                                    alt="Angular Routing In-Depth" class="avatar-img rounded">
                                                <span class="overlay__content"></span>
                                            </a>
                                            <div class="flex">
                                                <a class="card-title mb-4pt" href="course.html">{{$item->title}}</a>
                                                <div class="d-flex align-items-center">
                                                    <div class="rating mr-8pt">

                                                        <span class="rating__item"><span
                                                                class="material-icons">star</span></span>

                                                        <span class="rating__item"><span
                                                                class="material-icons">star</span></span>

                                                        <span class="rating__item"><span
                                                                class="material-icons">star</span></span>

                                                        <span class="rating__item"><span
                                                                class="material-icons">star_border</span></span>

                                                        <span class="rating__item"><span
                                                                class="material-icons">star_border</span></span>

                                                    </div>
                                                    <small class="text-muted">3/5</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        
                    </div>
                    <div class="col-lg-4">

                        <h4>About me</h4>
                        <p class="text-70 mb-24pt">{{ $teacher->description }}</p>

                        <h4>Connect</h4>
                        <div class="d-flex align-items-center mb-24pt">
                            <a href="{{ $teacher->facebook }}" class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                            <a href="{{ $teacher->instagram }}" class="text-accent fab fa-instagram-square font-size-24pt"></a>
                        </div>

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

    </div>
    <!-- // END Header Layout Content -->
@endsection('content')
