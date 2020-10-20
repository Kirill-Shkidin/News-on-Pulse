<li class="nav-item {{ request()->routeIs('about')?'active':'' }}">
    <a class="nav-link" href="{{ route('about') }}">О нас</a>
</li>
<li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
</li>

@if(Auth::user()->status ?? false)
<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.index') }}">Админ</a>
</li>
@endif
<li class="nav-item {{ request()->routeIs('news.categories.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.categories.index') }}">Категории</a>
</li>
