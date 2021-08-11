<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="dashboard.html">
                <b class="logo-text">
                    <img src="{{ asset('images/users/sunLogo.png') }}" alt="homepage" />
                </b>
            </a>
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="dropdown dropdown-notifications">
                    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                        <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                    </a>
                    <div class="dropdown-container">
                        <div class="dropdown-toolbar">
                            <h3 class="dropdown-toolbar-title">{{ trans('messages.Notifications') }} (<span class="notif-count">0</span>)</h3>
                        </div>
                        <ul class="dropdown-menu">
                            @foreach (Auth::user()->notifications as $notification)
                            @if($notification->data['type']==config('training.Notify.studentfree'))
                            <li class="notification active">
                                <div class="media">
                                    <div class="media-left">   
                                    </div>
                                    <div class="media-body">
                                    <strong class="notification-title">{{ trans('messages.TraineeFree') }}  </strong>
                                     <div class="notification-meta">
                                        <small class="timestamp">
                                            {{ $notification->created_at->diffForHumans(getNow()) }}</small>
                                    </div>
                                    </div>
                                </div>
                            </li>
                            @elseif($notification->data['type']==config('training.Notify.courseCreate'))
                            <li class="notification active">
                                <div class="media">
                                  <div class="media-left">
                                  </div>
                                  <div class="media-body">
                                    <strong class="notification-title">{{ trans('messages.courseNoti1') }} 
                                        {{ $notification->data['Auth'] }}
                                        {{ trans('messages.courseNoti2') }} {{ $notification->data['nameCourse'] }}</strong>
                                    <div class="notification-meta">
                                      <small class="timestamp">
                                          {{ $notification->created_at->diffForHumans(getNow()) }}</small>
                                    </div>
                                  </div>
                                </div>
                            </li>
                            @elseif($notification->data['type']==config('training.Notify.reportLesson'))
                            <li class="notification active">
                                <div class="media">
                                  <div class="media-left">
                                  </div>
                                  <div class="media-body">
                                    <strong class="notification-title">
                                        {{ trans('messages.courseNoti1') }}  {{ $notification->data['Auth'] }}
                                        {{ trans('messages.approved') }} {{ $notification->data['nameLesson'] }}
                                    </strong>
                                    <div class="notification-meta">
                                      <small class="timestamp">
                                          {{ $notification->created_at->diffForHumans(getNow()) }}</small>
                                    </div>
                                  </div>
                                </div>
                            </li>
                            @endif
                           
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('language', ['vi']) }}">🇻🇳</a>
                    <a href="{{ route('language', ['en']) }}">🏴󠁧󠁢󠁥󠁮󠁧󠁿</a>
                </li>
                
                <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="{{ trans('messages.Search') }}" class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                       
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @can('check-role')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ trans('messages.Register') }}</a>
                </li>
                @endcan
                <li>
                    <a class="profile-pic" href="#">
                        {{-- <img class="avatar" src="{{ asset($users->image->url) }}" alt=""> --}}
                    <input type="button" class="btn btn-dark" value="Logout"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                </li>
            </ul>
        </div>
</header>
