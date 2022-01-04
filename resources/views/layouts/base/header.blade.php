<div id="header" class="mdk-header js-mdk-header mb-0" data-fixed data-effects="waterfall">
    <div class="mdk-header__content">

        <div class="navbar navbar-expand navbar-light bg-white navbar-shadow" id="default-navbar" data-primary>
            <div class="container page__container">

                <!-- Navbar Brand -->
                <a href="{{ route('default') }}" class="navbar-brand mr-16pt">

                    <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt" style="width: 190px">
                        <img src="{{ asset('public/images/logo/wff-Logo-New-1.png') }}" alt="logo"
                            class="img-fluid" />
                    </span>
                </a>

                <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                    <li class="nav-item {{ Request::routeIs('default') ? 'active' : '' }}">
                        <a href="{{ route('default') }}" class="nav-link">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('course.index') ? 'active' : '' }}">
                        <a href="{{ route('course.index') }}" class="nav-link">{{ __('Courses') }}</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">Paths</a>
                        <div class="dropdown-menu">
                            <a href="paths.html" class="dropdown-item">Browse Paths</a>
                            <a href="student-path.html" class="dropdown-item">Path Details</a>
                            <a href="student-path-assessment.html" class="dropdown-item">Skill Assessment</a>
                            <a href="student-path-assessment-result.html" class="dropdown-item">Skill Result</a>
                            <a href="student-paths.html" class="dropdown-item">My Paths</a>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="pricing.html" class="nav-link">Pricing</a>
                    </li> --}}
                    <li class="nav-item {{ Request::routeIs('teachers.index') ? 'active' : '' }}">
                        <a href="{{ route('teachers.index') }}" class="nav-link">{{ __('Teachers') }}</a>
                    </li>

                    <li class="nav-item {{ Request::routeIs('forum.index') ? 'active' : '' }}">
                        <a href="{{ route('forum.index') }}" class="nav-link">@lang('Community')</a>
                    </li>
                    {{-- <li class="nav-item dropdown" data-toggle="tooltip" data-title="Community" data-placement="bottom"
                        data-boundary="window">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                            <i class="material-icons">people_outline</i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="teachers.html" class="dropdown-item">Browse Teachers</a>
                            <a href="student-profile.html" class="dropdown-item">Student Profile</a>
                            <a href="teacher-profile.html" class="dropdown-item">Instructor Profile</a>
                            <a href="blog.html" class="dropdown-item">Blog</a>
                            <a href="blog-post.html" class="dropdown-item">Blog Post</a>
                            <a href="faq.html" class="dropdown-item">FAQ</a>
                            <a href="help-center.html" class="dropdown-item">Help Center</a>
                            <a href="discussions.html" class="dropdown-item">Discussions</a>
                            <a href="discussion.html" class="dropdown-item">Discussion Details</a>
                            <a href="discussions-ask.html" class="dropdown-item">Ask Question</a>
                        </div>
                    </li> --}}
                </ul>

                <form class="search-form form-control-rounded navbar-search d-none d-lg-flex mr-16pt"
                    action="index.html" style="max-width: 230px">
                    <button class="btn" type="submit"><i class="material-icons">search</i></button>
                    <input type="text" class="form-control" placeholder="Search ...">
                </form>

                <ul class="nav navbar-nav ml-auto mr-0">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="https://whitefieldfoundation.ng/e-q-u-i-p/">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ Request::routeIs('home') ? 'active' : '' }}"
                                    href="{{ route('home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                                <a class="dropdown-item {{ Request::routeIs('editprofile') ? 'active' : '' }}"
                                    href="{{ route('editprofile') }}">
                                    {{ __('Edit Profile') }}
                                </a>
                                <a class="dropdown-item {{ Request::routeIs('course.index') ? 'active' : '' }}"
                                    href="{{ route('course.index') }}">
                                    {{ __('Courses') }}
                                </a>
                                <a class="dropdown-item {{ Request::routeIs('teachers.index') ? 'active' : '' }}"
                                    href="{{ route('teachers.index') }}">
                                    {{ __('Teacher') }}
                                </a>
                                @role(['admin', 'superadmin'])
                                    <a class="dropdown-item {{ Request::routeIs('course.manage') ? 'active' : '' }}"
                                        href="{{ route('course.manage') }}">
                                        {{ __('Manage Course') }}
                                    </a>
                                    <a class="dropdown-item {{ Request::routeIs('teachers.manage') ? 'active' : '' }}"
                                        href="{{ route('teachers.manage') }}">
                                        {{ __('Manage Teachers') }}
                                    </a>
                                    <a class="dropdown-item {{ Request::routeIs('userlist') ? 'active' : '' }}"
                                        href="{{ route('userlist') }}">
                                        {{ __('Registered Users') }}
                                    </a>
                                @endrole
                                {{-- <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('My Courses') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('Ask Questions') }}
                            </a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    {{-- <li class="nav-item">
                        <a href="index.html" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Register</a>
                    </li> --}}
                </ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Config::get('languages')[App::getLocale()] }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

            </div>
        </div>

    </div>
</div>
