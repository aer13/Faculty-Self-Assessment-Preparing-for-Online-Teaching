   <meta charset="utf-8">
   <title>Faculty Self-Assessment</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link href="css/steps.css" rel="stylesheet" type="text/css">
   <script src="js/jquery-latest.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.bootstrap.wizard.js"></script>
   <script src="js/validator.js"></script>
   <!-- HTML5 shim for IE backwards compatibility -->
      <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
<?php
   $datadir = "inc";
   $datafile = "a.ini";
   $datapath = $datadir . "/" . $datafile;
   $ia = parse_ini_file ( $datapath, true );
?>
