<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
           {{--  @if (! Auth::guest())
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../../images/{{ Auth::user()->UsAvatar }}"
                        class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success" class="treeview-menu"></i> {{ trans('adminlte_lang::message.online') }}</a>
                    </div>
                </div>
            @endif --}}

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
                <li><a href="/personal"><i class="fas fa-users"></i> Personal</a></li>
                <li><a href="/asistencia"><i class="fas fa-tasks"></i> Asistencia</a></li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
</aside>
