<?php
/*
 * Copyright (C) 2024 Xibo Signage Ltd
 *
 * Xibo - Digital Signage - https://xibosignage.com
 *
 * This file is part of Xibo.
 *
 * Xibo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Xibo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Xibo.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Xibo\Service;

use Xibo\Helper\ApplicationState;
use Xibo\Helper\UploadHandler;

/**
 * Upload Service to scaffold an upload handler
 */
class UploadService
{
    /**
     * UploadService constructor.
     * @param string $uploadDir
     * @param array $settings
     * @param LogServiceInterface $logger
     * @param ApplicationState $state
     */
    public function __construct(
        private readonly string $uploadDir,
        private readonly array $settings,
        private readonly LogServiceInterface $logger,
        private readonly ApplicationState $state
    ) {
    }

    /**
     * Create a new upload handler
     * @return UploadHandler
     */
    public function createUploadHandler(): UploadHandler
    {
        // Blue imp requires an extra /
        $handler = new UploadHandler($this->uploadDir, $this->logger->getLoggerInterface(), $this->settings, false);

        return $handler->setState($this->state);
    }
}