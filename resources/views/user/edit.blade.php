@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                <div class="flex d-flex flex-column flex-sm-row align-items-center">

                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                        <h2 class="mb-0">Account</h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item">

                                <a href="">Account</a>

                            </li>

                            <li class="breadcrumb-item active">

                                Edit Account

                            </li>

                        </ol>

                    </div>
                </div>

            </div>
        </div>

        <div class="container page__container page-section">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (session()->get("alert-$msg"))
                    <div class="alert alert alert-soft-{{ $msg }} d-flex d-flex" role="alert">
                        <div class="text-body" style="text-align: center">{{ session()->get("alert-$msg") }}</div>
                    </div>
                @endif
            @endforeach
            <div class="page-separator">
                <div class="page-separator__text">Basic Information</div>
            </div>
            {!! Form::open([
    'route' => 'updateprofile',
    'method' => 'put',
    'role' => 'form',
    'enctype' => 'multipart/form-data',
]) !!}
            <div class="row">
                <div class="col-md-6 ">

                    <div class="form-group">
                        {{ Form::label('First name', null, ['class' => 'form-label']) }}
                        {{ Form::text('first_name', $user->first_name, array_merge(['class' => 'form-control', 'placeholder' => 'Your first name ...', "disabled"])) }}
                        <span role="alert">
                            <strong>Please contact support to change your First Name</strong>
                        </span>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Last name', null, ['class' => 'form-label']) }}
                        {{ Form::text('last_name', $user->last_name, array_merge(['class' => 'form-control', 'placeholder' => 'Your last name ...', "disabled"])) }}
                        <span role="alert">
                            <strong>Please contact support to change your Last Name</strong>
                        </span>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Referal Link', null, ['class' => 'form-label']) }}
                        {{-- <input class="form-control" type="text" readonly="readonly" value="{{ url('/') . '/?ref=' . Auth::user()->id }}"> --}}
                        {{ Form::text('ref', $user->getReferralLinkAttribute(),  array_merge(['class' => 'form-control', 'readonly'=>'readonly', 'placeholder' => 'Your referal Link ...', "disabled"])) }}
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Phone Number(Whatsapp enabled)', null, ['class' => 'form-label']) }}
                        {{ Form::text('phone_number', $user->phone_number, array_merge(['class' => 'form-control', 'placeholder' => 'Your last name ...', "disabled"])) }}
                        <span role="alert">
                            <strong>Please contact support to change your phone number</strong>
                        </span>
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Address', null, ['class' => 'form-label']) }}
                        {{ Form::text('address', $user->address, array_merge(['class' => 'form-control', 'placeholder' => 'Your resident address...'])) }}
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Address 2 (Optional)', null, ['class' => 'form-label']) }}
                        {{ Form::text('address2', $user->address2, array_merge(['class' => 'form-control', 'placeholder' => 'Your resident address 2 ...'])) }}
                        @error('address2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('State Of Residence', null, ['class' => 'form-label']) }}
                        {{ Form::select(
    'state',
    [
        'FCT Abuja' => 'FCT Abuja',
        'Abia State' => 'Abia State',
        'Adamawa State' => 'Adamawa State',
        'Akwa Ibom State' => 'Akwa Ibom State',
        'Anambra State' => 'Anambra State',
        'Bauchi State' => 'Bauchi State',
        'Bayelsa State' => 'Bayelsa State',
        'Benue State' => 'Benue State',
        'Borno State' => 'Borno State',
        'Cross River State' => 'Cross River State',
        'Delta State' => 'Delta State',
        'Ebonyi State' => 'Ebonyi State',
        'Edo State' => 'Edo State',
        'Ekiti State' => 'Ekiti State',
        'Enugu State' => 'Enugu State',
        'Gombe State' => 'Gombe State',
        'Imo State' => 'Imo State',
        'Jigawa State' => 'Jigawa State',
        'Kaduna State' => 'Kaduna State',
        'Kano State' => 'Kano State',
        'Katsina State' => 'Katsina State',
        'Kebbi State' => 'Kebbi State',
        'Kogi State' => 'Kogi State',
        'Kwara State' => 'Kwara State',
        'Lagos State' => 'Lagos State',
        'Nassarawa State' => 'Nassarawa State',
        'Niger State' => 'Niger State',
        'Ogun State' => 'Ogun State',
        'Ondo State' => 'Ondo State',
        'Osun State' => 'Osun State',
        'Oyo State' => 'Oyo State',
        'Plateau State' => 'Plateau State',
        'Rivers State' => 'Rivers State',
        'Sokoto State' => 'Sokoto State',
        'Taraba State' => 'Taraba State',
        'Yobe State' => 'Yobe State',
        'Zamfara State' => 'Zamfara State',
    ],
    $user->state,
    array_merge(['class' => 'form-control', 'placeholder' => 'Your State ...']),
) }}
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Local Government', null, ['class' => 'form-label']) }}
                        {{ Form::text('local_govt', $user->local_govt, array_merge(['class' => 'form-control', 'placeholder' => 'Your resident address 2 ...'])) }}
                        @error('local_govt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>

                <div class="col-md-6 ">

                    <div class="form-group">
                        {{ Form::label('Bio', null, ['class' => 'form-label']) }}
                        {{ Form::textarea('bio', $user->bio, array_merge(['class' => 'form-control', 'placeholder' => 'Your brief description ...'])) }}
                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Age', null, ['class' => 'form-label']) }}
                        {{ Form::select(
    'age_range',
    [
        'Below 18yrs' => 'Below 18yrs',
        '18 - 24yrs' => '18 - 24yrs',
        '25 - 29yrs' => '25 - 29yrs',
        '30 - 34yrs' => '30 - 34yrs',
        '35 - 39yrs' => '35 - 39yrs',
        '40 - 44yrs' => '40 - 44yrs',
        '45 - 49yrs' => '45 - 49yrs',
        '50 - 54yrs' => '50 - 54yrs',
        '55 - 59yrs' => '55 - 59yrs',
        '55 and Above' => '55 and Above',
    ],
    $user->age_range,
    array_merge(['class' => 'form-control', 'placeholder' => 'Choose you age range ...']),
) }}
                        @error('age_range')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('Gender', null, ['class' => 'form-label']) }}
                        {{ Form::select(
    'gender',
    [
        'Male' => 'Male',
        'Female' => 'Female',
    ],
    $user->gender,
    array_merge(['class' => 'form-control', 'placeholder' => 'Choose your gender ...']),
) }}
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('Employment Status', null, ['class' => 'form-label']) }}
                        {{ Form::select(
    'employment',
    [
        'Business Owner' => 'Business Owner',
        'Unemployed' => 'Unemployed',
        'Employed' => 'Employed',
        'Start Up' => 'Start Up',
        'Undergradute' => 'Undergradute',
        'Employment Seeker' => 'Employment Seeker',
        'Others' => 'Others',
    ],
    $user->employment,
    array_merge(['class' => 'form-control', 'placeholder' => 'Choose your employment status ...']),
) }}
                        @error('employment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

            </div>
            {!! Form::submit('Update Profile', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            {{-- <form method="POST" action="{{ route('updateprofile') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label class="text-label" for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2" type="email" name="first_name" value="{{$user->first_name}}" required
                            autocomplete="email" autofocus
                            class="form-control form-control-prepended @error('email') is-invalid @enderror"
                            placeholder="john@doe.com">
    
    
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-label" for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2" type="text" name="last_name" value="{{$user->last_name}}" required autocomplete="current-password"
                            class="form-control form-control-prepended @error('password') is-invalid @enderror"
                            placeholder="Enter your password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Save</button>
                </div>
            </form> --}}
        </div>
    </div>

    </div>
    <!-- // END Header Layout Content -->

@endsection
