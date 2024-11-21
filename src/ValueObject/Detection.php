<?php

declare(strict_types=1);

namespace Answear\WideEyesBundle\ValueObject;

use Webmozart\Assert\Assert;

readonly class Detection
{
    public function __construct(
        public string $label,
        public string $featureId,
        public ?string $gender,
        public BoundingBox $box,
        public Point $point,
    ) {
    }

    public static function fromArray(array $detectionResult): Detection
    {
        Assert::notNull($detectionResult['label'] ?? null);
        Assert::notNull($detectionResult['featureId'] ?? null);
        Assert::notNull($detectionResult['bbox'] ?? null);
        Assert::notNull($detectionResult['point'] ?? null);

        return new self(
            $detectionResult['label'],
            $detectionResult['featureId'],
            $detectionResult['gender'] ?? null,
            BoundingBox::fromArray($detectionResult['bbox']),
            Point::fromArray($detectionResult['point'])
        );
    }
}
