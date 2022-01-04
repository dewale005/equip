@extends('layouts.index')

@section('content')

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page-content ">

        <div class="pt-32pt">
            <div
                class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                <div class="flex d-flex flex-column flex-sm-row align-items-center">

                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                        <h2 class="mb-0">Registered Users</h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{ route('default') }}">Home</a></li>

                            <li class="breadcrumb-item">

                                <a href=".">Account</a>

                            </li>

                            <li class="breadcrumb-item active">

                                User

                            </li>

                        </ol>

                    </div>
                    {!! Form::open([
                        'route' => 'export.excel',
                        'method' => 'get',
                        'role' => 'form',
                    ]) !!}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Start date', null, ['class' => 'form-label']) }}
                                {{ Form::date('start_date', null, array_merge(['class' => 'form-control', 'placeholder' => 'What would this course start ...'])) }}
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
                                {{ Form::date('end_date', null, array_merge(['class' => 'form-control', 'placeholder' => 'What would this course start ...'])) }}
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            {{ Form::label(' ', null, ['class' => 'form-label']) }}
                            {!! Form::submit('Download', ['class' => 'btn btn-primary', 'style' => 'height: 36px; margin-top: 29px;']) !!}
                
                    {!! Form::close() !!}
                </div>

            </div>
        </div>

        <div class="page-section container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Registration History</div>
            </div>

            <div class="card table-responsive">
                <table class="table table-flush table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>State</th>
                            <th>Employment Status</th>
                            <th>Number Reffered</th>
                            <th>Date Joined</th>
                            <th>Action</th>
                            {{-- <th class="text-center">Amount</th>
                        <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td style="color: @if ($item->email_verified_at != null) green @else red @endif ">{{ $item->first_name }}
                                    {{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->age_range }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->state }}</td>
                                <td>{{ $item->employment }}</td>
                                <td>{{ $item->referrals->count() }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    {!! Form::open(['route' => ['user.destroy', $item->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('delete', ['class' => 'btn btn-outline-danger mb-24pt mb-sm-0']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination justify-content-start pagination-xsm m-0">
                     {!! $user->links("pagination::bootstrap-4") !!}
            </ul>
        </div>
    </div>
    <!-- // END Header Layout Content -->

@endsection
