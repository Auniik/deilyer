<?php

namespace App\Enums;

class OrderEnum
{
    public const INITIATED = 'initiated';
    public const PENDING = 'pending';
    public const ACCEPTED = 'accepted';
    public const ASSIGNED = 'assigned';
    public const PICKED = 'picked';
    public const ARRIVED = 'arrived';
    public const REJECTED = 'rejected';
    public const CANCELLED = 'cancelled';
    public const DELIVERED = 'delivered';
}
