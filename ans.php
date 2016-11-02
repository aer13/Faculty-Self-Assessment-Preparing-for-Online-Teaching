<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('inc/head.php'); ?>
</head>
<body>
<div class=wrapper>
   <div class="container">
      <p class=lead>
      Hello, <?php echo $_REQUEST['firstname'] ?>. We have emailed your results
      to <?php echo $_REQUEST['email'] ?>, but here they are in a nutshell:
      </p>
      <div class="table-responsive misha">
      <table class="table-striped table-bordered table-hover table-condensed">
      <thead>
      <tr>
      <th>Q#</th>
      <th width=30%>Criterion</th>
      <th>Your Answer</th>
      <th>Points</th>
      <th width=50%>Feedback</th>
      </tr>
      </thead>
      <tbody>
<?php
      $j=1;
      for ( $i = 2; $i <= 4; $i ++ ) {
         foreach ( $ia[$i] as $key => $value ) {
            if ( substr ( $key, 0, 1 ) == 't' ) {
               $myvar[$j] = $value;
               $j ++;
            }
         }
      }

$i=1;

foreach ( $_REQUEST as $key => $value ) {
   if ( strpos ( $key, "answer" ) !== false ) {
      echo "<tr>\n";

      $qnum = filter_var ( $key, FILTER_SANITIZE_NUMBER_INT );
      $vnum = filter_var ( $value, FILTER_SANITIZE_NUMBER_INT );
      $qnum = $qnum - 2;

      $mystr = "\$answervar = \"q\" . $qnum . \"a\" . $vnum;";
      eval ( $mystr );
      $mystr = "\$answerpoints = \"q\" . $qnum . \"p\" . $vnum;";
      eval ( $mystr );
      $mystr = "\$generalvar = \"q\" . $qnum . \"gen\";";
      eval ( $mystr );

      echo "<td><small>" . $i . "</small></td>\n";
      echo "<td><small>" . $myvar[$i] . "</small></td>\n";
      echo "<td><small>" . $ia['radio'][($vnum-1)] . "</small></td>\n";
      echo "<td><small>" . $ia['feedback'][$answerpoints] . "</small></td>\n";

      // answer and general as paragraphs in the same column
      echo "<td><small>" . $ia['feedback'][$answervar] . "\n";
      echo "<br /><br />" . $ia['feedback'][$generalvar] . "</small></td>\n";

      echo "</tr>\n";
      $i++;
   }
}
?>
      </tbody>
      </table>
      </div>
<br />
<div class="panel panel-success">
<div class="panel-heading"><span class=h4>Thank You!</span></div>
<div class="panel-body"><span class="lead"><small>Thank you for participating in this self-assessment. The email you will receive will contain the full results. You may close this window when ready.</small></span></div>
</div>
   </div>
      <?php include('inc/footer.php'); ?>
</body>
</html>

<?php
$content = ob_get_clean();
echo $content;
$to      = '<' . $_REQUEST['email'] . '>';
$subject = $ia['email']['subject'];
$headers = 'From: "' . $ia['email']['fromname'] . '" <' . $ia['email']['fromaddress'] . '>' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

mail ( $to, $subject, $content, $headers );
?>

