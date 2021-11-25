@extends('layout.index')
@section('body')
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials.main-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        @yield('content-header')
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('main-content')
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('partials.control-sidebar')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->
    </body>
@endsection
