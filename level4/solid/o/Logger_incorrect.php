<?php

/**
 * Logger_incorrect
 * Проблема класса: если необходимо расширить возможности класса и добавить логирование в базу данных,
 * то тогда необходимо изменять файл, что не является хорошим вариантом.
 * Можно отнаследоваться от текущего класса и добавить лог в базу данных.
 */
class Logger_incorrect
{
    private function saveToFile($message)
    {
        // сохраняет лог в файл
    }

    public function logMessage($message)
    {
        $this->saveToFile($message);
    }
}
