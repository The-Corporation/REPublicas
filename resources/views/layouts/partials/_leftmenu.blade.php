<div id="navBarRep" class="navbar-default sidebar" role="navigation">
    @if(Auth::user()->republic != null)
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
                    @if(Auth::user()->republic == null)
                    <li>
                        <a href="{{ route('rep_create') }}">Cadastrar</a>
                    </li>
                    @endif
                    @if(Auth::user()->republic != null)
                    <li>
                        <a href="{{ route('rep_edit', Auth::user()->republic->id) }}" class="{{ strpos(Request::url(), 'editar') ? 'active' : '' }}">Editar</a>
                    </li>
                    @endif
                    @if(Auth::user()->republic != null)
                    <li>
                        <a href="{{ route('rep_invite') }}" class="{{ strpos(Request::url(), 'convidar') ? 'active' : '' }}">Convidar morador</a>
                    </li>
                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
    @endif
</div>
<!-- /.navbar-static-side -->
