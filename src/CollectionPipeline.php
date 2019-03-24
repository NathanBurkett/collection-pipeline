<?php namespace NathanBurkett\Pipeline;

use Doctrine\Common\Collections\Collection;

/**
 * Class CollectionPipeline
 *
 * @package NathanBurkett\Pipeline
 */
class CollectionPipeline implements PipelineInterface
{
    /**
     * @var Step[]
     */
    protected $steps;

    /**
     * @var bool
     */
    protected $iterateOnEmpty = false;

    /**
     * CollectionPipeline constructor.
     *
     * @param Step ...$steps
     */
    public function __construct(Step ...$steps)
    {
        $this->steps = $steps;
    }

    /**
     * Run the pipeline's unit of work.
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function run(Collection $collection): Collection
    {
        foreach ($this->getSteps() as $step) {
            if ($this->skipStep($collection)) {
                continue;
            }

            $collection = $this->handleStep($collection, $step);
        }

        return $collection;
    }

    /**
     * @return array|Step[]
     */
    public function getSteps(): array
    {
        return $this->steps;
    }

    /**
     * @return bool
     */
    public function iterateOnEmpty(): bool
    {
        return $this->iterateOnEmpty;
    }

    /**
     * @param bool $iterateOnEmpty
     */
    public function setIterateOnEmpty(bool $iterateOnEmpty): void
    {
        $this->iterateOnEmpty = $iterateOnEmpty;
    }

    /**
     * @param Collection $collection
     * @param Step $step
     *
     * @return Collection
     */
    protected function handleStep(Collection $collection, $step): Collection
    {
        $step->before($this);
        $collection = $step->handle($collection);
        $step->after($this);

        return $collection;
    }

    /**
     * @param Collection $collection
     *
     * @return bool
     */
    protected function skipStep(Collection $collection): bool
    {
        return $collection->isEmpty() && $this->iterateOnEmpty();
    }
}
