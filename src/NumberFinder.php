<?php

namespace App;

class NumberFinder
{
    private array $dataset;

    public function __construct(array $dataset)
    {
        $this->dataset = $dataset;
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber1(int $number): int
    {
        $closestSmallest = -1;

        foreach ($this->dataset as $datasetNumber) {
            if ($datasetNumber >= $number) {
                continue;
            }

            if ($closestSmallest === -1 || $datasetNumber > $closestSmallest) {
                $closestSmallest = $datasetNumber;
            }
        }

        return $closestSmallest;
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber2(int $number): int
    {
        $nextSmallest = null;

        foreach ($this->dataset as $value) {
            if ($value < $number && ($nextSmallest === null || $value > $nextSmallest)) {
                $nextSmallest = $value;
            }
        }

        return $nextSmallest ?? -1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber3(int $number): int
    {
        $filteredNumbers = array_filter($this->dataset, static function ($value) use ($number) {
            return $value < $number;
        });

        if (empty($filteredNumbers)) {
            return -1;
        }

        return max($filteredNumbers);
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber4(int $number): int
    {
        $dataset = $this->dataset;

        rsort($dataset);

        foreach ($dataset as $value) {
            if ($value < $number) {
                return $value;
            }
        }

        return -1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber5(int $number): int
    {
        $dataset = $this->dataset;

        rsort($dataset);

        $result = array_reduce($dataset, static function ($carry, $value) use ($number) {
            if ($value < $number && ($carry === null || $value > $carry)) {
                return $value;
            }
            return $carry;
        }, null);

        return $result ?? -1;
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber6(int $number): int
    {
        return array_reduce($this->dataset, static function ($carry, $value) use ($number) {
            return ($value < $number && ($carry === -1 || $value > $carry)) ? $value : $carry;
        }, -1);
    }

    /**
     * @param int $number
     * @return int
     */
    public function findNextSmallestNumber7(int $number): int
    {
        sort($this->dataset);

        return $this->findNextSmallestRecursive($this->dataset, $number, -1);
    }

    /**
     * @param array $dataset
     * @param int $number
     * @param int $currentSmallest
     * @return int
     */
    private function findNextSmallestRecursive(array $dataset, int $number, int $currentSmallest): int
    {
        if (empty($dataset)) {
            return $currentSmallest;
        }

        $value = array_shift($dataset);

        if ($value < $number && ($currentSmallest === -1 || $value > $currentSmallest)) {
            $currentSmallest = $value;
        }

        return $this->findNextSmallestRecursive($dataset, $number, $currentSmallest);
    }
}
