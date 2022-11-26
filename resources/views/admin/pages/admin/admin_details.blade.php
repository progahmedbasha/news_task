@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container" id="kt_content_container">

		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0"
			data-kt-swapper="true" data-kt-swapper-mode="prepend"
			data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
			<!--begin::Heading-->
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New User</h1>
			<!--end::Heading-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
				<li class="breadcrumb-item text-muted">
					<a href="../../demo3/dist/index.html" class="text-muted">Home</a>
				</li>
				<li class="breadcrumb-item text-muted">Applications</li>
				<li class="breadcrumb-item text-muted">Customers</li>
				<li class="breadcrumb-item text-dark">Customer Listing</li>
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->



			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
				<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<div class="table-responsive">


						<br>
						<div>
							<span class="fs-2x fw-bolder text-gray-800">Form User</span>
						</div>

						<form action="{{route('admin.update',$user->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('patch')
							<div class="row gx-10 mb-5">
								<!--begin::Col-->
								<div class="col-lg-6">
									<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Name</label>
									<!--begin::Input group-->
									<div class="mb-5">
										<input type="text" class="form-control form-control-solid" placeholder="Name"
											value="{{$user->name}}" name="name">
										@error('name')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<!--end::Input group-->

									<!--begin::Input group-->
									<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Password</label>
									<div class="mb-5">
										<input type="text" class="form-control form-control-solid"
											placeholder="Password" name="password">
										@error('password')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<!--end::Input group-->

									<!--end::Input group-->
									<!--begin::Input group-->


								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-6">
									<!--begin::Input group-->
									<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Email</label>
									<div class="mb-5">
										<input type="text" class="form-control form-control-solid" placeholder="Email"
											value="{{$user->email}}" name="email">
										@error('email')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<!--end::Input group-->

								</div>
								<!--end::Col-->
							</div>
							<button type="submit" class="btn btn-primary">Save</button>
							<br><br>
						</form>





						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Modals-->
				<!--begin::Modal - Customers - Add-->
				<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->

				</div>
				<!--end::Modal - Customers - Add-->
				<!--begin::Modal - Adjust Balance-->
				
				<!--end::Modal - New Card-->
				<!--end::Modals-->
			</div>
			<!--end::Container-->
		</div>


		@endsection