@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Start Quiz</h2>


                    <div class="page-section">
                        <div class="container page__container">

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' => ['scoring.store'], 'method' => 'post',]) !!}
                                    @foreach ($question as $data)
                                        <div class="form-group">
                                            <p>
                                                {{ Form::label($data->question, null, ['class' => 'form-label']) }}
                                            </p>
                                            <p>
                                                {{ Form::radio("answer$loop->iteration", $data->option1, false) }}
                                                {{ Form::label($data->option1, null, ['class' => 'form-label', 'style' => 'margin-left: 10px']) }}
                                            </p>
                                            <p>
                                                {{ Form::radio("answer$loop->iteration", $data->option2, false) }}
                                                {{ Form::label($data->option2, null, ['class' => 'form-label', 'style' => 'margin-left: 10px']) }}
                                            </p>
                                            <p>
                                                {{ Form::radio("answer$loop->iteration", $data->option3, false) }}
                                                {{ Form::label($data->option3, null, ['class' => 'form-label', 'style' => 'margin-left: 10px']) }}
                                            </p>
                                            {{-- {{ Form::radio('author', , null, array_merge(['class' => 'form-control custom-select'])) }} --}}
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <p style="margin-bottom: 50px"></p>
                                        </div>

                                    @endforeach
                                    {{ Form::hidden('section', $section ) }}
                                    {{ Form::hidden('course', $course ) }}
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary mb-24pt mb-sm-0']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

@endsection
