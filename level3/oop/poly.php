<?php

abstract class Publication
{
    // определяем правило, что все публикации должны печататься, т.е. иметь метод do_print()
    abstract public function do_print();
}

class News extends Publication
{
    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo '<h4>Новость</h4>';
        //...
    }
}

class Announcement extends Publication
{
    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo '<h4>Объявление</h4>';
        //...
    }
}

class Article extends Publication
{
    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo '<h4>Статья</h4>';
        //...
    }
}

//Наполняем массив публикаций объектами, производными от Publication
$publications[] = new News();
$publications[] = new Announcement();
$publications[] = new Article();

foreach ($publications as $publication) {
    if ($publication instanceof Publication) { // Если мы работаем с наследниками Publication
        $publication->do_print(); // то мы можем смело выводить данные на печать
    } else {
        //исключение или обработка ошибки
    }
}
