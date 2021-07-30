<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use PhpParser\Node\Stmt\Enum_;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends Enum_
{
    const SUPPERVISOR =  "SUPPERVISOR";
    const TRAINEE =  "TRAINEE";
}
