<?php
declare(strict_types=1);

namespace App\Tests;
use App\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testTwoInteger(): void
    {
        $function_output = new Math();
        $output = $function_output ->addTwoNmuber(25,63);
        $outPut = 88;
        $this->assertSame($outPut,$output);
    }
}