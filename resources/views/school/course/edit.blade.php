@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                <div class="flex d-flex flex-column flex-sm-row align-items-center">

                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                        <h2 class="mb-0">Edit Course</h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item active">

                                Edit Course

                            </li>

                        </ol>

                    </div>
                </div>

            </div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="row">
                    <div class="col-md-8">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (session()->get(" alert-$msg"))
                                <div class="alert alert-{{ $msg }}" role="alert">
                                    {{ session()->get("alert-$msg") }}
                                </div>
                            @endif
                        @endforeach

                        <div class="page-separator">
                            <div class="page-separator__text">What Would be learnt </div>
                        </div>
                        <div class="accordion js-accordion accordion--boxed mb-24pt" id="parent">
                            <div class="accordion__item open">
                                {{-- <a href="#" class="accordion__toggle collapsed" data-toggle="collapse"
                                    data-target="#course-toc-1" data-parent="#parent">
                                    <span class="flex">Course Overview</span>
                                    <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                </a> --}}
                                @foreach ($course->features as $item)
                                    <div class="accordion__menu show">
                                        <div class="accordion__menu-link">
                                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                            <a class="flex" href="student-lesson.html">{{ $item->title }}</a>
                                            <span class="text-muted">
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-outline-primary mb-24pt mb-sm-0"
                                                            onclick="myFunction({{ $item->id }})">Edit</button>
                                                    </div>
                                                    <div class="col">
                                                        {!! Form::open(['route' => ['features.destroy', $item->id], 'method' => 'delete']) !!}
                                                        {!! Form::submit('delete', ['class' => 'btn btn-outline-danger mb-24pt mb-sm-0']) !!}

                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        {!! Form::open(['route' => ['features.update', $item->id], 'method' => 'patch', 'style' => 'display: none', 'id' => "form$item->id"]) !!}
                                        <div class="row g-3" style="margin:10px 16px">
                                            <div class="col-md-10">
                                                {{ Form::text('title', $item->title, array_merge(['class' => 'form-control', 'placeholder' => "What would be learn't ..."])) }}
                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::submit('update', ['class' => 'btn btn-outline-warning mb-24pt mb-sm-0']) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <hr style="margin-top: 0;margin-bottom: 0;" />
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-32pt">
                            {!! Form::open(['route' => ['feature.add', $course->id]]) !!}
                            <div class="form-group">
                                {{ Form::text('f_title', null, array_merge(['class' => 'form-control', 'placeholder' => "What would be learn't ..."])) }}
                                @error('f_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {!! Form::submit('Add', ['class' => 'btn btn-outline-secondary mb-24pt mb-sm-0']) !!}
                            {!! Form::close() !!}
                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Sections</div>
                        </div>
                        @foreach ($course->section as $item)
                            <div class="accordion js-accordion accordion--boxed mb-24pt" id="parent">
                                <div class="accordion__item open">
                                    <a href="#" class="accordion__toggle collapsed" data-toggle="collapse"
                                        data-target="#course-toc-1" data-parent="#parent">
                                        <span class="flex">{{ $item->title }}</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <div class="accordion__toggle collapsed">
                                        <span class="flex"
                                            style="font-weight: 400">{{ $item->description }}</span>
                                    </div>
                                    @foreach ($item->lesson as $data)
                                        <div class="accordion__menu collapse show" id="course-toc-1">
                                            <div class="accordion__menu-link">
                                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                                <a class="flex"
                                                    href="{{ route('lesson.start', $data->id) }}">{{ $data->title }}</a>
                                                <span class="text-muted">
                                                    <button href="." onclick="myFunction2({{ $data->id }})">
                                                        <i class="material-icons text-70 icon-16pt icon--left"
                                                            style="color: #009844 !important">edit</i>
                                                    </button>
                                                    {!! Form::open(['route' => ['course-lesson.destroy', $data->id], 'method' => 'delete']) !!}
                                                    {!! Form::submit('delete', ['class' => 'btn btn-outline-danger mb-24pt mb-sm-0']) !!}

                                                    {!! Form::close() !!}
                                                </span>
                                                <span class="text-muted">{{ $data->duration }}</span>
                                            </div>
                                            {!! Form::open(['route' => ['course-lesson.update', $data->id], 'method' => 'patch', 'style' => 'display: none', 'id' => "form2$data->id"]) !!}
                                            <div class="row g-3" style="margin:10px 16px">
                                                <div class="col-md-10">
                                                    {{ Form::text('title', $data->title, array_merge(['class' => 'form-control', 'placeholder' => '...'])) }}
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group">
                                                        {{ Form::label('Description', null, ['class' => 'form-label']) }}
                                                        {{ Form::textarea('description', $data->description, array_merge(['class' => 'form-control', 'placeholder' => 'What is the video of this lesson  ...'])) }}
                                                        @error('url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    {{ Form::text('video_url', $data->video_url, array_merge(['class' => 'form-control', 'placeholder' => '...'])) }}
                                                    @error('video_url')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    {{ Form::text('audio-url', $data->audio_url, array_merge(['class' => 'form-control', 'placeholder' => '...'])) }}
                                                    @error('audio-url')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    {{ Form::text('duration', $data->duration, array_merge(['class' => 'form-control', 'placeholder' => '...'])) }}
                                                    @error('duration')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group">
                                                        {{ Form::label('Course Author', null, ['class' => 'form-label']) }}
                                                        {{ Form::select('author', $teachers->pluck('full_name', 'id'), $data->author, array_merge(['class' => 'form-control custom-select', 'placeholder' => 'Course Author ...'])) }}
                                                        <small class="form-text text-muted">Select Course Author.</small>
                                                        @error('author')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    {!! Form::submit('update', ['class' => 'btn btn-outline-warning mb-24pt mb-sm-0']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    @endforeach
                                    <div class="container" style="margin-bottom: 20px;">
                                        <button class="btn btn-outline-secondary mb-24pt mb-sm-0" id="addlessonbutton"
                                            onclick="editSection({{ $item->id }})">Edit Section</button>
                                        <button class="btn btn-outline-secondary mb-24pt mb-sm-0" id="addlessonbutton"
                                            onclick="addlesson({{ $item->id }})">Add Lesson</button>
                                        <a href="{{ route('quiz.section.question.index', [$course->id, $item->id]) }}"
                                            class="btn btn-outline-secondary mb-24pt mb-sm-0">Add Question</a>
                                    </div>
                                    <div class="container mb-32pt" id="addlesson{{ $item->id }}"
                                        style="margin-bottom: 50px; display: none;">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Add Lesson</div>
                                        </div>
                                        {!! Form::open(['route' => ['lesson.add', $item->id]]) !!}
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    {{ Form::label('Lesson title', null, ['class' => 'form-label']) }}
                                                    {{ Form::text('title', null, array_merge(['class' => 'form-control', 'placeholder' => 'What is the title of this lesson  ...'])) }}
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Description', null, ['class' => 'form-label']) }}
                                            {{ Form::textarea('description', null, array_merge(['class' => 'form-control', 'placeholder' => 'What is the video of this lesson  ...'])) }}
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Video url', null, ['class' => 'form-label']) }}
                                            {{ Form::text('url', null, array_merge(['class' => 'form-control', 'placeholder' => 'What is the video of this lesson  ...'])) }}
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Audio url', null, ['class' => 'form-label']) }}
                                            {{ Form::text('audio-url', null, array_merge(['class' => 'form-control', 'placeholder' => 'What is the audio of this lesson  ...'])) }}
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Duration', null, ['class' => 'form-label']) }}
                                            {{ Form::text('duration', null, array_merge(['class' => 'form-control', 'placeholder' => 'What is the duration of this lesson  ...'])) }}
                                            @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Course Author', null, ['class' => 'form-label']) }}
                                            {{ Form::select('author', $teachers->pluck('full_name', 'id'), null, array_merge(['class' => 'form-control custom-select', 'placeholder' => 'Course Author ...'])) }}
                                            <small class="form-text text-muted">Select Course Author.</small>
                                            @error('author')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-secondary mb-24pt mb-sm-0']) !!}
                                        {!! Form::close() !!}
                                        <button class="btn btn-outline-danger mb-24pt mb-sm-0" id="addlessonbutton"
                                            onclick="addlesson({{ $item->id }})">Cancel</button>
                                    </div>
                                    <div class="mb-32pt" id="editsection{{ $item->id }}"
                                        style=" display: none; padding : 20px">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Edit Section</div>
                                        </div>
                                        {!! Form::open(['route' => ['section.update', $item->id], 'method' => 'patch']) !!}
                                        <div class="form-group">
                                            {{ Form::label('Section title', null, ['class' => 'form-label']) }}
                                            {{ Form::text('title', $item->title, array_merge(['class' => 'form-control', 'placeholder' => 'What is the title of this section  ...'])) }}
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Section description', null, ['class' => 'form-label']) }}
                                            {{ Form::textarea('description', $item->description, array_merge(['class' => 'form-control', 'placeholder' => 'Brief description about this section  ...'])) }}
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-secondary mb-24pt mb-sm-0']) !!}
                                        {!! Form::close() !!}
                                        <button class="btn btn-outline-danger mb-24pt mb-sm-0"
                                            onclick="editSection()">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button class="btn btn-outline-secondary mb-24pt mb-sm-0" id="addsectionbutton"
                            onclick="addSection()">Add Section</button>


                        <div class="mb-32pt" id="addsection" style="display: none">
                            <div class="page-separator">
                                <div class="page-separator__text">Add Section</div>
                            </div>
                            {!! Form::open(['route' => ['section.add', $course->id]]) !!}
                            <div class="form-group">
                                {{ Form::label('Section title', null, ['class' => 'form-label']) }}
                                {{ Form::text('title', null, array_merge(['class' => 'form-control', 'placeholder' => 'What is the title of this section  ...'])) }}
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::label('Section description', null, ['class' => 'form-label']) }}
                                {{ Form::textarea('description', null, array_merge(['class' => 'form-control', 'placeholder' => 'Brief description about this section  ...'])) }}
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {!! Form::submit('Submit', ['class' => 'btn btn-outline-secondary mb-24pt mb-sm-0']) !!}
                            {!! Form::close() !!}
                            <button class="btn btn-outline-danger mb-24pt mb-sm-0" onclick="addSection()">Cancel</button>
                        </div>

                        {{-- <a href="#" class="btn btn-outline-secondary mb-24pt mb-sm-0">Add Section</a> --}}

                        <div class="page-separator" style="margin-top: 32px">
                            <div class="page-separator__text">Basic information</div>
                        </div>
                        {!! Form::open(['route' => ['course.update', $course->id], 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'courseForm']) !!}
                        <label class="form-label">Course title</label>
                        <div class="form-group mb-24pt">
                            <input type="text" name="title" class="form-control form-control-lg" placeholder="Course title"
                                value="{{ $course->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">Short title to this course</a></small>
                        </div>

                        <label class="form-label">Course Durations</label>
                        <div class="form-group mb-24pt">
                            <input type="text" name="duration" class="form-control form-control-lg"
                                placeholder="Course duration(2 hours 30min) ...." value="{{ $course->duration }}">
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">Please enter <a href="">course duration</a></small>
                        </div>

                        <div class="form-group mb-32pt">
                            <label class="form-label">Description</label>
                            {{-- <textarea class="form-control" name="description" rows="5" placeholder="Course description">{{ $course->description }}</textarea> --}}
                            {{-- {{ Form::label('Course Description', null, ['class' => 'form-label']) }} --}}
                            {{-- {{ Form::textarea('description', $course->description, array_merge(['class' => 'form-control', 'placeholder' => 'Course description ...', 'id' => 'body'])) }} --}}
                            <div style="height: 150px;" name="description" id="editor" class="mb-0"
                                data-toggle="quill" data-name="description" data-quill-placeholder="Course description">
                                {{ $course->description }}</div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">Shortly describe this course.</small>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('Start date', null, ['class' => 'form-label']) }}
                                    {{ Form::date('start_date', $course->start_date, array_merge(['class' => 'form-control', 'placeholder' => 'What would this course start ...'])) }}
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('End date', null, ['class' => 'form-label']) }}
                                    {{ Form::date('end_date', $course->end_date, array_merge(['class' => 'form-control', 'placeholder' => 'What would this course start ...'])) }}
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col">
                                        {!! Form::submit('Save course', ['class' => 'btn btn-accent']) !!}
                                        {{-- // <a href="#" class="btn btn-accent">Save course</a> --}}
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-primary">Publish Course</a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex">
                                    <a class="text-warning"
                                        href="#"><strong>{{ strtoupper($course->is_published) }}</strong></a>
                                </div>
                                <div class="list-group-item d-flex">
                                    <a href="{{ route('course.show', $course->slug) }}"><strong>Preview
                                            Course</strong></a>
                                </div>
                                <div class="list-group-item">
                                    <a href="#" class="text-danger"><strong>Delete Course</strong></a>
                                </div>
                            </div>
                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Course Image</div>
                        </div>
                        <div class="card">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="thumbnail" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{ URL::to('/images/'.$course->thumbnail) }});">
                                    </div>
                                </div>
                            </div>
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Video</div>
                        </div>


                        <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $course->trailler_url }}"
                                    allowfullscreen=""></iframe>
                            </div>
                            <div class="card-body">
                                <label class="form-label">URL</label>
                                <input type="text" name="trailler_url" class="form-control"
                                    value="{{ $course->trailler_url }}" placeholder="Enter Video URL">
                                @error('trailler_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">Enter a valid video URL.</small>
                            </div>
                        </div>

                        <div class="page-separator">
                            <div class="page-separator__text">Options</div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('Course Author', null, ['class' => 'form-label']) }}
                                    {{ Form::select('author', $teachers->pluck('full_name', 'id'), $course->author, array_merge(['class' => 'form-control custom-select', 'placeholder' => 'Course Author ...'])) }}
                                    <small class="form-text text-muted">Select Course Author.</small>
                                    @error('author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                <label class="form-label">Price</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group form-inline">
                                            <span class="input-group-prepend"><span class="input-group-text">$</span></span>
                                            <input type="text"
                                                   class="form-control"
                                                   value="24">
                                        </div>
                                    </div>
                                </div>
                                <small class="form-text text-muted">The recommended price is between &dollar;17 and &dollar;24</small>
                            </div> --}}
                                {{-- <div class="form-group mb-0">
                                <label class="form-label"
                                       for="select03">Tags</label>
                                <select id="select03"
                                        data-toggle="select"
                                        multiple
                                        class="form-control">
                                    <option selected="">JavaScript</option>
                                    <option selected="">Angular</option>
                                    <option>Bootstrap</option>
                                    <option>CSS</option>
                                    <option>HTML</option>
                                </select>
                                <small class="form-text text-muted">Select one or more tags.</small>
                            </div> --}}
                            </div>
                            {!! Form::close() !!}

                        </div>

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

        function myFunction2(id) {
            var x = document.getElementById(`form2${id}`);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function addSection() {
            var x = document.getElementById("addsection");
            var y = document.getElementById("addsectionbutton");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none"
            } else {
                x.style.display = "none";
                y.style.display = ""
            }
        }

        function editSection(id) {
            var x = document.getElementById(`editsection${id}`);
            var y = document.getElementById("editsectionbutton");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none"
            } else {
                x.style.display = "none";
                y.style.display = ""
            }
        }

        function addlesson(id) {
            var x = document.getElementById(`addlesson${id}`);
            var y = document.getElementById("addlessonbutton");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none"
            } else {
                x.style.display = "none";
                y.style.display = ""
            }
        }

        // function closeaddSection() {
        //     var y = document.getElementById("addsectionbutton");
        //     var x = document.getElementById("addsection");
        //     y.style.display = "block";
        //     y.style.display = "none"
        // }
    </script>

@endsection
