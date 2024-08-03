@auth
    @extends('admin.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if(Auth::user()->role === 'public')
                        <h1 class="m-0">Public User Dashboard</h1>

                        @elseif(Auth::user()->role === 'video_man')
                            <h1 class="m-0">Dashboard for Video Man </h1>

                    @elseif(Auth::user()->role === 'video_editor')
                        <h1 class="m-0">Dashboard for Video Editor </h1>
                    @elseif(Auth::user()->role === 'admin')
                        <h1 class="m-0">Dashboard for Admin </h1>
                        @else
                        <a href="{{route('auth.loginForm')}}">Click Here</a>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Content goes here -->

        @if(Auth::user()->role === 'public')

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        @php
                            $userIdeasCount = $public_ideas->filter(function ($post) {
                          return $post->user_id == Auth::user()->id;
                      })->count();
                        @endphp
                        <h3> {{ $userIdeasCount }}</h3>


                        <p>Total Idea</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('user_ideas.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        @elseif(Auth::user()->role === 'video_man')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $video_man_posts->count() }}</h3>

                        <p>Total Post</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('video_man_posts.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @elseif(Auth::user()->role === 'video_editor')
            <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $video_editor_posts->count() }}</h3>

                        <p>Total Post</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('video_editor.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> {{ $video_editor_posts->filter(function ($post) {
                        return $post->edited_photos !== null || $post->edited_videos !== null;
                    })->count() }}</h3>

                        <p>Your Edited Post</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('video_editor.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
          </div>

        @elseif(Auth::user()->role === 'admin')
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $video_editor_posts->count() }}</h3>

                            <p>Total Video Man Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <a href="{{route('admin_panel.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{ $video_editor_posts->filter(function ($post) {
                        return $post->edited_photos !== null || $post->edited_videos !== null;
                    })->count() }}</h3>

                            <p>Total Edited Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-video"></i>
                        </div>
                        <a href="{{route('admin_panel.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> {{ $users->filter(function ($post) {
                        return $post->role == 'public';
                    })->count() }}</h3>

                            <p>Public User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $public_ideas->count() }}</h3>

                            <p>Total Public User Ideas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-camera"></i>
                        </div>
                        <a href="{{ route('admin_panel.public_user_posts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>


        @else
            <h1 class="m-0">Unauthorised Dashboard</h1>
    @endif
        <!-- ./col -->

    </section>
    <!-- /.content -->
@endsection
@endauth
