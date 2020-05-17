@foreach ($menus as $menu)
  @if (empty($menu['childrens']))
  <li class="nav-item <?= $menu['slug'] == '#' ? 'active' : ''   ?>">
    <a class="nav-link" href="{{ $menu['slug'] }}">{{ $menu['name'] }}</a>
  </li>
  @else
  <li class="dropdown">
    <a href="#" title="{{ $menu['title'] }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $menu['name'] }} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      @foreach ($menu['childrens'] as $children)
      <li><a href="{{ $children['slug'] }}" title="{{ $children['title'] }}">{{ $children['name'] }}</a></li>
      @endforeach
    </ul>
  </li>
  @endif
@endforeach
