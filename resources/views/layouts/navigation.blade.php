<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{Auth::user()->nama_pengguna}}</strong>
                            </span> <span class="text-muted text-xs block">{{Auth::user()->role}} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    MQK
                </div>
            </li>
            <li class="{{ isActiveRoute('operator_registrasi/dashboard') }}">
                <a href="{{ url('operator_registrasi/dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ isActiveRoute('operator_registrasi/registrasi') }}">
                <a href="{{ url('operator_registrasi/registrasi') }}"><i class="fa fa-credit-card"></i> <span class="nav-label">Registrasi</span> </a>
            </li>
            <li class="{{ isActiveRoute('operator_registrasi/form_cetak_kartu') }}">
                <a href="{{ url('operator_registrasi/form_cetak_kartu') }}"><i class="fa fa-address-card "></i> <span class="nav-label">Cetak Kartu</span> </a>
            </li>

            

            <li class="{{ isActiveRoute('operator_registrasi/rekapitulasi_peserta_invalid') }} {{ isActiveRoute('operator_registrasi/rekapitulasi_peserta') }}">
                    <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Rekapitulasi</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ isActiveRoute('operator_registrasi/rekapitulasi_peserta') }}"><a href="{{url('operator_registrasi/rekapitulasi_peserta')}}">Peserta Terverifikasi</a></li>
                        <li class="{{ isActiveRoute('operator_registrasi/rekapitulasi_peserta_invalid') }}"><a href="{{url('operator_registrasi/rekapitulasi_peserta_invalid')}}">Peserta Tidak Terverifikasi</a></li>
                    </ul>
                </li>

            <li class="{{ isActiveRoute('operator_registrasi/marhalah') }} {{ isActiveRoute('operator_registrasi/bidang_lomba') }} {{ isActiveRoute('operator_registrasi/babak') }} {{ isActiveRoute('operator_registrasi/majelis') }}">
                <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Manajemen Lomba</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('operator_registrasi/marhalah') }}"><a href="{{url('operator_registrasi/marhalah')}}">Marhalah</a></li>
                    <li class="{{ isActiveRoute('operator_registrasi/bidang_lomba') }}"><a href="{{url('operator_registrasi/bidang_lomba')}}">Bidang Lomba</a></li>
                    <li class="{{ isActiveRoute('operator_registrasi/babak') }}"><a href="{{url('operator_registrasi/babak')}}">Babak</a></li>
                    <li class="{{ isActiveRoute('operator_registrasi/majelis') }}"><a href="{{url('operator_registrasi/majelis')}}">Majelis</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
