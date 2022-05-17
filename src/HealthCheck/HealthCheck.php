<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\HealthCheck;

use Dbp\Relay\CoreBundle\HealthCheck\CheckInterface;
use Dbp\Relay\CoreBundle\HealthCheck\CheckOptions;
use Dbp\Relay\CoreBundle\HealthCheck\CheckResult;

class HealthCheck implements CheckInterface
{
    public function getName(): string
    {
        return 'example';
    }

    public function check(CheckOptions $options): array
    {
        $ok = new CheckResult('Check that everything is OK');
        $ok->set(CheckResult::STATUS_SUCCESS, 'everything OK');

        $failed = new CheckResult('Check something different');
        try {
            throw new \RuntimeException('oh no');
        } catch (\Throwable $e) {
            $failed->set(CheckResult::STATUS_FAILURE, $e->getMessage(), ['exception' => $e]);
        }

        return [$ok, $failed];
    }
}
