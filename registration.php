<?php
/**
 * Slova_HyvaElasticsuiteCompat — fixes for Hyva_SmileElasticsuite on Hyvä 1.5+.
 * Copyright © Slova. Licensed under the MIT License, see LICENSE.
 */

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Slova_HyvaElasticsuiteCompat',
    __DIR__
);
