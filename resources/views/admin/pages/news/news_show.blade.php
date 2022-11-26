@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <!--begin::Container-->
   <div class="container" id="kt_content_container">
      <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0"
         data-kt-swapper="true" data-kt-swapper-mode="prepend"
         data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
         <!--begin::Heading-->
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">News List</h1>
         <!--end::Heading-->
         <!--begin::Breadcrumb-->
         <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
            <li class="breadcrumb-item text-muted">
               <a href="../../demo3/dist/index.html" class="text-muted">Home</a>
            </li>
            <li class="breadcrumb-item text-muted">Applications</li>
            <li class="breadcrumb-item text-muted">New</li>
            <li class="breadcrumb-item text-dark">New Show</li>
         </ul>
         <!--end::Breadcrumb-->
      </div>
      <!--begin::Card-->
      <div class="card">
         <!--begin::Card header-->
         <div class="card-header border-0 pt-6">
        
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
     
            <!--end::Card toolbar-->
         </div>
         <!--end::Card header-->
         <!--begin::Card body-->
         <div class="card-body pt-0">
            @if(Session::has('success'))
            <script>
               toastr.success(" {{ Session::get('success') }} ");
            </script>
            @endif
            <!--begin::Table-->
            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
               <div class="table-responsive">
                 {!!$new->content !!}
               </div>
               <!--end::Table-->
            </div>
            <!--end::Card body-->
         </div>
         <!--end::Card-->
         <!--end::Modal - Customers - Add-->
         <!--end::Modals-->
      </div>
      <!--end::Container-->
   </div>
   @endsection