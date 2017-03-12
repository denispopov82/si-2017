<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:58
 */
$result = 0;
if (isset($_SESSION['answers'])) {
    $answers = parse_ini_file('answers.ini');
    foreach ($_SESSION['answers'] as $key => $value) {
        if ($value == $answers[$key]) {
            $result ++;
        }
    }
    session_destroy();
}
?>
<p>Your result is <?php echo  $result ?> from <?php echo count($questions) ?></p>
<p><a href="index.php">Start the test again</a></p>
