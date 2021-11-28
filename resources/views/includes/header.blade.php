<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        <i class="fa fa-sign-out pull-right"></i> 
                        <button class="dropdown-item" type="submit">Log Out</button>
                    </form>
            </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->