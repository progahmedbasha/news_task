<html>
<head>
<title>first sheet</title>
<link rel="stylesheet" href="{{url('pos/style.css')}}">

<meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
    {{-- //sweet alert  --}}
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />



    

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">

  
</head>
<body>

<div class="topnav">
  {{-- <a class="active no-print" href="{{url('/home')}}">الرئيسية</a>
  <a  class='no-print' href="{{url('/products')}}">المنتجات</a>
  <a class='no-print' href="{{url('/categories')}}">الأصناف</a>
  <a class='no-print' href="{{url('/salepage')}}">المبيعات</a>
  <a class='no-print' href="#">المستخدمين</a>
  
  <a class='no-print' href="#"class="dropdow" >تقارير</a>
  <a class='no-print' href="{{url('/suppliers')}}">الموردين</a>
  <a class='no-print' href="{{url('/report/products')}}">تقارير المنتجات</a>
  <a class='no-print' href="{{url('/report/staff')}}">تقارير العمال</a>
  <a class='no-print' href="#">عن البرنامج</a> --}}

              <a class="pull-right no-print" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>


</div>

@yield('content')

</body>



</html>
