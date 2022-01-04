@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="container page__container">
            <div class="page-section">

                <div class="row">
                    <div class="col-md-12">

                        <h1 class="h2">{{ $question->title }}</h1>
                        <p class="text-muted d-flex align-items-center mb-lg-32pt">
                            @role(['admin', 'superadmin'])
                            {!! Form::open(['route' => ['forum.destroy', $question->id], 'method' => 'delete']) !!}
                            {!! Form::submit('delete', ['class' => 'btn btn-outline-danger mb-24pt mb-sm-0']) !!}

                            {!! Form::close() !!}
                            @endrole
                            <a href="{{ route('forum.index') }}" class="mr-3">{{ __('Back to Community') }}</a>
                            <a href="#" class="mr-2 text-50">Mute</a>
                            <a href="#" class="mr-2 text-50">Report</a>

                        <div class="card card-body">
                            <div class="d-flex">
                                <a href="" class="avatar avatar-sm avatar-online mr-12pt">
                                    <!-- <img src="../../public/images/people/256/256_rsz_nicolas-horn-689011-unsplash.jpg" alt="people" class="avatar-img rounded-circle"> -->
                                    <span
                                        class="avatar-title rounded-circle">{{ Str::limit($question->users_data->first_name, 1, '') }}{{ Str::limit($question->users_data->last_name, 1, '') }}</span>
                                </a>
                                <div class="flex">
                                    <p class="d-flex align-items-center mb-2">
                                        <a href="" class="text-body mr-2"><strong>{{ $question->users_data->first_name }}
                                                {{ $question->users_data->last_name }}</strong></a>
                                        <small class="text-muted">{{ $question->created_at->diffForHumans() }}</small>
                                    </p>
                                    <p>{{ $question->description }}</p>
                                    {{-- <div class="d-flex align-items-center">
                                    <a href=""
                                       class="text-50 d-flex align-items-center text-decoration-0"><i class="material-icons mr-1"
                                           style="font-size: inherit;">favorite_border</i> 30</a>
                                    <a href=""
                                       class="text-50 d-flex align-items-center text-decoration-0 ml-3"><i class="material-icons mr-1"
                                           style="font-size: inherit;">thumb_up</i> 130</a>
                                </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <a href="" class="avatar avatar-sm mr-12pt">
                                <!-- <img src="../../public/images/people/50/guy-6.jpg" alt="people" class="avatar-img rounded-circle"> -->
                                <span
                                    class="avatar-title rounded-circle">{{ Str::limit($question->users_data->first_name, 1, '') }}{{ Str::limit($question->users_data->last_name, 1, '') }}</span>
                            </a>
                            <div class="flex">
                                <form action="{{ route('comment.question.store', $question->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment" class="form-label">Your reply</label>
                                        <textarea class="form-control" name="description" id="comment" rows="3"
                                            placeholder="Type here to reply to {{ $question->users_data->first_name }} ..."></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-outline-secondary">Post comment</button>
                                </form>
                            </div>
                        </div>
                        <div class="pt-3">
                            <h4>{{ count($comments) }} Comments</h4>
                            @foreach ($comments as $item)
                                <div class="d-flex mb-3">
                                    <a href="" class="avatar avatar-sm mr-12pt">
                                        <span
                                            class="avatar-title rounded-circle">{{ Str::limit($item->users_data->first_name, 1, '') }}{{ Str::limit($item->users_data->last_name, 1, '') }}</span>
                                    </a>
                                    <div class="flex">
                                        <a href="" class="text-body"><strong>{{ $item->users_data->first_name }}
                                                {{ $item->users_data->last_name }}</strong></a><br>
                                        <p class="mt-1 text-70">{{ $item->comment }}</p>
                                        <div class="d-flex align-items-center">
                                            <small
                                                class="text-50 mr-2">{{ $item->created_at->diffForHumans() }}</small>
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
    <!-- // END Header Layout Content -->

@endsection
