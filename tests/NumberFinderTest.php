<?php

namespace Tests;

use App\NumberFinder;
use PHPUnit\Framework\TestCase;

class NumberFinderTest extends TestCase
{
    public const DATASET = [3, 4, 6, 9, 10, 12, 14, 15, 17, 19, 21];

    public static function randomTestCases(): array
    {
        $testCases = [];

        for ($i = 0; $i < 10; $i++) {
            $randomInputIndex = array_rand(self::DATASET);
            $randomInput = self::DATASET[$randomInputIndex];

            // Find the next smallest number in the dataset
            $nextSmallestIndex = $randomInputIndex - 1;

            // If the input is the smallest, return -1
            if ($nextSmallestIndex < 0) {
                $randomExpected = -1;
            } else {
                $randomExpected = self::DATASET[$nextSmallestIndex];
            }

            $testCases[] = [$randomInput, $randomExpected];
        }

        return $testCases;
    }

    /**
     * @dataProvider randomTestCases
     */
    public function testFindNextSmallestNumber1($input, $expected): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals($expected, $finder->findNextSmallestNumber1($input));
    }

    public function testFindNextSmallestNumber2(): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals(10, $finder->findNextSmallestNumber2(11));
        $this->assertEquals(12, $finder->findNextSmallestNumber2(14));
        $this->assertEquals(21, $finder->findNextSmallestNumber2(25));
        $this->assertEquals(-1, $finder->findNextSmallestNumber2(2));
        $this->assertEquals(-1, $finder->findNextSmallestNumber2(-5));
    }

    /**
     * @dataProvider randomTestCases
     */
    public function testFindNextSmallestNumber3($input, $expected): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals($expected, $finder->findNextSmallestNumber3($input));
    }

    public function testFindNextSmallestNumber4(): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals(10, $finder->findNextSmallestNumber4(11));
        $this->assertEquals(12, $finder->findNextSmallestNumber4(14));
        $this->assertEquals(21, $finder->findNextSmallestNumber4(25));
        $this->assertEquals(-1, $finder->findNextSmallestNumber4(2));
        $this->assertEquals(-1, $finder->findNextSmallestNumber4(-5));
    }

    /**
     * @dataProvider randomTestCases
     */
    public function testFindNextSmallestNumber5($input, $expected): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals($expected, $finder->findNextSmallestNumber5($input));
    }

    public function testFindNextSmallestNumber6(): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals(10, $finder->findNextSmallestNumber6(11));
        $this->assertEquals(12, $finder->findNextSmallestNumber6(14));
        $this->assertEquals(21, $finder->findNextSmallestNumber6(25));
        $this->assertEquals(-1, $finder->findNextSmallestNumber6(2));
        $this->assertEquals(-1, $finder->findNextSmallestNumber6(-5));
    }

    /**
     * @dataProvider randomTestCases
     */
    public function testFindNextSmallestNumber7($input, $expected): void
    {
        $finder = new NumberFinder(self::DATASET);

        $this->assertEquals($expected, $finder->findNextSmallestNumber7($input));
    }
}
