<div class="row setup-content" id="step-2">
   <div class="col-xs-2"> </div>
      <div class="col-xs-8">
         <?php include('warning.php'); ?>
         <div class="panel panel-info">
            <div class="panel-heading">
               <h3 align=center style="margin:10px 10px 15px 10px">
                  <small><strong>
                     <?php echo $ia['lheader']['body']; ?>
                  </strong></small>
               </h3>
            </div>
         </div>      
         <fieldset>                 
            <div class="row form-group">
               <legend><h4>Self-Assessment User Logon</legend>
            </div>               
            <div class="row form-group">
               <label for="firstname" class="col-xs-2 control-label"
                      tabindex=-1>First Name</label>
               <div class="col-xs-4">
                  <input type=text class=form-control
                         id=firstname name=firstname
                         placeholder="Enter First Name"
                         data-error="Please enter your First Name"
                         tabindex=1 autofocus required>
                  <div class="help-block with-errors"> </div>
               </div>                
            </div>               
            <div class="row form-group">
               <label for="lastname" class="col-xs-2 control-label"
                      tabindex=-1>Last Name</label>
               <div class="col-xs-4">
                  <input type=text class=form-control
                         id=lastname name=lastname
                         placeholder="Enter Last Name"
                         data-error="Please enter your Last Name"
                         tabindex=2 required>
                  <div class="help-block with-errors"> </div>
               </div>
            </div>
            <div class="row form-group">
               <label for="email" class="col-xs-2 control-label"
                      tabindex=-1>E-mail</label>
               <div class="col-xs-4">
                  <input type=email class=form-control
                         id=email name=email
                         placeholder="E-Mail Address"
                         data-error="Please enter Valid E-Mail Address"
                         tabindex=3 required>
                  <div class="help-block with-errors"> </div>
               </div>      
            </div>      
         </fieldset>                 
         <button class="btn btn-primary prevBtn btn-md pull-left"
                 type="button">Previous</button>
&nbsp; &nbsp;
         <button class="btn btn-primary nextBtn btn-md"
                 type="button">Next</button>
         </div>
      </div>
   </div>
</div>
