<?php namespace NathanBurkett\Pipeline;

use Doctrine\Common\Collections\Collection;

interface PipelineInterface
{
    /**
     * Run the pipeline's unit of work.
     * @param Collection $collection
     * @return Collection
     */
    public function run(Collection $collection): Collection;

    /**
     * @return array|Step[]
     */
    public function getSteps(): array;

    /**
     * @return bool
     */
    public function iterateOnEmpty(): bool;

    /**
     * @param bool $iterateOnEmpty
     */
    public function setIterateOnEmpty(bool $iterateOnEmpty): void;
}
