<?php namespace NathanBurkett\Pipeline\Tests;

use Doctrine\Common\Collections\Collection;
use NathanBurkett\Pipeline\Step;
use PHPUnit\Framework\TestCase;

class StepDouble extends Step
{
    /**
     * @var TestCase
     */
    private $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    /**
     * Handle the pipeline step.
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function handle(Collection $collection): Collection
    {
        $this->testCase->assertTrue(true);
    }
}
