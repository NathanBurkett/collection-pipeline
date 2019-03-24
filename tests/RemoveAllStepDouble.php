<?php namespace NathanBurkett\Pipeline\Tests;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use NathanBurkett\Pipeline\Step;

class RemoveAllStepDouble extends Step
{
    /**
     * Handle the pipeline step.
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function handle(Collection $collection): Collection
    {
        return new ArrayCollection();
    }
}
