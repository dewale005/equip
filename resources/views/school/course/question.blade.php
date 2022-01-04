@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="page-section bg-alt border-bottom-2">
            <div class="container page__container">

                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <div
                        class="flex d-flex flex-column align-items-center align-items-lg-start mb-16pt mb-lg-0 text-center text-lg-left">
                        <h1 class="h2 mb-8pt">Edit Quiz</h1>
                        <div>

                            {{-- <span class="chip chip-outline-secondary d-inline-flex align-items-center" data-toggle="tooltip"
                                data-title="Earnings" data-placement="bottom">
                                <i class="material-icons icon--left">trending_up</i> &dollar;12.3k
                            </span>
                            <span class="chip chip-outline-secondary d-inline-flex align-items-center" data-toggle="tooltip"
                                data-title="Sales" data-placement="bottom">
                                <i class="material-icons icon--left">receipt</i> 264
                            </span> --}}

                        </div>
                    </div>
                    {{-- <div class="ml-lg-16pt">
                        <a href="teacher-profile.html" class="btn btn-light">My Profile</a>
                    </div> --}}
                </div>

            </div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">
                <div class="row align-items-start">
                    <div class="col-md-8">

                        <div class="page-separator">
                            <div class="page-separator__text">Questions</div>
                        </div>
                        <ul class="list-group stack mb-40pt">
                            @foreach ($question as $item)
                            <li class="list-group-item d-flex">
                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                <div class="flex d-flex flex-column">
                                    <div class="card-title mb-4pt">Question {{ $loop->iteration }} of {{ $question->count() }}</div>
                                    <div class="card-subtitle text-70 paragraph-max mb-16pt">{{ $item->question }}</div>
                                    <div>
                                        <a href="" class="chip chip-light d-inline-flex align-items-center"><i
                                                class="material-icons icon-16pt icon--left">keyboard_arrow_down</i>
                                            Answer</a>
                                        <div class="chip chip-outline-secondary">{{ $item->answer }}</div>
                                    </div>
                                </div>
                                <span class="text-muted mx-12pt">{{ $item->total_score }} pt</span>

                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i
                                            class="material-icons">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0)" onclick="myFunction({{ $item->id }})" class="dropdown-item">Edit Question</a>
                                        <div class="dropdown-divider"></div>
                                        {!! Form::open(['route' => ['quiz.section.question.destroy', [$item->id, $course, $section]], 'method' => 'delete']) !!}
                                        {!! Form::submit('delete', ['class' => 'btn dropdown-item text-danger']) !!}

                                        {!! Form::close() !!}
                                        {{-- <a href="javascript:void(0)" class="dropdown-item text-danger">Delete Question</a> --}}
                                    </div>
                                </div>
                            </li>
                            <div class="card card-body" >
                                {{-- <form action="{{ route('quiz.section.question.update', [ $item->id, $course, $section]) }}" method="patch"> --}}
                                    {!! Form::open(['route' => ['quiz.section.question.update', [$item->id, $course, $section]], 'method' => 'patch', 'style' => 'display: none', 'id' => "form$item->id"]) !!}
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Question</label>
                                        <textarea name="description" class="form-control" rows="5"
                                            placeholder="Question ....">{{ $item->question }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label class="form-label">Answer</label>
                                        <input type="text" name="answer" value="{{$item->answer}}" class="form-control">
                                        @error('answer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label class="form-label">Question Score</label>
                                        <input type="text" name="score" value="{{$item->total_score}}" class="form-control">
                                        @error('score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="page-separator">
                                        <div class="page-separator__text">Question Options</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Options 1</label>
                                        <input type="text" name="option1" value="{{$item->option1}}" class="form-control">
                                        @error('option1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label class="form-label">Options 2</label>
                                        <input type="text" name="option2" value="{{$item->option2}}" class="form-control">
                                        @error('option2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Options 3</label>
                                        <input type="text" name="option3" value="{{$item->option3}}" class="form-control">
                                        @error('option3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-secondary">Edit Question</button>
                                    </div>
                                    {!! Form::close() !!}
                                {{-- </form> --}}
                            </div>
                            @endforeach
                        </ul>

                        <div class="page-separator">
                            <div class="page-separator__text">New Question</div>
                        </div>
                        <div class="card card-body">
                            <form action="{{ route('quiz.section.question.store', [$course, $section]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Question</label>
                                    <textarea name="description" class="form-control" rows="5"
                                        placeholder="Question ...."></textarea>
                                    {{-- <div style="height: 150px;" id="editor" class="mb-0" data-toggle="quill"
                                        data-quill-placeholder="Question">
                                        An angular 2 project written in typescript is* transpiled to javascript duri*ng the
                                        build process. Which of the following additional features are provided to the
                                        developer while programming on typescript over javascript?
                                    </div>
                                    <small class="form-text text-muted">Shortly describe the question.</small> --}}
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Answer</label>
                                    <input type="text" name="answer" class="form-control">
                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Question Score</label>
                                    <input type="text" name="score" class="form-control">
                                    @error('score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label class="form-label">Question Type</label>
                                    <select name="category" class="form-control custom-select">
                                        <option value="vuejs">Multiple Answer</option>
                                        <option value="vuejs">Single Answer</option>
                                        <option value="vuejs">Essay</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="select01">Answers</label>
                                    <select id="select01" data-toggle="select" data-multiple="true" multiple="multiple"
                                        class="form-control">
                                        <option selected="">My first option</option>
                                        <option selected="">Another option</option>
                                        <option>Third option is here</option>
                                    </select>
                                </div> --}}
                                <div class="page-separator">
                                    <div class="page-separator__text">Question Options</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Options 1</label>
                                    <input type="text" name="option1" class="form-control">
                                    @error('option1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Options 2</label>
                                    <input type="text" name="option2" class="form-control">
                                    @error('option2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Options 3</label>
                                    <input type="text" name="option3" class="form-control">
                                    @error('option3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-secondary">Add Question</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-header text-center">
                                <a href="#" class="btn btn-accent">Save changes</a>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex">
                                    <a class="flex" href="#"><strong>Save Draft</strong></a>
                                    <i class="material-icons text-muted">check</i>
                                </div>
                                <div class="list-group-item">
                                    <a href="#" class="text-danger"><strong>Delete Quiz</strong></a>
                                </div>
                            </div>
                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Courses</div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label class="form-label">Add to course</label>
                                    <select name="course" id="course" data-toggle="select" data-tags="false"
                                        data-multiple="true" data-minimum-results-for-search="0" class="form-control"
                                        data-placeholder="Select course ...">
                                        <option data-avatar-src="../../public/images/paths/angular_40x40@2x.png"
                                            selected="">Angular Fundamentals</option>
                                        <option data-avatar-src="../../public/images/paths/swift_40x40@2x.png">Build an iOS
                                            Application in Swift</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // END Header Layout Content -->
    <script>
        function myFunction(id) {
            var x = document.getElementById(`form${id}`);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

@endsection
