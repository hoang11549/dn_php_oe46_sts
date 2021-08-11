<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
            {{-- @if(Auth::user()->role ===UserRole::SUPPERVISOR) --}}
            @can('check-role')
            <li class="sidebar-item pt-2">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('DashBoard') }}"
                    aria-expanded="false">
                    <i class="fas fa-chart-pie"></i>
                    <span class="hide-menu">{{ trans('messages.DashBoard') }}</span>
                </a>
            </li>
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.User') }}</span>
                    </a>
                </li>
            @endcan
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('listCourse.index') }}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.YourCourse') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                    href="{{ route('user.show',['user' => Auth::user()->id]) }}"
                        aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.Profile') }}</span>
                    </a>
                </li>
                @can('check-role')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('listSubject.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.subject') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reportLesson.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.reportLesson') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('lesson.index') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.lesson') }}</span>
                    </a>
                </li>
                @endcan
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reportDaily.create') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.CreateReport') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('historyReport') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">{{ trans('messages.historyReport') }}</span>
                    </a>
                </li>    
            {{-- @endif  --}}
            </ul>
        </nav>
    </div>
</aside> 
