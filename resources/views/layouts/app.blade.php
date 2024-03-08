<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('layouts.header')
    @include('partials.links')
</head>

<body>
    @include('sweetalert::alert')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->

                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                    @include('layouts.footer')
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('partials.script')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inputTanggal = document.getElementById('tgl_pinjam');
        var tanggalSekarang = new Date();
        var tanggalFormatted = tanggalSekarang.toISOString().split('T')[0];
        inputTanggal.value = tanggalFormatted;
    });
</script>


</html>
