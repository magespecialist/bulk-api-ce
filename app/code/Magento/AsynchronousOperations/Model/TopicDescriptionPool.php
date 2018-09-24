<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\AsynchronousOperations\Model;

/**
 * Bulk operations description pool
 */
class TopicDescriptionPool
{
    /**
     * @var array
     */
    private $descriptions;

    /**
     * BulkDescriptionPool constructor
     *
     * @param array $descriptions
     */
    public function __construct(
        $descriptions = []
    ) {
        $this->descriptions = $descriptions;
    }

    /**
     * Get description for a given topic name
     *
     * @param string $topicName
     * @return string|null
     */
    public function getDescription($topicName)
    {
        if (isset($this->descriptions[$topicName])) {
            return $this->descriptions[$topicName];
        }

        return null;
    }
}
