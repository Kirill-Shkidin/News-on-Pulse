
<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
  <a class="nav-link" href="{{ route('admin.news.index') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.parser')?'active':'' }}">
  <a class="nav-link" href="{{ route('admin.parser') }}">Парсить новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.users.index')?'active':'' }}">
  <a class="nav-link" href="{{ route('admin.users.index') }}">Пользователи</a>
</li>


