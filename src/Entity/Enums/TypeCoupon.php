<?php

namespace App\Entity\Enums;

enum TypeCoupon: string
{
    case Percentage = 'percentage';
    case Sum = 'sum';
}