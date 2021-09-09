<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Empresa</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <link href="{{ asset('css/root.css') }}" rel="stylesheet">
  
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  
  @yield('script')

  
</head>

<body>
    
  @include('layouts.topbar')
  
  @include('layouts.sidebar')
  
  @yield('content')
  
  
  @include('layouts.tabpanel')
  
    
  <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    
    <!-- ================================================
      Bootstrap Core JavaScript File
      ================================================ -->
      
  <!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
  <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>

  <!-- ================================================
Bootstrap Select
================================================ -->
  <script type="text/javascript" src="{{asset('js/bootstrap-select/bootstrap-select.js')}}"></script>

  <!-- ================================================
Bootstrap Toggle
================================================ -->
  <script type="text/javascript" src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

  <!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js')}}"></script>
  <!-- bootstrap file -->
  <script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>

  <!-- ================================================
Summernote
================================================ -->
  <script type="text/javascript" src="{{asset('js/summernote/summernote.min.js')}}"></script>

  <!-- ================================================
Flot Chart
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart.js')}}"></script>
  <!-- time.js -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-time.js')}}"></script>
  <!-- stack.js -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-stack.js')}}"></script>
  <!-- pie.js -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-pie.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-plugin.js')}}"></script>

  <!-- ================================================
Chartist
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/chartist/chartist.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/chartist/chartist-plugin.js')}}"></script>

  <!-- ================================================
Easy Pie Chart
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/easypiechart/easypiechart.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/easypiechart/easypiechart-plugin.js')}}"></script>

  <!-- ================================================
Sparkline
================================================ -->
  <!-- main file -->
  <script type="text/javascript" src="{{asset('js/sparkline/sparkline.js')}}"></script>
  <!-- demo codes -->
  <script type="text/javascript" src="{{asset('js/sparkline/sparkline-plugin.js')}}"></script>

  <!-- ================================================
Rickshaw
================================================ -->
  <!-- d3 -->
  <script src="{{asset('js/rickshaw/d3.v3.js')}}"></script>
  <!-- main file -->
  <script src="{{asset('js/rickshaw/rickshaw.js')}}"></script>
  <!-- demo codes -->
  <script src="{{asset('js/rickshaw/rickshaw-plugin.js')}}"></script>

  <!-- ================================================
Data Tables
================================================ -->
  <script src="{{asset('js/datatables/datatables.min.js')}}"></script>

  <!-- ================================================
Sweet Alert
================================================ -->
  <script src="{{asset('js/sweet-alert/sweet-alert.min.js')}}"></script>

  <!-- ================================================
Kode Alert
================================================ -->
  <script src="{{asset('js/kode-alert/main.js')}}"></script>

  <!-- ================================================
Gmaps
================================================ -->
  <!-- google maps api -->
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <!-- main file -->
  <script src="{{asset('js/gmaps/gmaps.js')}}"></script>
  <!-- demo codes -->
  <script src="{{asset('js/gmaps/gmaps-plugin.js')}}"></script>

  <!-- ================================================
jQuery UI
================================================ -->
  <script type="text/javascript" src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- ================================================
Moment.js
================================================ -->
  <script type="text/javascript" src="{{asset('js/moment/moment.min.js')}}"></script>

  <!-- ================================================
Full Calendar
================================================ -->
  <script type="text/javascript" src="{{asset('js/full-calendar/fullcalendar.js')}}"></script>

  <!-- ================================================
Bootstrap Date Range Picker
================================================ -->
  <script type="text/javascript" src="{{asset('js/date-range-picker/daterangepicker.js')}}"></script>


 </body>

</html>