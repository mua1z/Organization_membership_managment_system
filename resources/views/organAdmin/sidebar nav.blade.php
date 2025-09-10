 <!-- Sidebar Navigation -->
 @foreach ($users as $user)

 <aside class="sidebar">



            <div class="logo-container">
                <div class="logo">OMMS</div>
               <span class="org-name">{{$user->organization_name}} Organization</span>
            </div>



            <nav class="main-nav">
                <ul>
                    <li class="active"><a href="{{url('/home')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="{{url('member')}}"><i class="fas fa-users"></i> Members</a></li>
                    <li><a href="{{url('event')}}"><i class="fas fa-calendar-alt"></i> Events</a></li>
                    <li><a href="{{url('blog')}}"><i class="fas fa-file-alt"></i> Blog</a></li>
                    <li><a href="{{url('payment')}}"><i class="fas fa-credit-card"></i> Payments</a></li>
                    <li><a href="{{url('organAdmin/plans/upgrade')}}"><i class="fas fa-arrow-up"></i> Upgrade Plan</a></li>

                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </nav>

            <div class="user-profile">
                <img src="imageorgan/{{$user->profile_photo_path}}" alt="{{$user->organization_name}}">
                <div class="user-info">
                    <span class="user-name">{{$user->name}}</span>
                    <span class="user-role"> Organization Administrator</span>
                </div>
                <a href="{{url('edit_profile',$user->id)}}"><button><i class="fas fa-chevron-down"></i>Edit Profile</button></a>
            </div>
        </aside>
        @endforeach
