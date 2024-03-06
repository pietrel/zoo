<?php

namespace Pietrel\Zoo\Concerns;

trait FurMaintenance
{
    public bool $furCombed;

    public function combFur(): void
    {
        $this->furCombed = true;
        echo "Futro zwierzęcia zostało wyczesane\n";
    }
}
