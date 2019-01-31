<ul class="nav navbar-nav">
    <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a></li>
    @if(Auth::user()->user_level_id == 1)
    <li><a href="{{ route('customer.index') }}"><i class="fa fa-search" aria-hidden="true"></i> Diagnosa Tanah</a></li>
    <li><a href="{{ route('criteria.index') }}"><i class="fa fa-filter" aria-hidden="true"></i> Kriteria Tanah</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-tasks" aria-hidden="true"></i> Sifat Tanah
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('property.index') }}">List Sifat Tanah</a></li>
            <li><a href="{{ route('property.causes.index') }}">List Penyebab Sifat Tanah</a></li>
            <li><a href="{{ route('property.solution.index') }}">List Solusi Sifat Tanah</a></li>
            <li><a href="{{ route('property.rule.index') }}">List Kentuan Sifat Tanah</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-md" aria-hidden="true"></i> Administrator
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.user.index') }}">List Pengguna</a></li>
            <li><a href="{{ route('admin.level.index') }}">List Level Pengguna</a></li>
        </ul>
    </li>
    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a></li>
    @else
    <li><a href="{{ route('customer.index') }}"><i class="fa fa-search" aria-hidden="true"></i> Diagnosa Tanah</a></li>
    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a></li>
    @endif
</ul>