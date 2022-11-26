<!DOCTYPE html>
<!--
   Author: Keenthemes
   Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
   Purchase: https://1.envato.market/EA4JP
   Website: http://www.keenthemes.com
   Contact: support@keenthemes.com
   Follow: www.twitter.com/keenthemes
   Dribbble: www.dribbble.com/keenthemes
   Like: www.facebook.com/keenthemes
   License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
   -->
<html lang="en">

   @include('admin.layouts.head')
   @include('admin.layouts.sidebar')
      <!--begin::Javascript-->
   <!--begin::Global Javascript Bundle(used by all pages)-->
   @include('admin.layouts.javascripts')
   <!--end::Page Custom Javascript-->
   <!--end::Javascript-->
   <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
      @yield('content')
   </div>
   @include('admin.layouts.footer')

   </body>
   <!--end::Body-->
</html>