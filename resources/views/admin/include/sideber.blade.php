<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <ul class="nav nav-list">
        <li class="@if(Request::segment(1) == 'dashboard' ) active @endif">
            <a href="{{route('dashboard')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        {{-- start home section --}}
        <li class="@if(in_array(Request::segment(1), ['sliders', 'activities', 'ceos', 'supporters'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    Home
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'sliders' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Slider
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('sliders.create')}}">
                                Add Slider
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('sliders.index')}}">
                                Manage Slider
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'activities' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        We Do
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('activities.create')}}">
                                Add We Do
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('activities.index')}}">
                                Manage We Do
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'ceos' ) active open @endif">
                    <a href="{{route('ceos.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        CeoInfo
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'supporters' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Supporter
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('supporters.create')}}">
                                Add supporter
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('supporters.index')}}">
                                Manage supporter
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- end home section --}}

        {{-- start-about-section --}}
        <li class="@if(in_array(Request::segment(1), ['about', 'facilities', 'boardmembers', 'staffs', 'donars'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-info-circle"></i>
                <span class="menu-text">
                    About US
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'about' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Basic Info
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('aboutbasics.basic')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Basic Content
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('aboutbasics.image')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Image
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('basics.we.are.image')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Who We Are Image
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'facilities' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Facilities
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('facilities.create')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Facilitie
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('facilities.index')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Facilitie List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'boardmembers' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Board Member
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('boardmembers.create')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Member
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('boardmembers.index')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Member List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'staffs' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Staff & Teacher
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('staffs.create')}}">
                                Add Staff
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('staffs.index')}}">
                                Manage Staff
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(1) == 'donars' ) active open @endif">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Donar
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('donars.create')}}">
                                Add Donar
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('donars.index')}}">
                                Manage Donar
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>

                </li>
            </ul>
            <ul class="submenu">
                <li class="@if(Request::segment(2) == 'bank-info' ) active open @endif">
                    <a href="{{route('bank.info')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Banking Info
                    </a>
                </li>
            </ul>
        </li>
        {{-- end-about-section --}}

        {{-- start-activitie-section --}}
        <li class="@if(in_array(Request::segment(1), ['activitie', 'activitieprograms', 'activitieothers'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-heartbeat"></i>

                <span class="menu-text">
                    Activities
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('activitiebasics.basic')}}">
                       Basic Info
                    </a>
                </li>
            </ul>

            <ul class="submenu">
                <li class="">
                    <a href="{{route('activitiegallerys.index')}}">
                        Gallery Image
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('activitieprograms.index')}}">
                        Activite & Program
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('activitieothers.index')}}">
                        Activite & Other
                    </a>
                </li>
            </ul>
        </li>
        {{-- end activitie section --}}

        {{--start-our-success-section--}}
        <li class="@if(in_array(Request::segment(1), ['success', 'oursuccess'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-trophy"></i>

                <span class="menu-text">
                    Our Success
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="">
                    <a href="{{route('success.basic')}}">
                        Basic Info
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('oursuccess.index')}}">
                        Success Story
                    </a>
                </li>
            </ul>
        </li>
        {{--end-our-success-section--}}

          {{-- start-latest-section --}}
          <li class="@if(in_array(Request::segment(1), ['latesphotos-year', 'latesphotos', 'newsletters', 'videos'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-globe"></i>
                <span class="menu-text">
                    The Latest
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('year.photo')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Year
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('latesphotos.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Photos
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('newsletters.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Newsletter
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul> 
            <ul class="submenu">
                <li class="">
                    <a href="{{route('videos.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Videos
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul> 





            {{-- <ul class="submenu">
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Photos
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('year.photo')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Year
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('latesphotos.index')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Photo Gallery
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul> --}}
            {{-- <ul class="submenu">
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Newsletter
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{route('year.newletter')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Year
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{route('newsletters.index')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Newsletter
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>    --}}
        </li>
        {{-- end-latest-section --}}

        {{-- product section --}}
        <li class="@if(in_array(Request::segment(1), ['product', 'categories', 'products'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-shopping-cart"></i>

                <span class="menu-text">
                    Product Area
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('product.basic')}}">
                        Basic Info
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('categories.index')}}">
                        Category
                    </a>
                </li>
            </ul>

            <ul class="submenu">
                <li class="">
                    <a href="{{route('products.index')}}">
                        Product Info
                    </a>
                </li>
            </ul>
        </li>

         {{-- Guest House section --}}
         <li class="@if(in_array(Request::segment(1), ['gallery', 'guesthouse', 'guesthousepackege', 'guest-editable-image', 'guesthouseotherpackege'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bed"></i>
                <span class="menu-text">
                    GuestHouse
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('gursthouesegallerys.basic')}}">
                       Basic Info
                    </a>
                </li>
            </ul>

            <ul class="submenu">
                <li class="">
                    <a href="{{route('gursthouesegallerys.index')}}">
                       Guest Gallery Image
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('guesthousepackege.index')}}">
                        packege
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('guesthouseotherpackege.index')}}">
                        Other Packege
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('guest.edtable.image')}}">
                        Changeable Image
                    </a>
                </li>
            </ul>
        </li>

         {{-- Company  section --}}
         <li class="@if(in_array(Request::segment(1), ['widgets', 'footer', 'contact-basic'])) active open @endif">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">
                    Company Setting 
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('widgets.index')}}">
                       Basic Info
                    </a>
                </li>
            </ul>

            <ul class="submenu">
                <li class="">
                    <a href="{{route('widgets.logo')}}">
                       Logo
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('footer.image')}}">
                       Footer
                    </a>
                </li>
            </ul>

            <ul class="submenu">
                <li class="">
                    <a href="{{route('contact.basic')}}">
                       contactBasic
                    </a>
                </li>
            </ul>
        </li>

        <li class="@if(in_array(Request::segment(1), ['user-create'])) active open @endif">
            <a href="{{route('user.create')}}">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">
                    User
                </span>
            </a>
        </li>
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>


