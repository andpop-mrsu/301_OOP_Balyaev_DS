<?php

namespace Task03;

use Task03\Student;

class StudentList
{
    private $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function get(int $index): ?Student
    {
        return $this->students[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->students);
    }

    public function store(string $fileName): void
    {
        file_put_contents($fileName, serialize($this->students));
    }

    public function load(string $fileName)
    {
        $data = file_get_contents($fileName);
        $this->students = unserialize($data);
    }
}