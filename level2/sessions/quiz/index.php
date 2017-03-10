<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:46
 */
session_start();
if (!empty($_SESSION['test']) && !empty($_POST['question'])) {
    // first quiz start
    $question = 0;
    $title = 'Start test';
} else {
    // create session variable test which contains questions list
    if ($_POST['question'] != 1) {
        $_SESSION['test'][] = $_POST['answer'];
    }
    $question = $_POST['answer'];
    $title = $_POST['title'];
}
?>
<h1><?php echo $title ?></h1>
<?php
switch ($question) {
    case 0: include 'start.php'; break;
    case 1: include 'question1.php'; break;
    case 2: include 'question2.php'; break;
    case 3: include 'question3.php'; break;
    default: include 'result.php';
}
?>