@section('header')

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ebba</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/app.css">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Angular JS -->
    <script src="../js/angular-1.4.0-beta.5/angular.min.js"></script>
    <script src="../js/angular-1.4.0-beta.5/angular-route.min.js"></script>
    <script href="../js/angular-1.4.0-beta.5/angular.animate.js"></script>
      
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });

</script>

    <style type="text/css">
    .wborder{
        border:0px solid black;
    }
    .product{
        background-color: green;

    }
    .5Liter{
        background-color: #FFF !important;

    }
    </style>

</head>

<body>

    <div id="wrapper">
    @if (!Auth::guest())
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="menuheader">
                    <a class="navbar-brand header-title navbutton" id="navbutton" href="#"><i class="glyphicon glyphicon-menu-hamburger"></i></a> <h1 class="titleheader"><a href="/hem">Ebba</a></h1>
                </div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                    <ul class="nav-top-right">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::user()->fname}}</a>
                        </li>
                        @if(Auth::user()->isAdmin == 1)
                            
                        <li><a href="{{URL::route('adminpanel')}}"><i class="fa fa-gear fa-fw"></i> Adminpanel</a>
                        </li>
                        @endif

                        <li class="divider"></li>
                        <li><a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logga ut</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                    <!-- LAGER -->
                        <li class="nvbg1head">
                            <div class="title">
                            <p>Lager</p>
                            <i class="fa fa-home fa-fw"></i>
                            </div>
                        </li>    
                        <li class="nvbg1">
                            <a href="{{URL::route('inleverans')}}">
                            <p>&nbsp;&nbsp;&nbsp;Inleverans</p>
                            <i class="fa fa-long-arrow-right fa-fw"></i>
                            </a>
                        </li>
                        <li class="nvbg1">
                            <a href="{{URL::route('packabil')}}">
                            <p>&nbsp;&nbsp;&nbsp;Packa bil</p>
                            <i class="fa fa-truck fa-fw"></i>
                            </a>
                        </li>
                        <li class="nvbg1">
                            <a href="{{URL::route('saldo')}}">
                            <p>&nbsp;&nbsp;&nbsp;Saldo</p>
                            <i class="fa fa-bar-chart-o fa-fw"></i>
                            </a>
                        </li>
                    <!-- CHAUFFÖR -->
                        <li class="nvbg2head">
                            <div class="title">
                            <p>Chaufför</p>
                            <i class="fa fa-truck fa-fw"></i>
                            </div>
                        </li>
                        <li class="nvbg2">    
                            <a href="{{URL::route('rundor')}}">
                            <p>&nbsp;&nbsp;&nbsp;Runda</p>
                            <i class="fa fa-rotate-right fa-fw"></i>
                            </a>
                        </li>
                        <li class="nvbg2">
                            <a href="{{URL::route('kunder')}}">
                            <p>&nbsp;&nbsp;&nbsp;Kunder</p>
                            <i class="fa fa-group fa-fw"></i>
                            </a>
                        </li>
                    <!-- OM EBBA -->
                        <li class="nvbg3head">
                            <div class="title">
                            <p>Om Ebba</p>
                            <i class="fa fa-th fa-fw"></i>
                            </div>
                        </li>
                        <li class="nvbg3">
                            <a href="{{URL::route('omebba')}}">
                            <p>&nbsp;&nbsp;&nbsp;Om ebba</p>
                            <i class="fa fa-question-circle fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    @endif

@yield('content')

@section('footer')
    </div>
    <!-- /#wrapper -->
  

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
   <!-- <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>-->
    
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">

            $(document).ready(function() {
                $('#dataTables1, #dataTables2, #dataTables3, #dataTables4').dataTable( {
                    "oLanguage": 
                    /**
                     * Swedish translation
                     * @name Swedish
                     * @anchor Swedish
                     * @author <a href="http://www.kmmtiming.se/">Kristoffer Karlström</a>
                     */

                    {
                      "sEmptyTable": "Tabellen innehåller ingen data",
                      "sInfo": "Visar _START_ till _END_ av totalt _TOTAL_ rader",
                      "sInfoEmpty": "Visar 0 till 0 av totalt 0 rader",
                      "sInfoFiltered": "(filtrerade från totalt _MAX_ rader)",
                      "sInfoPostFix": "",
                      "sInfoThousands": " ",
                      "sLengthMenu": "Visa _MENU_ rader",
                      "sLoadingRecords": "Laddar...",
                      "sProcessing": "Bearbetar...",
                      "sSearch": "Sök:",
                      "sZeroRecords": "Hittade inga matchande resultat",
                      "oPaginate": {
                        "sFirst": "Första",
                        "sLast": "Sista",
                        "sNext": "Nästa",
                        "sPrevious": "Föregående"
                      },
                      "oAria": {
                        "sSortAscending": ": aktivera för att sortera kolumnen i stigande ordning",
                        "sSortDescending": ": aktivera för att sortera kolumnen i fallande ordning"
                      }
                    }

                } );

            } );
        </script>

    <script type="text/javascript">
    $(document).ready(function() {
    var dataTable = $('#dataTables1').dataTable();
    $("#dbox > li").click( function () {
            var choosedFilter = $(this).data('text');
            //var choosedString = choosedFilter.join("|");
            dataTable.fnFilter(choosedFilter,3,true,false);
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
    var dataTable = $('#dataTables2').dataTable();
    $("#dbox > li").click( function () {
            var choosedFilter = $(this).data('text');
            //var choosedString = choosedFilter.join("|");
            dataTable.fnFilter(choosedFilter,3,true,false);
        });
    });
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
    var dataTable = $('#dataTables3').dataTable();
    $("#dbox > li").click( function () {
            var choosedFilter = $(this).data('text');
            //var choosedString = choosedFilter.join("|");
            dataTable.fnFilter(choosedFilter,3,true,false);
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
    var dataTable = $('#dataTables4').dataTable();
        $("#dbox > li").click( function () {
            var choosedFilter = $(this).data('text');
            //var choosedString = choosedFilter.join("|");
            dataTable.fnFilter(choosedFilter,3,true,false);
        });
    });

    </script>

    <script type="text/javascript">
    // $(document).ready(function(){
    //     $('.lager').on('click', function() {
    //         $('.filtrera').click();
    //     });
    // });
    // </script>

    <script type="text/javascript">
    $( "#navbutton" ).on( "click", function() {
        if ($('.sidebar').hasClass('nav-show')) {
            $('.sidebar').removeClass('nav-show');
            $("#page-wrapper").css("margin-left","150px");
            
        } else {
            $('.sidebar').addClass('nav-show');
            $("#page-wrapper").css("margin-left","60px");
        }
    });
    </script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <!-- jQuery   DENNA FÖRSTÖR SIGNERINGS SIDAN -->
    <script src="../bower_components/jquery/dist/jquery.min2.js"></script>
    <script type="text/javascript">
	var jquery.min2 = $.noConflict(true);
	</script>


</body>
</html>