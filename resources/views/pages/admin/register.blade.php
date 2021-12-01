@extends('layout.page')
@section('title') Register @endsection
@section('content-header')
    <div class="col-sm-6">
        <h1 class="m-0">Register</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Register</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('main-content')
    <div class="register-box" style="margin: 0 auto">
        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="admin_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($errors->has('admin_name')) : ?>
                    <p class="text-red"><?= $errors->first('admin_name') ?></p>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="admin_email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($errors->has('admin_email')) : ?>
                    <p class="text-red"><?= $errors->first('admin_email') ?></p>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="admin_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($errors->has('admin_password')) : ?>
                    <p class="text-red"><?= $errors->first('admin_password') ?></p>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="admin_retype_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($errors->has('admin_retype_password')) : ?>
                    <p class="text-red"><?= $errors->first('admin_retype_password') ?></p>
                    <?php endif; ?>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
@section('custom-js')
    <script>
        @if(Session::has('message'))
            toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ Session::get('message') }}");
            <?php Session::put('message', null) ?>
        @endif
        @if(Session::has('error'))
            toastr.options = {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ Session::get('error') }}");
            <?php Session::put('error', null) ?>
        @endif
    </script>
@endsection
