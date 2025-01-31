<?php

namespace App\DTO\Interfaces;

use Symfony\Component\HttpFoundation\Request;

interface ICommonDTO
{
    public static function fillFromRequest(Request $request): self;
}