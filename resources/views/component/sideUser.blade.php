<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">

            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a  class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <img src="{{asset('volt/assets/img/brand/light.svg')}}" height="20" width="20"
                                alt="Volt Logo">
                        </span>
                        <span class="mt-1 ms-1 sidebar-text">FISH APP Overview</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('mapuser') }}"
                        class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Map</span>
                        </span>

                    </a>
                </li>
<div>

                <li class="nav-item">
                    <a href="{{ route('login') }}"
                        class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                    d="M9 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"

                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Logout</span>
                        </span>

                    </a>
                </li>


            </ul>
        </div>
</div>

    </nav>
