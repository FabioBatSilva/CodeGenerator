<?php

namespace Wingu\OctopusCore\CodeGenerator\Tests\Unit\PHP\Annotation\Tags;

use Wingu\OctopusCore\CodeGenerator\PHP\Annotation\Tags\VarTag;
use Wingu\OctopusCore\CodeGenerator\Tests\Unit\TestCase;

class VarTagTest extends TestCase
{

    /**
     * Data provider.
     *
     * @return array
     */
    public function getDataForAnnotationDefinition()
    {
        return array(
            ['string', '@var string'],
            ['', '@var'],
            [' ', '@var'],
            [' array ', '@var array'],
            ['\DateTime ', '@var \DateTime'],
        );
    }

    /**
     * @dataProvider getDataForAnnotationDefinition
     */
    public function testVarTagGeneration($name, $expected)
    {
        $varTag = new VarTag($name, $expected);

        $this->assertSame($expected, $varTag->generate());
        $this->assertSame($expected, (string)$varTag);
    }
}