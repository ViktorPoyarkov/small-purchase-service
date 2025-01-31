<?php

namespace App\Repository\Interfaces;

interface IAbstractRepository
{
    public function findOneById(int $id): object|null;
}