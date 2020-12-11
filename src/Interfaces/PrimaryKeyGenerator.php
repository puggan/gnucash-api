<?php

namespace Puggan\Gnucash\Interfaces;

trait PrimaryKeyGenerator
{
    abstract public function fixMissingPK(): void;
}
