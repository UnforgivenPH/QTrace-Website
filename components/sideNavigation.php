<style>
.scroll-sidebar {
    display: flex;
    flex-direction: column;
}

.sidebar-nav {
    flex: 1; 
}

#sidebarnav {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 100%; 
}

#sidebarnav > li:last-child {
    margin-top: auto;
}
</style>

<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Tables</span>
                </li>
                <li class="sidebar-item selected">
                    <a class="sidebar-link has-arrow waves-effect waves-dark active" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-border-inside"></i>
                        <span class="hide-menu">Bootstrap Tables</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level in">
                        <li class="sidebar-item active">
                            <a href="table-basic.html" class="sidebar-link ">
                                <i class="mdi mdi-border-all"></i>
                                <span class="hide-menu">Basic Table </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="table-dark-basic.html" class="sidebar-link">
                                <i class="mdi mdi-border-left"></i>
                                <span class="hide-menu">Dark Basic Table </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="table-sizing.html" class="sidebar-link">
                                <i class="mdi mdi-border-outside"></i>
                                <span class="hide-menu">Sizing Table </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="table-layout-coloured.html" class="sidebar-link">
                                <i class="mdi mdi-border-bottom"></i>
                                <span class="hide-menu">Coloured Table Layout</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-border-inside"></i>
                        <span class="hide-menu">Datatables</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="table-datatable-basic.html" class="sidebar-link">
                                <i class="mdi mdi-border-vertical"></i>
                                <span class="hide-menu"> Basic Initialisation</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="table-datatable-api.html" class="sidebar-link">
                                <i class="mdi mdi-blur-linear"></i>
                                <span class="hide-menu"> API</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="table-datatable-advanced.html" class="sidebar-link">
                                <i class="mdi mdi-border-style"></i>
                                <span class="hide-menu"> Advanced Initialisation</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-jsgrid.html" aria-expanded="false">
                        <i class="mdi mdi-border-top"></i>
                        <span class="hide-menu">Table Jsgrid</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-responsive.html" aria-expanded="false">
                        <i class="mdi mdi-border-style"></i>
                        <span class="hide-menu">Table Responsive</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-footable.html" aria-expanded="false">
                        <i class="mdi mdi-tab-unselected"></i>
                        <span class="hide-menu">Table Footable</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="authentication-login1.html" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->