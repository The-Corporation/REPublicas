<div id="navBarRep" class="navbar-default sidebar" role="navigation">
    @if(Auth::user()->republic != null || isset(Auth::user()->republics))
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('home') }}" class="{{ strpos(Request::url(), 'dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#" class="{{ (strpos(Request::url(), 'republicas/cadastrar') ||
                                      (strpos(Request::url(), '/editar'))  ||
                                      (strpos(Request::url(), '/convidar')) ? 'active' : '') }}">
                    <i class="fa fa-home"></i> República
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level {{ (strpos(Request::url(), 'republicas/cadastrar') ||strpos(Request::url(), '/editar')) ? 'collapse in' : '' }}">
                    @if(Auth::user()->republic != null || isset(Auth::user()->republics))
                    <li>
                        <a href="{{-- route('rep_edit', (Auth::user()->republic != null) ? Auth::user()->republic->id : Auth::user()->republics->first()->id) --}}" class="{{ strpos(Request::url(), 'editar') ? 'active' : '' }}">Editar</a>
                    </li>
                    @endif
                    @if(Auth::user()->republic != null || isset(Auth::user()->republics))
                    <li>
                        <a href="{{ route('rep_invite') }}" class="{{ strpos(Request::url(), 'convidar') ? 'active' : '' }}">Convidar morador</a>
                    </li>
                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
    @endif
</div>
<!-- /.navbar-static-side -->
