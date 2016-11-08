<div class="row setup-content" id="step-1">
   <div class="col-xs-2"> </div>
    <div class="col-xs-8">

      <?php include('warning.php'); ?>

      <!-- start INSTRUCTIONS box -->
      <div class="panel panel-info">
        <div class="panel-heading"><span class=h3>Instructions</span></div>
        <div class="panel-body">
          <span class="lead">
           <small>
             <?php echo $ia['instructions']['content']; ?>
           </small>
          </span>
        </div>
      </div>
      <!-- end INSTRUCTIONS box -->
      <button class="btn btn-primary nextBtn btn-lg pull-right"
              type="button">Next</button>
  </div>
</div>
