<?php

use Task03\Student;
use Task03\StudentList;

function runTest()
{
    echo PHP_EOL .  "TEST1 (Тест toString)" . PHP_EOL;
    $student1 = new Student('Balyaev', 'Dmitriy', 'FMIIT', 3, '301');
    $correct =
        "Id: 1" . PHP_EOL .
        "Фамилия: Balyaev" . PHP_EOL .
        "Имя: Dmitriy" . PHP_EOL .
        "Факультет: FMIIT" . PHP_EOL .
        "Группа: 301" . PHP_EOL;

    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $student1 . PHP_EOL;
    if ($student1 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST2 (тест Интерфейса)" . PHP_EOL;
    $student1->setLastname('Ivanov')->setFaculty('IES');
    $correct =
        "Id: 1" . PHP_EOL .
        "Фамилия: Ivanov" . PHP_EOL .
        "Имя: Dmitriy" . PHP_EOL .
        "Факультет: IES" . PHP_EOL .
        "Группа: 301" . PHP_EOL;

    echo 'Ожидается: ' . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $student1 . PHP_EOL;
    if ($student1 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST3 (тест геттеров)" . PHP_EOL;
    $correct = 3;
    $result = $student1->getCourse();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 'Ivanov';
    $result = $student1->getLastname();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 'Dmitriy';
    $result = $student1->getFirstName();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 301;
    $result = $student1->getGroup();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $correct = 'IES';
    $result = $student1->getFaculty();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST4 (авто-инкремент)" . PHP_EOL;
    $correct = 1;
    $result = $student1->getId();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $student2 = new Student('Ivanova', 'Maria', 'IME', 1, 101);
    $correct = 2;
    $result = $student2->getId();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
    $student3 = new Student('Meshkova', 'Alina', 'BIO', 2, "102M");
    $correct = 3;
    $result = $student3->getId();
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $result" . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST5 (тестирование add/get StudentList)" .  PHP_EOL;
    $students = new StudentList();
    $students->add($student1);
    $correct = $student1;
    $result = $students->get(0);
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $result . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST6 (тест count StudentList)" .  PHP_EOL;
    $students->add($student2);
    $students->add($student3);
    $correct = 3;
    $result = $students->count();
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $result . PHP_EOL;
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST7 (тест get запрос несуществующего элемента)" .  PHP_EOL;
    $correct = null;
    $result = $students->get(12);
    if ($result == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST8 store" .  PHP_EOL;
    $students->store('Students.txt');
    if (file_exists('Students.txt')) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    echo PHP_EOL . "TEST9 load" .  PHP_EOL;
    $studentsNew = new StudentList();
    $studentsNew->load('Students.txt');
    if ($studentsNew->get(0) == $students->get(0)) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
}