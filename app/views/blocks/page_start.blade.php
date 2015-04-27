<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KAIROS
        <?php
            switch($page_name)
            {
                case "HOME":
                    echo "&nbsp;|&nbsp;Home";
                    break;
                case "SCHEDULES":
                    echo "&nbsp;|&nbsp;Schedules";
                    break;
                case "DATATOOLS":
                    echo "&nbsp;|&nbsp;Data Tools";
                    break;
                case "SETTINGS":
                    echo "&nbsp;|&nbsp;Settings";
                    break;
                default:
                    break;
            }
        ?>
    </title>

    <link rel="shortcut icon" href=" {{ URL::asset('assets/ico/favicon.png') }}">
    
    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">

    <!-- Prism syntax highlighter -->
    <link href="{{ URL::asset('assets/css/prism.css') }}"rel='stylesheet'>

    @if($page_name == "HOME")
        <!--example script-->
        <script src="{{URL::asset('assets/js/main.js')}}"></script>
    @endif

    <!-- FontAwesome CSS -->
    {{ FA::css() }}

    {{--
    <script>
    $(function(){
        $('.tabs').css('background-image', 'url({{ URL::asset("assets/images/tabs_1.png") }})');
        $('.tabs').css('background-image', 'url({{ URL::asset("assets/images/tabs_1.png") }})');
        $('.tabs').css('background-size', '100% 100%');
    });
    </script>
    --}}
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="{{$page_name == 'LANDING' ? 'landing' : 'custom'}}-body">