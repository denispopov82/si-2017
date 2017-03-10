<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:58
 */
$result = 0;
if (isset($_SESSION['test'])) {
    $answers = parse_ini_file('answers.ini');
    foreach ($_SESSION['test'] as $value) {
        if (array_key_exists($value, $answers)) {
            $result += (int)$answers[$value];
        }
    }
    session_destroy();
}
?>
<p>Your result is <?php echo  $result ?></p>
