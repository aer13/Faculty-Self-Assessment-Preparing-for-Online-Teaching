<?php
    require_once "inc/functions.php";

    $ia = getQuestionData();
    $myvar = array();
    $body = array();
    $total = 0;
    $j = 1;

    for ($i = 2; $i <= 4; $i++) {
        foreach ($ia[$i] as $key => $value) {
            if (substr($key, 0, 1) == 't') {
                $myvar[$j] = $value;
                $j++;
            }
        }
    }

    $i = 1;

    foreach ($_REQUEST as $key => $value) {
        if (strpos($key, "answer") !== false) {
            $qnum = filter_var($key, FILTER_SANITIZE_NUMBER_INT);
            $vnum = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            $qnum = $qnum - 2;

            $answervar = "q{$qnum}a{$vnum}";
            $answerpoints = "q{$qnum}p{$vnum}";
            $generalvar = "q{$qnum}gen";

            $total += (int)$ia['feedback'][$answerpoints];

            $body[] = <<<EOF
    
            <td><small>{$i}</small></td>\n
            <td><small>{$myvar[$i]}</small></td>\n
            <td><small>{$ia['radio'][($vnum - 1)]}</small></td>\n
            <td><small>{$ia['feedback'][$answerpoints]}</small></td>\n
    
            
            <td><small>{$ia['feedback'][$answervar]}\n
            <br /><br />{$ia['feedback'][$generalvar]}</small></td>\n
EOF;
            $i++;
        }
    }

    if ($total >= 154) {
        $mLevel = 'success';
        $message = "Congratulations! According to the input you have provided, you appear to be well suited for online teaching. As you proceed towards your first online teaching experience, locate colleagues with online teaching experience, instructional designers, or other elearning professionals available at your institution for ongoing support.";
    } elseif ($total < 154 && $total >= 120) {
        $mLevel = 'warning';
        $message = "According to the input you have provided, you may be well suited for online teaching. There seems to be several areas that could present challenges for you in the online classroom. Please read through your results carefully and use the references provided for more information. It is advised that you consult with a colleague who has taught online, an instructional designer, or other elearning support persons available to you at your institution for additional help.";
    } else {
        $mLevel = 'danger';
        $message = "According to the input you have provided, there appears to be areas that could inhibit your success in the online classroom at this time. Please read through your results carefully and use the references provided for more information. Here are some strategies to improve your readiness to teach online:
        
        <ul>
            <li>Do some additional reading about teaching online</li>
            <li>Consult with colleagues who have taught online</li>
            <li>Take an online class, or observe an online class</li>
            <li>Talk to an instructional designer or elearning support person at your institution</li>
        </ul>";
    }

    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("inc/head.php") ?>
</head>
<body>
<div class=wrapper>
    <div class="container">
        <p class=lead>
            Hello, <?php echo $_REQUEST['firstname'] ?>. Here are your results:
        </p>

        <div class="alert alert-<?php echo $mLevel ?>">
            <p>
                <b>Total Points: <?php echo $total ?></b>
            </p>
            <?php echo $message; ?>
        </div>

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
                    <tr><?php echo implode('</tr><tr>', $body); ?></tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="panel panel-success">
            <div class="panel-heading"><span class=h4>Thank You!</span></div>
            <div class="panel-body"><span class="lead"><small>Thank you for participating in this self-assessment.</small></span>
            </div>
        </div>
    </div>
    <?php include('inc/footer.php'); ?>
</body>
</html>

<?php
$content = ob_get_clean();
echo $content;
$to = '<'.$_REQUEST['email'].'>';
$subject = $ia['email']['subject'];
$headers = 'From: "'.$ia['email']['fromname'].'" <'.$ia['email']['fromaddress'].'>'."\r\n".
    'MIME-Version: 1.0'."\r\n".
    'Content-Type: text/html; charset=ISO-8859-1'."\r\n";

mail($to, $subject, $content, $headers);
?>

