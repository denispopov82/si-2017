<?php
$connection = new MongoClient();
$dbname = $connection->selectDB('personal');
$workersCollection = $dbname->selectCollection('workers');

// insert
$workers = [
    [
        'name'     => 'Дима',
        'age'   => 23,
        'salary'   => 400,
    ],
    [
        'name'     => 'Петя',
        'age'   => 25,
        'salary'   => 500,
    ],
    [
        'name'     => 'Вася',
        'age'   => 23,
        'salary'   => 500,
    ],
    [
        'name'     => 'Коля',
        'age'   => 30,
        'salary'   => 1000,
    ],
    [
        'name'     => 'Иван',
        'age'   => 27,
        'salary'   => 500,
    ],
    [
        'name'     => 'Кирилл',
        'age'   => 28,
        'salary'   => 1000,
    ],
];
//foreach ($workers as $worker) {
//    $worker['created_at'] = new MongoDate();
//    $workersCollection->insert($worker);
//}

$cursor = $workersCollection->find();
$cursor->sort(array('salary' => -1));
// read
foreach ($cursor as $worker) {
    printf(
        'id: %s, name: %s, age: %d, salary: %d<br />',
        $worker['_id']->__toString(), $worker['name'], $worker['age'], $worker['salary']
    );
}
echo '<br>';
echo '<br>';

$id = '58dba9ab85737e255155c45f';
$workersCollection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array('salary' => 1500))
);

foreach ($cursor as $worker) {
    printf(
        'id: %s, name: %s, age: %d, salary: %d<br />',
        $worker['_id']->__toString(), $worker['name'], $worker['age'], $worker['salary']
    );
}
