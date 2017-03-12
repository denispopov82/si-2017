<?php
session_start();
$question = $answers = 0;
$title = '';

if (isset($_POST['question'])) {
    $question = (int) $_POST['question'];
    
    if ($_POST['question'] != 1) {
        $_SESSION['answers'][$question - 1] = $_POST['answer'];
        $answers = $_SESSION['answers'];
    }
}
$questions = parse_ini_file('questions.ini', true);
?>
    <h1><?php echo $title ?></h1>
<?php
if (count($questions) == count($answers)) {
    include 'result.php';
} elseif ($question > 0) {
    include 'question.php';
} else {
    include 'start.php';
}
