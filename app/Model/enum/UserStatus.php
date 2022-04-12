<?php

namespace Model\enum;

enum UserStatus: int
{
    case ACTIVE = 1;
    case SUSPENDED = 2;
    case BLOCKED = 3;
}
