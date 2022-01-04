@extends('layouts.index')

@section('content')

<div class="mdk-header-layout__content page-content ">

    <div class="pt-32pt">
        <div
            class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Teachers</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active">

                            Teachers

                        </li>

                    </ol>

                </div>
            </div>

            <div class="row" role="tablist">
                <div class="col-auto">
                    <a href="{{ route('teachers.create') }}" class="btn btn-outline-secondary">Add New Teacher</a>
                </div>
            </div>

        </div>
    </div>

    <div class="container page__container page-section">

        <div class="page-separator">
            <div class="page-separator__text">All Teachers</div>
        </div>

        <div class="row">
            @foreach ($teachers as $item)
            <div class="col-md-6 col-lg-4 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="card-header d-flex align-items-center">
                        <a href="{{ route('teachers.edit', $item->id) }}"
                           class="card-title flex mr-12pt">{{ $item->full_name }}</a>
                        <a href="{{ route('teachers.edit', $item->id) }}"
                           class="btn btn-light btn-sm"
                           data-toggle="tooltip"
                           data-title="Edit Teacher"
                           data-placement="bottom">Edit</a>
                    </div>
                    <div class="card-body flex text-center d-flex flex-column align-items-center justify-content-center">
                        <a href="{{ route('teachers.show', $item->slug) }}"
                           class="avatar avatar-xl overlay js-overlay overlay--primary rounded-circle p-relative o-hidden mb-16pt">
                            <img src="{{ URL::to('/images/'.$item->avatar) }}"
                                 alt="teacher"
                                 class="avatar-img">
                            <span class="overlay__content"><i class="overlay__action material-icons icon-40pt">face</i></span>
                        </a>
                        <div class="flex">
                            <div class="d-inline-flex align-items-center mb-8pt">
                                <div class="rating mr-8pt">

                                    <span class="rating__item"><span class="material-icons">@if( $item->rating >= 1){{"star"}}@else{{'star_border'}}@endif</span></span>

                                    <span class="rating__item"><span class="material-icons">@if( $item->rating >= 2){{"star"}}@else{{'star_border'}}@endif</span></span>

                                    <span class="rating__item"><span class="material-icons">@if( $item->rating >= 3){{"star"}}@else{{'star_border'}}@endif</span></span>

                                    <span class="rating__item"><span class="material-icons">@if( $item->rating >= 4){{"star"}}@else{{'star_border'}}@endif</span></span>

                                    <span class="rating__item"><span class="material-icons">@if( $item->rating >= 5){{"star"}}@else{{'star_border'}}@endif</span></span>

                                </div>
                                <small class="text-muted">{{ $item->rating }}/5</small>
                            </div>

                            <p class="text-70 measure-paragraph">{{ $item->description}}</p>

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

    </div>
</div>
<!-- // END Header Layout Content -->

@endsection