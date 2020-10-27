<section class="sidebar">

    <!-- Menu -->
    
    <ul class="sidebar-menu" data-widget="tree">
        
        <li class="header">{{ __('content.mainmenu') }}</li>

        <!-- Dashboard Menu -->

        {{-- <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Panel</span></a></li> --}}
        
        <!-- Project Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i>
                <span> {{ __('content.workbook') }} </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('workbooks.index') }}"> {{ __('content.legalsheets') }} </a></li>
                <li><a href="{{ route('dailyReports.index') }}"> {{ __('content.dailyreports') }} </a></li>
                <li><a href="#"> {{ __('content.notes') }} </a></li>
                {{-- <li><a href="#"> Software </a></li> --}}
                {{-- <li><a href="#"> Servicios </a></li> --}}
            </ul>
        </li>

        <!-- Management Menu -->

        {{-- <li class="treeview">
            <a href="#">
                <i class="fa fa-line-chart"></i>
                <span>Gestión</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('providers.index')}}"> Proveedores </a></li>
                <li><a href="{{ route('accounts.index')}}"> Cuentas </a></li>
                <li><a href="{{ route('billings.index')}}"> Facturas </a></li>
                <li><a href="{{ route('budgets.resume')}}"> Presupuestos </a></li>
            </ul>
        </li> --}}

        <!-- Report Menu -->

        {{-- <li class="treeview">
            <a href="#">
                <i class="fa fa-print"></i>
                <span>Informes</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"> Inventarios </a></li>
                <li><a href="#"> Registro Individual </a></li>
                <li><a href="#"> Historial de Uso </a></li>
                <li><a href="#"> Auditoria </a></li>
            </ul>
        </li> --}}

        <!-- Settings Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-sliders"></i>
                <span>{{ __('content.configuration') }}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
                <li><a href="{{ route('locations.index')}}"> {{ __('content.locations') }} </a></li>
                <li><a href="{{ route('periods.index')}}"> {{ __('content.periods') }} </a></li>
                <li><a href="{{ route('contractors.index')}}"> {{ __('content.contractors') }} </a></li>
                <li><a href="{{ route('equipments.index')}}"> {{ __('content.equipments') }} </a></li>
                <li><a href="{{ route('positions.index')}}"> {{ __('content.positions') }} </a></li>
                <li><a href="{{ route('sectors.index')}}"> {{ __('content.sectors') }} </a></li>
                <li><a href="{{ route('users.index') }}"> {{ __('content.users') }} </a></li>
                {{--  <li><a href="{{ route('offices.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('sectors.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('positions.index')}}"> {{ __('content.positions') }} </a></li>
                <li><a href="{{ route('oss.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('systems.index')}}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('cellularPlans.index')}}"> {{ __('content.roles') }} </a></li> --}}
            </ul>
        </li>

        <!-- Administration Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-lock"></i>
                <span>{{ __('content.administration') }}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('roles.index') }}"> {{ __('content.roles') }} </a></li>
                <li><a href="{{ route('menus.index') }}"> {{ __('content.menus') }} </a></li>
                <li><a href="#"> {{ __('content.parameters') }} </a></li>
            </ul>
        </li>

        <!-- Help Menu -->

        <li class="treeview">
            <a href="#">
                <i class="fa fa-question-circle-o"></i>
                <span>Ayuda</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"> {{ __('content.guide') }} </a></li>
                <li><a href="#"> {{ __('content.about') }} </a></li>
            </ul>
        </li>

    </ul>
    
</section>