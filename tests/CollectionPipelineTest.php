<?php namespace NathanBurkett\Pipeline\Tests;

use Doctrine\Common\Collections\ArrayCollection;
use NathanBurkett\Pipeline\CollectionPipeline;
use PHPUnit\Framework\TestCase;

class CollectionPipelineTest extends TestCase
{
    public function testSteps()
    {
        $steps = [
            new StepDouble($this),
            new StepDouble($this),
            new StepDouble($this),
        ];

        $pipeline = new CollectionPipeline(...$steps);

        $this->assertEquals($steps, $pipeline->getSteps());
    }

    public function testRunWithoutIterationOnEmpty()
    {
        $collection = new ArrayCollection(['one', 'two', 'three']);

        $pipeline = new CollectionPipeline(
            new RemoveAllStepDouble(),
            new RemoveAllStepDouble()
        );

        $pipeline->setIterateOnEmpty(false);

        $actual = $pipeline->run($collection);

        $this->assertTrue($actual->isEmpty());
        $this->assertFalse($pipeline->iterateOnEmpty());
    }

    public function testRunWithIterationOnEmpty()
    {
        $collection = new ArrayCollection(['one', 'two', 'three']);

        $pipeline = new CollectionPipeline(
            new RemoveAllStepDouble(),
            new RemoveAllStepDouble()
        );

        $pipeline->setIterateOnEmpty(true);

        $actual = $pipeline->run($collection);

        $this->assertTrue($actual->isEmpty());
        $this->assertTrue($pipeline->iterateOnEmpty());
    }
}
