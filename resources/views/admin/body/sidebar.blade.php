<div class="left-side-menu">

    <div class="h-100" data-simplebar>



        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <li class="menu-title mt-2">Apps</li>


                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employ List </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.employ')}}">All Employ</a>
                            </li>
                            <li>
                                <a href="{{route('add.employe')}}">Add Employ</a>
                            </li>

                        </ul>
                    </div>


                </li>

                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Coustomer List </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.costomer')}}">All Costomer</a>
                            </li>
                            <li>
                                <a href="{{route('add.costomer')}}">Add Costomer</a>
                            </li>

                        </ul>
                    </div>


                </li>
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Supplier Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.supplier')}}">All Supplier</a>
                            </li>
                            <li>
                                <a href="{{route('add.supplier')}}">Add Supplier</a>
                            </li>

                        </ul>
                    </div>


                </li>
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employee  Salary </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('add.advance.salary')}}">Add Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{route('all.advance.salary')}}">All Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{route('pay.salary')}}">Pay Salary</a>
                            </li>
                            <li>
                                <a href="{{route('month.salary')}}">Last Month Salary</a>
                            </li>

                        </ul>
                    </div>


                </li>
                <li>
                    <a href="#attandance" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="attandance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('attendance.index') }}">Employee Attendance List</a>
                                <a href="{{ route('attendance.create') }}">Add Attendance </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#Catagory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Catagory </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Catagory">
                        <ul class="nav-second-level">
                            <li>
                                  <a href="{{ route('all.catagory') }}">All Category </a>

                            </li>
                        </ul>
                    </div>
                </li>
                <li>

                    <li>
                        <a href="#Product" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Product List </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Product">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{route('all.product')}}">All Product</a>
                                </li>
                                <li>
                                    <a href="{{route('add.product')}}">Add Product</a>
                                </li>

                            </ul>
                        </div>


                    </li>


                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> CRM </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="crm-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="crm-contacts.html">Contacts</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="email-read.html">Read Email</a>
                            </li>
                            <li>
                                <a href="email-compose.html">Compose Email</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Email Templates</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="auth-login.html">Log In</a>
                            </li>
                            <li>
                                <a href="auth-login-2.html">Log In 2</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>

                        </ul>
                    </div>
                </li>


        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
