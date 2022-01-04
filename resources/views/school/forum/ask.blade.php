@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="navbar navbar-list navbar-light bg-white border-bottom-2 border-bottom navbar-expand-sm"
            style="white-space: nowrap;">
        </div>

        <div class="container page__container">
            <form action="{{ route('forum.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <div class="page-section">
                            <h4>Ask a question</h4>

                            <div class="card--connect pb-32pt pb-lg-64pt">
                                <div class="card o-hidden mb-0">
                                    <div class="card-body table--elevated">

                                        <div class="form-group m-0" role="group" aria-labelledby="label-title">
                                            <div class="form-row align-items-center">
                                                <label id="label-title" for="title"
                                                    class="col-md-3 col-form-label form-label">Question title</label>
                                                <div class="col-md-9">
                                                    <input id="title" name="title" type="text"
                                                        placeholder="Your question ..." value="" class="form-control">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group">
                                        <div class="list-group-item">
                                            <div role="group" aria-labelledby="label-question" class="m-0 form-group">
                                                <div class="form-row">
                                                    <label id="label-question" for="question"
                                                        class="col-md-3 col-form-label form-label">Question details</label>
                                                    <div class="col-md-9">
                                                        <textarea id="question" name="description"
                                                            placeholder="Describe your question in detail ..." rows="4"
                                                            class="form-control"></textarea>
                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <button type="submit" class="btn btn-accent">Post Question</button>
                                        </div>
            </form>
        </div>

    </div>
    </div>



    </div>
    </div>
    <div class="col-lg-3 page-nav">
        <div data-perfect-scrollbar data-perfect-scrollbar-wheel-propagation="true">
            <div class="page-section pt-lg-112pt">
                <div class="nav page-nav__menu">
                    <a href="javascript:void(0)" class="nav-link active">Before you post</a>
                </div>
                <div class="page-nav__content">
                    <p class="text-70">There may be other students who have asked the same question
                        before.</p>
                    <p class="text-70">You should do a quick search first to make sure your question
                        is unique.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>
    </div>

    </div>
    <!-- // END Header Layout Content -->

@endsection
