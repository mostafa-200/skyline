<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SUPER_ADMIN()
 * @method static static ADMIN()
 */
final class DashboardUserRole extends Enum
{
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
}
