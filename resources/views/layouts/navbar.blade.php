<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <span>Beranda</span>
        </a>
    </li>
    @if(Auth::user()->user_level_id == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <span>Penilaian Tanah</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('criteria.index') }}">
            <span>Kriteria Tanah</span>
        </a>
    </li>
    <li class="nav-item with-sub">
        <a class="nav-link" href="#">
            <span>Sifat Tanah</span>
        </a>
        <div class="sub-item">
            <ul>
                <li><a href="{{ route('property.index') }}">List Sifat Tanah</a></li>
                <li><a href="{{ route('property.causes.index') }}">List Penyebab Sifat Tanah</a></li>
                <li><a href="{{ route('property.solution.index') }}">List Solusi Sifat Tanah</a></li>
                <li><a href="{{ route('property.rule.index') }}">List Kentuan Sifat Tanah</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item with-sub">
        <a class="nav-link" href="#">
            <span>Administrator</span>
        </a>
        <div class="sub-item">
            <ul>
                <li><a href="{{ route('admin.user.index') }}">List Pengguna</a></li>
                <li><a href="{{ route('admin.level.index') }}">List Level Pengguna</a></li>
            </ul>
        </div>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <span>Penilaian Tanah</span>
        </a>
    </li>
    @endif
</ul>