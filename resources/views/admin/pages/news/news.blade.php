@extends('admin.layouts.master')
@section('content')
<style>
   .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
   }
   .switch input {
   opacity: 0;
   width: 0;
   height: 0;
   }
   .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
   }
   .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
   }
   input:checked+.slider {
   background-color: #2196F3;
   }
   input:focus+.slider {
   box-shadow: 0 0 1px #2196F3;
   }
   input:checked+.slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
   }
   /* Rounded sliders */
   .slider.round {
   border-radius: 34px;
   }
   .slider.round:before {
   border-radius: 50%;
   }
</style>
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
         <li class="breadcrumb-item text-muted">News</li>
         <li class="breadcrumb-item text-dark">News Listing</li>
      </ul>
      <!--end::Breadcrumb-->
   </div>
   <!--begin::Card-->
   <div class="card">
      <!--begin::Card header-->
      <div style="margin-left: 20%;">
         <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
               <!--begin::Search-->
               <div class="d-flex align-items-center position-relative my-1" style="margin-left: -20%;">
                  {{-- 
                  <select id="users" class="form-control form-control-solid w-150px ps-5" style="padding: 10px;">
                     <option value="">Select Publishers</option>
                     @foreach($users as $user)
                     <option value="{{$user->id}}" {{(old('user_id')==$user->id)?
                     'selected':''}} >{{$user->name}}</option>
                     @endforeach
                  </select>
                  --}}
                  <form method="get" class="form-inline" action="{{url('admin/news')}}">
                     <input class="form-control form-control-solid w-200px ps-15" name="search" type="text"
                        value="{{ request()->search }}" placeholder="Search News">
               </div>
               &nbsp;
               {{-- <input type="text" name="user" placeholder="user" > --}}
               <select name="user" class="form-control form-control-solid w-150px ps-5" style="padding: 10px;">
               <option value="" selected>Select Publishers</option>
               @foreach($users as $user)
               {{-- <option  {{($search_user == $search_user)? 'selected' : '' }}> {{$user->name}}</option> --}}
               <option value="{{$user->id}}" {{(request()->user == $user->id)? 'selected' : '' }} >{{$user->name}}
               </option>
               @endforeach
               </select>From:
               <input class="form-control form-control-solid w-200px ps-4" name="date_from"
                  value="{{ request()->date_from }}" type="date">
               to: <input class="form-control form-control-solid w-200px ps-4" name="date_to"
                  value="{{ request()->date_to }}" type="date">
               <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
            <button type="submit" class="btn btn-light-primary me-3"><i class="fa fa-search"></i></button>
            <a href="{{url('admin/news')}}" class="btn btn-light-primary me-3" style="margin-top:0px;"><i
               class="fa fa-times"></i></a>
            <div class="menu-item px-3">
            <button type="submit" name="excel" class="btn btn-light-primary me-3">excel</button>
            </div>
            <div class="menu-item px-3">
            <button type="submit" name="pdf" class="btn btn-light-primary me-3">pdf</button>
            </div>
            </form>
            {{-- paginate --}}
            <a href="{{route('news.create')}}" class="btn btn-primary">Add</a>
            <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
         </div>
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
               <table id="tbody" class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                  id="kt_customers_table" role="grid">
                  <!--begin::Table head-->
                  <thead>
                     <!--begin::Table row-->
                     <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=" "
                           style="width: 29.25px;">
                           <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                              <input class="form-check-input" type="checkbox" data-kt-check="true"
                                 data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                           </div>
                        </th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1"
                           colspan="1" aria-label="Title: activate to sort column ascending"
                           style="width: 125px;">Title</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1"
                           colspan="1" aria-label="Publish Date: activate to sort column ascending"
                           style="width: 125px;">Publish Date</th>
                           <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1"
                           colspan="1" aria-label="Publisher Name: activate to sort column ascending"
                           style="width: 125px;">Publisher Name</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1"
                           colspan="1" aria-label="Customer Name: activate to sort column ascending"
                           style="width: 125px;">Status</th>
                        <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions"
                           style="width: 79.625px;">Actions</th>
                     </tr>
                     <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="fw-bold text-gray-600">
                     @foreach($news as $index=>$new)
                     <tr class="odd">
                        <!--begin::Checkbox-->
                        <td>
                           <div class="form-check form-check-sm form-check-custom form-check-solid">
                              <input class="form-check-input" type="checkbox" value="1">
                           </div>
                        </td>
                        <!--end::Checkbox-->
                        <!--begin::Name=-->
                        <td>
                           {{ $new->title }}
                        </td>
                        <td>
                           {{ $new->publish_date }}
                        </td>
                        <td>
                           {{ $new->User->name }}
                        </td>
                        <td>
                           @if($new->active =='1')
                           <label class="switch">
                           <input type="checkbox" class="actives" checked value="0" name="active"
                              data-id="{{ $new->id }}">
                           <span class="slider round"></span>
                           </label>
                           @endif
                           @if($new->active =='0')
                           <label class="switch">
                           <input type="checkbox" class="actives" value="1" name="active"
                              data-id="{{ $new->id }}">
                           <span class="slider round"></span>
                           </label>
                           @endif
                        </td>
           
                        <!--end::Name=-->
                        <!--begin::Action=-->
                        <td class="text-end">
                           <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                 <div class="menu-item px-3">
                                    <a href="news/{{$new->id}}" class="menu-link px-3">View Links</a>
                                 </div>
                                  <div class="menu-item px-3">
                                    <a href="news/{{$new->id}}/edit" class="menu-link px-3">View & Edit</a>
                                 </div>
                                 <div class="menu-item px-3">
                                    <form action="{{route('news.destroy',$new->id)}} " method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button class="menu-link px-3" style="background: transparent;border: 0;"
                                          data-kt-customer-table-filter="delete_row">Delete</button>
                                    </form>
                                 </div>
                              </ul>
                           </div>
                           <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                     </tr>
                     @endforeach
                  </tbody>
                  <!--end::Table body-->
               </table>
               {{ $news->links() }}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
             //change status active
             $('.actives').on('click ', function (e) {
                 var active = $('.actives').val();
               //   var new_id = $('.new_id').val();
                  var new_id = $(this).attr('data-id');
                 $.ajax({
                     url: "{{route('news_change_satus')}}",
                     type: "POST",
                     data: {
                         active: active,
                         new_id:new_id,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
                     if(response)
                        {
                           toastr.success(" Status Changed Succsesfilly ");
                        }
                     },
                 });
   
             });
   
   });
   
   
</script>
@endsection