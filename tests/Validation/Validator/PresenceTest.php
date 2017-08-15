<?php

use Nen\Validation\Validator\Presence;
use Nen\Validation\ValidatorInterface;
use Nen\Validation\Values;
use Nen\Validation\ValuesInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class PresenceTest
 */
class PresenceTest extends TestCase
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    protected function setUp(): void
    {
        $this->validator = new Presence('value', 'Invalid');
    }

    /**
     * @param ValuesInterface $values
     *
     * @dataProvider validValues
     */
    public function testValid(ValuesInterface $values): void
    {
        $this->assertTrue($this->validator->validate($values));
    }

    /**
     * @return ValuesInterface[][]
     */
    public function validValues(): array
    {
        return [
            [new Values(['value' => 'Xsat'])],
            [new Values(['value' => 1])],
            [new Values(['value' => 1.11])],
            [new Values(['value' => true])],
            [new Values(['value' => false])],
            [new Values(['value' => 0])],
        ];
    }

    /**
     * @param ValuesInterface $values
     *
     * @dataProvider invalidValues
     */
    public function testInvalid(ValuesInterface $values): void
    {
        $this->assertFalse($this->validator->validate($values));
    }

    /**
     * @return ValuesInterface[][]
     */
    public function invalidValues(): array
    {
        return [
            [new Values([])],
            [new Values(['key' => 'key'])],
            [new Values(['value' => null])],
            [new Values(['value' => ''])],
            [new Values(['value' => []])],
        ];
    }
}
