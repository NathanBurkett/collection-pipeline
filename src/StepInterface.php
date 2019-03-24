<?php namespace NathanBurkett\Pipeline;

use Doctrine\Common\Collections\Collection;

interface StepInterface
{
    /**
     * Handle the pipeline step.
     * @param Collection $collection
     * @return Collection
     */
    public function handle(Collection $collection): Collection;

    /**
     * Before the step occurs.
     * @param PipelineInterface $pipeline
     */
    public function before(PipelineInterface $pipeline);

    /**
     * After the step occurs.
     * @param PipelineInterface $pipeline
     */
    public function after(PipelineInterface $pipeline);
}
