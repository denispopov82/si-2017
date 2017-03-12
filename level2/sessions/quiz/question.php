<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 03.03.2017
 * Time: 23:57
 */
//session_start();
?>
<form action="index.php" method="post">
    Question: <?php echo $questions[$question]['title'] ?><br /><br />
    Answers:<br />
    <?php $answers = $questions[$question]['answers']; ?>
    <?php shuffle($answers) ?>
    <?php foreach ($answers as $item): ?>
    <?php echo $item ?> <input type="radio" name="answer" value="<?php echo $item ?>"><br />
    <?php endforeach; ?>
    <br /><br />
    <input type="hidden" name="question" value="<?php echo ++$question; ?>">
    <input type="hidden" name="title" value="Второй вопрос">
    <input type="submit">
</form>
