@extends('admin.layouts.layout')
@section('content')
    <style>
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }

        .ui-w-80 {
            width: 80px !important;
            height: auto;
        }

        .btn-default {
            border-color: rgba(24, 28, 33, 0.1);
            background: rgba(0, 0, 0, 0);
            color: #4E5155;
        }

        label.btn {
            margin-bottom: 0;
        }

        .btn-outline-primary {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn {
            cursor: pointer;
        }

        .text-light {
            color: #babbbc !important;
        }

        .btn-facebook {
            border-color: rgba(0, 0, 0, 0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram {
            border-color: rgba(0, 0, 0, 0);
            background: #000;
            color: #fff;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }

        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }

        .account-settings-multiselect~.select2-container {
            width: 100% !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .material-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }

        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
    </style>

    <body>
        <div class="container light-style flex-grow-1 container-p-y">
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    {{-- <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list"
                                href="#account-general">Cài đặt chung</a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list"
                                href="#account-change-password">Đổi mật khẩu</a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list"
                                href="#account-vest">Trao quyền</a>
                        </div>
                    </div> --}}
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                  <h3 class="fw-bold text-secondary my-3">Cài đặt thông tin</h3>
                                    <img src="https://ui-avatars.com/api/?name={{ $user->user_name }}&background=random"
                                        alt="" class="d-block ui-w-80">
                                    {{-- <img src="/storage/images/1_meme_chloe-26068285.jpg" alt=""
                                        class="d-block ui-w-80"> --}}
                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Tải ảnh mới <br> (Chức năng đang phát triển)
                                            {{-- <input type="file" class="account-settings-fileinput"> --}}
                                        </label> &nbsp;
                                        <button type="button" class="btn btn-default md-btn-flat">Cài lại</button>

                                        <div class="text-light small mt-1">Áp dụng với JPG, GIF hoặc PNG. Dung lượng tối đa
                                            800K</div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Tên:</label>
                                        <input type="text" class="form-control" name="user_name"
                                            value="{{ $user->user_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail:</label>
                                        <input type="text" class="form-control mb-1" name="email"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Số điện thoại:</label>
                                        <input type="text" class="form-control" name="phone_number"
                                            value="{{ $user->phone_number }}">
                                    </div>
                                    <div class="text-right my-3">
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>&nbsp;
                                        <button type="button" class="btn btn-default">Huỷ</button>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">

                                    <div class="form-group">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Birthday</label>
                                        <input type="text" class="form-control" value="May 3, 1995">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Country</label>
                                        <select class="custom-select">
                                            <option>USA</option>
                                            <option selected="">Canada</option>
                                            <option>UK</option>
                                            <option>Germany</option>
                                            <option>France</option>
                                        </select>
                                    </div>


                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">

                                    <h6 class="mb-4">Contacts</h6>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" value="+0 (123) 456 7891">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Website</label>
                                        <input type="text" class="form-control" value="">
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="account-social-links">
                                <div class="card-body pb-2">

                                    <div class="form-group">
                                        <label class="form-label">Twitter</label>
                                        <input type="text" class="form-control" value="https://twitter.com/user">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" value="https://www.facebook.com/user">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Google+</label>
                                        <input type="text" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control"
                                            value="https://www.instagram.com/user">
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-connections">
                                <div class="card-body">
                                    <button type="button" class="btn btn-twitter">Connect to
                                        <strong>Twitter</strong></button>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <h5 class="mb-2">
                                        <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                                class="ion ion-md-close"></i> Remove</a>
                                        <i class="ion ion-logo-google text-google"></i>
                                        You are connected to Google:
                                    </h5>
                                    nmaxwell@mail.com
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <button type="button" class="btn btn-facebook">Connect to
                                        <strong>Facebook</strong></button>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <button type="button" class="btn btn-instagram">Connect to
                                        <strong>Instagram</strong></button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-notifications">
                                <div class="card-body pb-2">

                                    <h6 class="mb-4">Activity</h6>

                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked="">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone comments on my
                                                article</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked="">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone answers on my forum
                                                thread</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone follows me</span>
                                        </label>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">

                                    <h6 class="mb-4">Application</h6>

                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked="">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">News and announcements</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Weekly product updates</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked="">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Weekly blog digest</span>
                                        </label>
                                    </div>

                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-9">
                        <div class="fade show" id="account-change-password">
                            <form action="{{ route('admin.account-setting.changePassword') }}" method="post">
                                @csrf
                                <div class="card-body pb-2">
                                  <h3 class="fw-bold text-secondary my-3">Thay đổi mật khẩu</h3>
                                    <div class="form-group">
                                        <label class="form-label">Mật khẩu hiện tại:</label>
                                        <input type="password" class="form-control" name="old_password">
                                        @errorDirective('old_password')
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mật khẩu mới:</label>
                                        <input type="password" class="form-control" name="new_password">
                                        @errorDirective('new_password')
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nhập lại mật khẩu mới:</label>
                                        <input type="password" class="form-control" name="new_password_c">
                                        @errorDirective('new_password_c')
                                    </div>

                                    <div class="text-right my-3">
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>&nbsp;
                                        <button type="button" class="btn btn-default">Huỷ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-9">
                        <div class="fade show" id="account-vest">
                            <form action="{{ route('admin.account-setting.vest') }}" method="post">
                                @csrf 
                            <div class="card-body pb-2">
                              <h3 class="fw-bold text-secondary my-3">Chuyển quyền admin</h3>
                                <div class="form-group">
                                    <label class="form-label">Chọn người nhận:</label>
                                    <input type="text" class="form-control" id="users-input" name="user_name"
                                        value="">
                                </div>
                                <div class="text-right my-3">
                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>&nbsp;
                                    <button type="button" class="btn btn-default">Huỷ</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
