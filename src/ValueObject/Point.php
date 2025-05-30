<?php

declare(strict_types=1);

namespace Answear\WideEyesBundle\ValueObject;

use Webmozart\Assert\Assert;

readonly class Point
{
    public function __construct(
        public float $x,
        public float $y,
    ) {
    }

    public static function fromArray(array $pointResponse): Point
    {
        Assert::notNull($pointResponse['x'] ?? null);
        Assert::notNull($pointResponse['y'] ?? null);

        return new self(
            (float) $pointResponse['x'],
            (float) $pointResponse['y']
        );
    }
}
