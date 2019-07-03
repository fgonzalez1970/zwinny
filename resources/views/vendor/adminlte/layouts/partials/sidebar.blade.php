<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                  <a href="{{ url('home') }}">
                    <i class="fa fa-dashboard"></i>{{ trans('adminlte_lang::message.dashboard') }}
                  </a>
            </li>
            
            <!--<li class="header">Admin</li>-->
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->isRole('admin-zwinny'))
                @can('tenants.index')
                <li class="treeview">
                    <a href="#"><i class='fa fa-cogs'></i> <span>Admin & Config</span> <i class="fa fa-angle-left pull-right"></i></a> 
                    <ul class="treeview-menu">
                        @can('tenants.index') 
                            <li><a href="{{ url('tenants') }}"><i class='fa fa-institution'></i><span>{{ trans('adminlte_lang::message.tenants') }}</span></a></li>  
                        @endcan
                        @can('roles.index')
                            <li><a href="{{ url('roles') }}"><i class='fa fa-street-view'></i><span>{{ trans('adminlte_lang::message.roles') }}</span></a></li>
                        @endcan
                        @can('users.index')
                            <li><a href="{{ url('users') }}"><i class='fa fa-user'></i><span>{{ trans('adminlte_lang::message.users') }}</span></a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('devices.index')
                <li class="treeview">
                    <a href="#"><i class='fa fa-cogs'></i> <span>CMS Config</span> <i class="fa fa-angle-left pull-right"></i></a> 
                    <ul class="treeview-menu">
                        @can('devices.index') 
                            <li><a href="{{ url('devices') }}"><i class='fa fa-podcast'></i><span>{{ trans('adminlte_lang::message.devices') }}</span></a></li>  
                        @endcan
                        @can('devices.assign')
                            <li><a href="{{ url('assignements') }}"><i class='fa fa-share-alt'></i><span>{{ trans('adminlte_lang::message.assign') }}</span></a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
            @endif
            @if (Auth::user()->isRole('admin-gral'))
                @can('users.tenant.index')
                    <li class="treeview">
                        <a href="#"><i class='fa fa-cogs'></i> <span>Admin & Config</span> <i class="fa fa-angle-left pull-right"></i></a> 
                        <ul class="treeview-menu">
                            @can('users.tenant.index')
                            <li><a href="{{ url('users_ten') }}"><i class='fa fa-user'></i><span>{{ trans('adminlte_lang::message.users') }}</span></a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            @endif
            
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->isRole('admin-zwinny'))
            @else
                <li class="header">CRM</li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-users'></i> <span>{{ trans('adminlte_lang::message.prospecting') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                    
                        @can('t01_leads.index') 
                            <li><a href="{{ url('leads') }}"><i class='fa fa-rocket'></i><span>{{ trans('adminlte_lang::message.leads') }}</span></a></li>
                        @endcan
                        @can('t02_contacts.index') 
                            <li><a href="{{ url('contacts') }}"><i class='fa fa-tty'></i><span>{{ trans('adminlte_lang::message.activities') }}</span></a></li>

                        @endcan
                    
                    </ul>
                </li>
                <li class="header">CMS</li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-microchip'></i> <span>{{ trans('adminlte_lang::message.devices') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        @can('devices.index') 
                            <li><a href="{{ url('devicesTenant') }}"><i class='fa fa-microchip'></i><span>{{ trans('adminlte_lang::message.devices') }}</span></a></li>
                        @endcan
                        @can('locations.index') 
                            <li><a href="{{ url('locations') }}"><i class='fa fa-map-marker'></i><span>{{ trans('adminlte_lang::message.locations') }}</span></a></li>
                        @endcan
                        @can('locations.assign') 
                            <li><a href="{{ url('locs_devs') }}"><i class='fa fa-code-fork'></i><span>{{ trans('adminlte_lang::message.assign') }}</span></a></li>
                        @endcan
                    
                    </ul>
                </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
