@auth

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- User Pic and Name -->
        <a href="{{route('profile.show')}}" class="brand-link">
            @if(Auth::user()->role === 'public')
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            @elseif(Auth::user()->role === 'video_man')
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            @elseif(Auth::user()->role === 'video_editor')
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            @elseif(Auth::user()->role === 'admin')
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

            @else
                <img src="{{ asset('admin-assets/dist/img/user2-160x160.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            @endif

           @if(Auth::user()->role === 'public')
                    <span class="brand-text font-weight-light" >{{ Auth::user()->name}}</span>

            @elseif(Auth::user()->role === 'video_man')
             <span class="brand-text font-weight-light" >{{ Auth::user()->name}}</span>

            @elseif(Auth::user()->role === 'video_editor')
              <span class="brand-text font-weight-light" >{{ Auth::user()->name}}</span>

         @elseif(Auth::user()->role === 'admin')
                      <span class="brand-text font-weight-light" >{{ Auth::user()->name}}</span>

                    @else
                    <span class="brand-text font-weight-light" >Demo Name</span>
                @endif

        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
{{--               Dashboard Button--}}
                 <div>
                    @if(Auth::user()->role === 'public')
                        <a href="{{route('dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>

                    @elseif(Auth::user()->role === 'video_man')
                        <a href="{{route('video_man.dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>

                    @elseif(Auth::user()->role === 'video_editor')
                        <a href="{{route('video_editor.dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>



                    @endif
                 </div>


                        <li class="nav-item">
                            @if(Auth::user()->role === 'video_man')
                                <a href="{{ route('video_man_posts.create') }}" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>Create Post</p>
                                </a>
                            @endif
                        </li>


                       <li class="nav-item">
                            @if(Auth::user()->role === 'public')
                                <a href="{{route('user_ideas.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Idea List</p>
                                </a>

                            @elseif(Auth::user()->role === 'video_man')
                                <a href="{{ route('video_man_posts.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-video"></i>
                                    <p>Video Man Posts</p>
                                </a>



                            @endif
                        </li>


                        <li class="nav-item">
                            @if(Auth::user()->role === 'public')
                                <a href="{{ route('user_ideas.create') }}" class="nav-link">
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>Post New Idea</p>
                                </a>

                            @elseif(Auth::user()->role === 'video_man')
                                <a href="{{ route('video_man_posts.public_user_posts') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Public User Posts</p>
                                </a>



                            @endif
                        </li>

                        <li class="nav-item">
                        @if(Auth::user()->role === 'video_man')
                            <a href="{{ route('video_man_posts.completed_videos') }}" class="nav-link">
                                <i class="nav-icon fas fa-check"></i>
                                <p>Completed Videos</p>
                            </a>
                        @endif
                        </li>

                    <li class="nav-item">
                        @if(Auth::user()->role === 'video_editor')
                            <a href="{{ route('video_editor.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Update Data</p>
                            </a>
                        @endif
                    </li>


{{--admin sidebar--}}


                    <li class="nav-item">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{route('dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin_panel.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Update Data</p>
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin_panel.completed_videos') }}" class="nav-link">
                                <i class="nav-icon fas fa-check"></i>
                                <p>Completed Videos</p>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin_panel.public_user_posts') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Public User Idea List</p>
                            </a>
                        @endif
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

@endauth
