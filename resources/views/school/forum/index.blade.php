@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">
                <h1 class="h2 measure-lead-max mb-0">Discussions</h1>
                {{-- What are your expectations? do let us know. How did you hear about the program?. --}}
            </div>
        </div>

        <div class="page-section">
            <div class="container page__container">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="page-separator">
                            <div class="page-separator__text">Discussions</div>
                        </div>
                        <p class="mb-8pt">{{ __("Leave or comment or ask a question.
                            Note: Do not use any inappropriate, illicit, inciting or foul language or risk being disqualified.") }}</p>

                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center" style="white-space: nowrap;">
                                    <div class="col-lg-auto">
                                        <form class="search-form  d-lg-inline-flex mb-8pt mb-lg-0"
                                            action="discussions.html">
                                            <input type="text" class="form-control w-lg-auto"
                                                placeholder="Search discussions">
                                            <button class="btn" type="submit"><i
                                                    class="material-icons">search</i></button>
                                        </form>
                                    </div>
                                    <div class="col-lg d-flex flex-wrap align-items-center">
                                        <div class="ml-lg-auto dropdown">
                                            <a href="#" class="btn btn-link dropdown-toggle text-70"
                                                data-toggle="dropdown">All Topics</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item active">All Topics</a>
                                                <a href="" class="dropdown-item">My Topics</a>
                                            </div>
                                        </div>
                                        <div class="dropdown mr-8pt">
                                            <a href="#" class="btn btn-link dropdown-toggle text-70"
                                                data-toggle="dropdown">Newest</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item active">Newest</a>
                                                <a href="" class="dropdown-item">Unanswered</a>
                                            </div>
                                        </div>
                                        <a href="{{ route('forum.create') }}" class="btn btn-accent">Ask a question</a>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group list-group-flush">
                                @foreach ($questions as $item)
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-3 mb-8pt mb-md-0">
                                                <div class="media align-items-center">
                                                    <div class="media-left mr-12pt">
                                                        <a href="" class="avatar avatar-sm">
                                                            <!-- <img src="LB" alt="avatar" class="avatar-img rounded-circle"> -->
                                                            <span class="avatar-title rounded-circle">{{ Str::limit($item->users_data->first_name, 1, '') }}{{ Str::limit($item->users_data->last_name, 1, '') }}</span>
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <a href="" class="card-title">{{ $item->users_data->first_name }} {{ $item->users_data->last_name }}</a>
                                                        <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <p class="mb-8pt"><a href="{{ route('forum.show', $item->id) }}"
                                                        class="text-body"><strong>{{ __($item->title) }}</strong></a></p>

                                                {{-- <a href="discussion.html" class="chip chip-outline-secondary">Angular
                                                    fundamentals</a> --}}

                                            </div>
                                            <div
                                                class="col-auto d-flex flex-column align-items-center justify-content-center">
                                                {{-- <h5 class="m-0">0</h5>
                                                <p class="lh-1 mb-0"><small class="text-70">answers</small></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- // END Header Layout Content -->

@endsection
