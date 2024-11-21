<?php

declare(strict_types=1);

namespace Answear\WideEyesBundle\ValueObject;

use Webmozart\Assert\Assert;

readonly class BoundingBox
{
    public function __construct(
        public float $x1,
        public float $y1,
        public float $x2,
        public float $y2,
    ) {
    }

    public static function fromArray(array $bboxResponse): BoundingBox
    {
        Assert::notNull($bboxResponse['x1'] ?? null);
        Assert::notNull($bboxResponse['y1'] ?? null);
        Assert::notNull($bboxResponse['x2'] ?? null);
        Assert::notNull($bboxResponse['y2'] ?? null);

        return new self(
            (float) $bboxResponse['x1'],
            (float) $bboxResponse['y1'],
            (float) $bboxResponse['x2'],
            (float) $bboxResponse['y2']
        );
    }
}
