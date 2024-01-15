<header id="header" class="header fixed-top d-flex align-items-center">
   <div class="d-flex align-items-center justify-content-between">
       <a href="index.html" class="logo d-flex align-items-center">
           <img src="assets/img/logo.png" alt="" />
           <span class="d-none d-lg-block">NiceAdmin</span>
       </a>
       <i class="bi bi-list toggle-sidebar-btn"></i>
   </div>
   <div class="search-bar">
       <form class="search-form d-flex align-items-center" method="POST" action="#">
           <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
           <button type="submit" title="Search">
               <i class="bi bi-search"></i>
           </button>
       </form>
   </div>
   <nav class="header-nav ms-auto">
       <ul class="d-flex align-items-center">
           <li class="nav-item d-block d-lg-none">
               <a class="nav-link nav-icon search-bar-toggle" href="#">
                   <i class="bi bi-search"></i>
               </a>
           </li>
           <li class="nav-item dropdown">
               <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                   <i class="bi bi-bell"></i>
                   <span class="badge bg-primary badge-number"></span>
               </a>
               <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        @if ($role !== 'G  MFG')
                        <i class="bi bi-bell"></i>
                        @endif
                        @if ($role == 'MFG Hanchou' && ($reject_kakaricho !== null || $reject_kakaricho == null))
                            @php
                                $count_hanchou = $reject_kakaricho !== null;
                                $jumlah_hanchou = $count_hanchou + 1;
                            @endphp
                            <span class="badge bg-primary badge-number">{{ $jumlah_hanchou }}</span>
                        @endif
                        @if ($role == 'kakaricho' && ($reject_mng_mfg !== null || $reject_mng_mfg == null))
                            @php
                                $count_kakaricho = $reject_mng_mfg !== null;
                                $jumlah_kakaricho = $count_kakaricho + 1;
                            @endphp
                            <span class="badge bg-primary badge-number">{{ $jumlah_kakaricho }}</span>
                        @endif
                        @if ($role == 'mng_mfg' && ($reject_mng_qc !== null || $reject_mng_qc == null))
                            @php
                                $count_mng_mfg = $reject_mng_qc !== null;
                                $jumlah_mng_mfg = $count_mng_mfg + 1;
                            @endphp
                            <span class="badge bg-primary badge-number">{{ $jumlah_mng_mfg }}</span>
                        @endif
                        @if ($role == 'mng_qc' && ($reject_gm !== null || $reject_gm == null))
                            @php
                                $count_mng_qc = $reject_gm !== null;
                                $jumlah_mng_qc = $count_mng_qc + 1;
                            @endphp
                            <span class="badge bg-primary badge-number">{{ $jumlah_mng_qc }}</span>
                        @endif
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have  new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        @if ($role == 'hanchou')
                        <li class="notification-item">
                            <div class="row">
                                <h4 style="margin-left:55px">Reject Kakaricho</h4>
                                @foreach($prodaks as $item)
                                @if ($item->reject_kakaricho !== null)
                                <div class="col-md-2">
                                <i class="bi bi-x-circle text-danger"></i>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        {{ $item->reject_kakaricho}}
                                    </p>
                                    <p>{{ $item->updated_at}}</p>
                                </div>
                                 @endif
                                @endforeach
                            </div>
                        </li>
                         <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @endif
                        @if ($role == 'kakaricho')
                        <li class="notification-item">
                            <div class="row">
                                <h4 style="margin-left:55px">Reject mng_mfg</h4>
                                @foreach($prodaks as $item)
                                @if ($item->reject_mng_mfg !== null)
                                <div class="col-md-2">
                                <i class="bi bi-x-circle text-danger"></i>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        {{ $item->reject_mng_mfg}}
                                    </p>
                                    <p>{{ $item->updated_at}}</p>
                                </div>
                                 @endif
                                @endforeach
                            </div>
                        </li>
                         <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @endif
                        @if ($role == 'mng_mfg')
                        <li class="notification-item">
                            <div class="row">
                                <h4 style="margin-left:55px">Reject mng_qc</h4>
                                @foreach($prodaks as $item)
                                @if ($item->reject_mng_qc !== null)
                                <div class="col-md-2">
                                <i class="bi bi-x-circle text-danger"></i>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        {{ $item->reject_mng_qc}}
                                    </p>
                                    <p>{{ $item->updated_at}}</p>
                                </div>
                                 @endif
                                @endforeach
                            </div>
                        </li>
                         <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @endif
                        @if ($role == 'MFG Qc')
                        <li class="notification-item">
                            <div class="row">
                                <h4 style="margin-left:55px">Reject gm</h4>
                                @foreach($prodaks as $item)
                                @if ($item->reject_gm !== null)
                                    <div class="col-md-2">
                                        <i class="bi bi-x-circle text-danger"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            {{ $item->reject_gm}}
                                        </p>
                                        <p>{{ $item->updated_at}}</p>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                         <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span> </a><!-- End Profile Iamge Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                            <span>{{ auth()->user()->role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
        </ul>
   </nav>
</header>