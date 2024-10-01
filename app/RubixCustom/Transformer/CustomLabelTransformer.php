<?php

namespace App\RubixCustom\Transformer;

use Rubix\ML\DataType;
use Rubix\ML\Persistable;
use Rubix\ML\Datasets\Dataset;
use Rubix\ML\Transformers\Stateful;
use Rubix\ML\Transformers\Transformer;
use Rubix\ML\Traits\AutotrackRevisions;
use Rubix\ML\Exceptions\RuntimeException;
use Rubix\ML\Specifications\SamplesAreCompatibleWithTransformer;

class CustomLabelTransformer implements Transformer, Stateful, Persistable
{
    use AutotrackRevisions;

    /**
     * The set of unique possible categories per feature column of the training set.
     *
     * @var array<int[]>|null
     */
    protected ?array $categories = null;

    /**
     * Fit the transformer to a dataset.
     *
     * @param Dataset $dataset
     */
    public function fit(Dataset $dataset): void
    {
        SamplesAreCompatibleWithTransformer::with($dataset, $this)->check();

        $this->categories = [];

        foreach ($dataset->featureTypes() as $column => $type) {
            if ($type->isCategorical()) {
                $values = $dataset->feature($column);

                $categories = array_values(array_unique($values));

                /** @var int[] $offsets */
                $offsets = array_flip($categories);

                $this->categories[$column] = $offsets;
            }
        }
    }

    /**
     * Return the data types that this transformer is compatible with.
     *
     * @internal
     *
     * @return list<\Rubix\ML\DataType>
     */
    public function compatibility(): array
    {
        return DataType::all();
    }

    /**
     * Transform the dataset in place.
     *
     * @param list<list<mixed>> $samples
     * @throws RuntimeException
     */
    public function transform(array &$samples): void {
        if ($this->categories === null) {
            throw new RuntimeException('Transformer has not been fitted.');
        }

        foreach ($samples as &$sample) {
            foreach ($this->categories as $column => $categories) {
                $category = $sample[$column];

                if (isset($categories[$category])) {
                    $sample[$column] = $categories[$category];
                } else {
                    $sample[$column] = end($categories);
                }
            }
        }
    }

    /**
     * Is the transformer fitted?
     *
     * @return bool
     */
    public function fitted(): bool
    {
        return isset($this->categories);
    }

    /**
     * Return the categories computed during fitting indexed by feature column.
     *
     * @return array<string[]>|null
     */
    public function __toString(): string
    {
        return "Custom Label Transformer";
    }
}
