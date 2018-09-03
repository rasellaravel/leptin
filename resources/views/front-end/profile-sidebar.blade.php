<div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                 @if(Auth::check())
                    <img src="{{asset('public/front-end-laptin/profile-image/'.Auth::user()->image)}}" class="img-responsive" alt="">
                    @else
                      <img src="{{asset('public/front-end-laptin/profile-image/default.png')}}" class="img-responsive" alt="">
                    @endif
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{Auth::user()->name}}
                    </div>
                    <div class="profile-usertitle-job">
                        Dashboard
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{url('user-profile-update')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            Profile Setting </a>
                        </li>
                        <li>
                            <a href="{{url('user-billing-address')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Update Billing </a>
                        </li>
                        <li>
                            <a href="{{url('user-change-password')}}" >
                            <i class="glyphicon glyphicon-ok"></i>
                            Change Password </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                            Payment Histry </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="glyphicon glyphicon-flag"></i>
                            Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>