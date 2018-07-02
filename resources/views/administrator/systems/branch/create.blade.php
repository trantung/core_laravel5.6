@extends('administrator.app')
@section('title','Chi nhánh')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="m-subheader__title m-subheader__title--separator">
	                Chi nhánh
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
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 20px">
				<a href="{{ route('branch.index') }}" class="btn btn-success">Danh sách chi nhánh</a>
	        	<a href="{{ route('branch.create') }}" class="btn btn-primary">Thêm chi nhánh</a>
			</div>
	        <div class="col-md-12">
				@include('administrator.errors.errors-validate')
	            <!--begin::Portlet-->
	            <div class="m-portlet m-portlet--tab">
	                <div class="m-portlet__head">
	                    <div class="m-portlet__head-caption">
	                        <div class="m-portlet__head-title">
	                            <span class="m-portlet__head-icon m--hide">
	                                <i class="la la-gear"></i>
	                            </span>
	                            <h3 class="m-portlet__head-text">
	                                Thêm mới chi nhánh
	                            </h3>
	                        </div>
	                    </div>
	                </div>
	                {{ Form::open(array('route' => 'branch.store', 'class' => 'm-form m-form--fit m-form--label-align-right')) }}
	                    <div class="m-portlet__body">
	                        <div class="form-group m-form__group">
	                            <label for="name">
	                                Tên
	                            </label>
	                            <input type="name" class="form-control m-input" id="name" placeholder="Tên chi nhánh" name="name" value="{{ old('name') }}">
	                        </div>
	                    </div>
	                    <div class="m-portlet__foot m-portlet__foot--fit">
	                        <div class="m-form__actions">
	                            <button class="btn btn-primary">
	                                Lưu
	                            </button>
	                            <a class="btn btn-secondary" href="{{ route('branch.index') }}">
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
@stop