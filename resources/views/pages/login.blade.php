@extends('layout.index')
@section('title') Login @endsection
@section('body')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('dashboard') }}"><b>Blog</b>Api</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?php $message = \Illuminate\Support\Facades\Session::get('message') ?>
                <?php if ($message) : ?>
                    <p class="login-box-msg text-red"><?= $message ?></p>
                    <?php \Illuminate\Support\Facades\Session::put('message', null); ?>
                    <?php endif; ?>

                <form action="{{ route('signIn') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($errors->has('email')) : ?>
                        <p class="text-red"><?= $errors->first('email') ?></p>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($errors->has('password')) : ?>
                        <p class="text-red"><?= $errors->first('password') ?></p>
                    <?php endif; ?>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    </body>
@endsection
