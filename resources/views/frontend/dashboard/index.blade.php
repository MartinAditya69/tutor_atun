<h1>Halo</h1>
{{ \App\Helpers\DateHelper::dateFormatIndonesia('d-m-Y') }}
{{ functionAtun() }}
<h2>Selamat datang {{ auth()->user()->role }}</h2>
<ul>
    <li><a href="{{ route('menuAdmin') }}">Menu Admin</a></li>
    <li><a href="{{ route('menuUser') }}">Menu User</a></li>
    <li><a href="{{ route('logout') }}">Logout</a></li>
</ul>
