<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach ($menus as $menu)
            
            @if(!empty($menu->module))
              <li class="nav-item">
                <a href="{{ Route($menu->module.".index") }}" class="nav-link  {{ (explode("/", Request::url())[3] == strtolower($menu->module)) ? 'active' : '' }}">
                    <i class="nav-icon {{ $menu->icon }}"></i>
                    <p>{{ $menu->name }}</p>
                </a>
              </li>
            @else
              <li class="nav-header">{{ $menu->name }}</li>
              @foreach ($submenus as $submenu)

                  @if($submenu->menu_id == $menu->id)
                    <li class="nav-item">
                      <a href="{{ Route($submenu->module.".index") }}" class="nav-link {{ (explode("/", Request::url())[3] == strtolower($submenu->module)) ? 'active' : '' }}">
                        <i class="nav-icon {{ $submenu->icon }}"></i>
                        <p>
                          {{ $submenu->name }}
                        </p>
                      </a>
                    </li>
                  @endif

              @endforeach    

            @endif
          
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>