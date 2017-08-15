<?php

use Nen\Validation\Validator\Email;
use Nen\Validation\ValidatorInterface;
use Nen\Validation\Values;
use Nen\Validation\ValuesInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailTest
 */
class EmailTest extends TestCase
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    protected function setUp(): void
    {
        $this->validator = new Email('email', 'Invalid');
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
            [new Values(['email' => 'email@mail.com'])],
            [new Values(['email' => 'xsat.xsat.xsat@mail.com'])],
            [new Values(['email' => 'xsat__xsat@mail.com'])],
            [new Values(['email' => '__xsat__@mail.com'])],
            [new Values(['email' => '1@mail.com'])],
            [new Values(['email' => '1@1.com'])],
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
            [new Values(['name' => 'email@mail.com'])],
            [new Values(['email' => 'email@@mail.com'])],
            [new Values(['email' => null])],
            [new Values(['email' => false])],
            [new Values(['email' => ''])],
            [new Values(['email' => 'ddd'])],
            [new Values(['email' => 1])],
            [new Values(['email' => 1.11])],
            [new Values(['email' => []])],
            [new Values(['email' => new stdClass()])],
        ];
    }
}
