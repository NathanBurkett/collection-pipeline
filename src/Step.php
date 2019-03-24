<?php namespace NathanBurkett\Pipeline;

/**
 * Class Step
 *
 * @package NathanBurkett\Pipeline
 */
abstract class Step implements StepInterface
{
    /**
     * Before the step occurs.
     *
     * @param PipelineInterface $pipeline
     */
    public function before(PipelineInterface $pipeline)
    {
    }

    /**
     * After the step occurs.
     *
     * @param PipelineInterface $pipeline
     */
    public function after(PipelineInterface $pipeline)
    {
    }
}
