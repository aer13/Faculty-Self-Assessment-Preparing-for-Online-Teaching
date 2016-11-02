   <div class="hidden stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
         <?php
            // 33 steps:
            //
            // 1     - splash screen
            // 2     - login screen
            // 3-10  - category1
            // 11-21 - category2
            // 22-32 - category3
            // 33    - submit
            for ( $i = 1; $i <= 33; $i ++ ) {
         ?>
               <div class="stepwizard-step">
                 <a href="#step-<?php echo $i; ?>" role="button"
                    class="btn
                    <?php
                       if ( $i == 1 )
                          echo "btn-primary";
                       else
                          echo "btn-default";
                    ?>
                       btn-circle"
                    <?php
                       if ( $i > 1 ) {
                    ?>
                          disabled="disabled"
                    <?php
                       }
                    ?>
                    ><?php echo $i; ?></a>
                 <p><?php echo $i; ?></p>
               </div>
         <?php
            }
         ?>
      </div>
   </div>