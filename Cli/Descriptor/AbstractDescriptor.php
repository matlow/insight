<?php

/*
 * This file is part of the SensioLabsInsight package.
 *
 * (c) SensioLabs <contact@sensiolabs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SensioLabs\Insight\Cli\Descriptor;

use SensioLabs\Insight\Sdk\Model\Analysis;
use Symfony\Component\Console\Descriptor\DescriptorInterface;

abstract class AbstractDescriptor implements DescriptorInterface
{
    public function describe($object, array $options = array())
    {
        switch (true) {
            case $object instanceof Analysis:
                return $this->describeAnalysis($object, $options);
        }

        throw new \InvalidArgumentException(sprintf('Object of type "%s" is not describable.', get_class($object)));
    }

    abstract protected function describeAnalysis(Analysis $argument, array $options = array());
}
