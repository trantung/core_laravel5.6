@extends('administrator.app')
@section('title','Danh sách user')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Danh sách tài khoản
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('administrator.errors.errors-validate')
    <!-- END: Subheader -->
    <div class="m-content">
    @include('administrator.errors.messages')
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px">
                <a href="{{ action('Administrators\Users\UserController@index') }}" class="btn btn-success">Danh sách tài khoản</a>
            </div>
            <div class="col-md-12">
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Thêm mới tài khoản
                                </h3>
                            </div>
                        </div>
                    </div>
                    {{ Form::open(array('action' => 'Administrators\Users\UserController@store', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed', 'enctype' => 'multipart/form-data')) }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>
                                        Tên tài khoản:
                                    </label>
                                    <input type="text" class="form-control m-input" placeholder="Tên tài khoản" name="fullname" value="{{ old('fullname') }}">
                                    <span class="m-form__help">
                                        Nhập tên tài khoản
                                    </span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Email:
                                    </label>
                                    <input type="email" class="form-control m-input" placeholder="Email" name="email" value="{{ old('email') }}">
                                    <span class="m-form__help">
                                        Nhập email
                                    </span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        CMT:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-cc-visa"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control m-input" placeholder="" name="identity" value="{{ old('identity') }}">
                                    </div>
                                    <span class="m-form__help">
                                        Nhập chứng minh thư hoặc hộ chiếu
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>
                                        Mật khẩu:
                                    </label>
                                    <input type="password" class="form-control m-input" placeholder="" name="password">
                                    <span class="m-form__help">
                                        Nhập mật khẩu
                                    </span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Xác nhận mật khẩu:
                                    </label>
                                    <input type="password" class="form-control m-input" placeholder="" name="password_confirmation">
                                    <span class="m-form__help">
                                        Nhập lại mật khẩu
                                    </span>
                                </div>
                                <div class="col-lg-4">
                                    <label>
                                        Điện thoại:
                                    </label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control m-input" placeholder="" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <span class="m-form__help">
                                        Nhập số điện thoại
                                    </span>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label for="branch_id">
                                        Chi nhánh
                                    </label>
                                    <select class="form-control m-input" id="branch_id" name="branch_id">
                                        @foreach ($data['branchs'] as $element)
                                            <option value="{{ $element['id'] }}">
                                                {{ $element['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help">
                                        Chọn chi nhánh
                                    </span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="department_id">
                                        Phòng ban
                                    </label>
                                    <select class="form-control m-input" id="department_id" name="department_id">
                                        @foreach ($data['departments'] as $element)
                                            <option value="{{ $element['id'] }}">
                                                {{ $element['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help">
                                        Chọn phòng ban
                                    </span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="position">
                                        Chức vụ
                                    </label>
                                    <select class="form-control m-input" id="position" name="position_id">
                                        @foreach ($data['positions'] as $element)
                                            <option value="{{ $element['id'] }}">
                                                {{ $element['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help">
                                        Chọn chức vụ
                                    </span>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label for="name">
                                        Giới tính
                                    </label>
                                    <select class="form-control m-input" id="gender" name="gender">
                                        @foreach (\App\Models\Users\User::$listGender as $key => $value)
                                            <option value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help">
                                        Chọn giới tính
                                    </span>
                                </div>
                                {{-- <div class="col-lg-4">
                                    <label for="type">
                                        Loại người dùng
                                    </label>
                                    <select class="form-control m-input" id="type" name="type">
                                        @foreach ($data['type'] as $element)
                                            <option value="{{ $element['id'] }}">
                                                {{ $element['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="m-form__help">
                                        Chọn loại người dùng
                                    </span>
                                </div> --}}
                                <div class="col-lg-4">
                                    <label>
                                        Ngày sinh
                                    </label>
                                    <input type="text" class="form-control" id="birthday" placeholder="Chọn ngày" name="birthday"/>
                                    <span class="m-form__help">
                                        Chọn ngày sinh
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">
                                        Ảnh
                                    </label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="avatar">
                                        <label class="custom-file-label" for="customFile">
                                            Chọn ảnh
                                        </label>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4">
                                    <label class="">
                                        CMT:
                                    </label>
                                    <input type="text" class="form-control m-input"  name="identity">
                                    <span class="m-form__help">
                                        Nhập chứng minh thư hoặc hộ chiếu
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button class="btn btn-primary">
                                    Lưu
                                </button>
                                <a class="btn btn-secondary" href="{{ action('Administrators\Users\UserController@index') }}">
                                    Trở về danh sách
                                </a>
                            </div>
                        </div>
                    {{-- </form> --}}
                    {{ Form::close() }}
                </div>
                <!--end::Portlet-->
            </div>
            <!--end::Form-->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#birthday').datepicker({
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });
    });
</script>
@stop