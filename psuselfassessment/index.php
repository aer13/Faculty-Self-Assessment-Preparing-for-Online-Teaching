<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('inc/head.php'); ?>
</head>
<body>
   <?php include ( 'inc/navbar.php' ); ?>
   <div class="container">
      <?php include ('inc/wizard.php'); ?>
      <form role="form" action="ans.php" method="post" data-toggle=validator>
         <?php include ( 'inc/step1.php' ); ?>
         <?php include ( 'inc/step2.php' ); ?>
         <?php include ( 'inc/cat1.php' );  ?>
         <?php include ( 'inc/cat2.php' );  ?>
         <?php include ( 'inc/cat3.php' );  ?>
         <div class="row setup-content" id="step-33">
            <div class="col-xs-6 col-md-offset-3">
               <div class="col-md-12">
                  <div class="panel panel-success">
                     <div class="panel-heading"><span class=h3>
                        <?php echo $ia['finalstep']['header']; ?>
                     </span></div>
                     <div class="panel-body">
                        <span class="lead">
                           <small>
                              <?php echo $ia['finalstep']['body']; ?>
                           </small>
                        </span>
                     </div>
                  </div>
                  <button class="btn btn-success nextBtn btn-md pull-right"
                          type="submit">Finish</button>
               </div>
            </div>
         </div>
      </form>
   </div>

   <?php include ( 'inc/footer.php' ); ?>

   <script>
   <?php include ( 'js/wizard.js' ); ?>
   </script>
</body>
</html>
