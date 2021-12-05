@extends('layout.page')
@section('title') Profile @endsection
@section('content-header')
    <div class="col-sm-6">
        <h1 class="m-0">Profile</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('main-content')
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="<?=  ($admin->admin_image) ?  asset($admin->admin_image) : asset('media/img/user4-128x128.jpg'); ?>"
                         alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $admin->admin_name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Phone</b> <a class="float-right">{{ $admin->admin_phone }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Role</b> <a class="float-right">{{ $admin->admin_role }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal" action="{{ route('update', ['id' => $admin->admin_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="inputName" placeholder="Name" name="admin_id" value="{{ $admin->admin_id }}">
                            <input type="hidden" class="form-control" id="inputName" placeholder="Name" name="url_update" value="{{ Request::url() }}">
                            <input type="hidden" class="form-control" id="inputName" placeholder="Name" name="admin_image_old" value="{{ $admin->admin_image }}">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="admin_name" value="{{ $admin->admin_name }}">
                                    <?php if ($errors->has('admin_name')) : ?>
                                    <p class="text-red"><?= $errors->first('admin_name') ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="admin_email" value="{{ $admin->admin_email }}">
                                    <?php if ($errors->has('admin_email')) : ?>
                                    <p class="text-red"><?= $errors->first('admin_email') ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="admin_phone" value="{{ $admin->admin_phone }}">
                                    <?php if ($errors->has('admin_phone')) : ?>
                                    <p class="text-red"><?= $errors->first('admin_phone') ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-sm-2 col-form-label">Image</label>
                                <div class="input-group col-sm-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="admin_image_new">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <?php if ($errors->has('admin_image_new')) : ?>
                                <p class="text-red"><?= $errors->first('admin_image_new') ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ($admin->admin_role_id !== 1 && $admin->admin_role_id) : ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="admin_status">
                                            <option value="1">Active</option>
                                            <option value="0">Disable</option>
                                        </select>
                                    </div>
                                </div>
                            <?php else: ?>
                                <input type="hidden" class="form-control" id="inputName" placeholder="Name" name="admin_status" value="{{ $admin->admin_status }}">
                                <input type="hidden" class="form-control" id="inputName" placeholder="Name" name="admin_role_id" value="1">
                            <?php endif; ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="admin_rode_id">
                                        <option value="">--Selected--</option>
                                        <option value="1">option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
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
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ Session::get('error') }}");
        <?php Session::put('error', null) ?>
        @endif
    </script>
@endsection
