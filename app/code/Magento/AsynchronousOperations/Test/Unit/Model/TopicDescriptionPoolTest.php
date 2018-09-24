<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\AsynchronousOperations\Test\Unit\Model;

use Magento\AsynchronousOperations\Model\TopicDescriptionPool;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

/**
 * Class StatusMapperTest
 */
class TopicDescriptionPoolTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\AsynchronousOperations\Model\TopicDescriptionPool
     */
    private $topicDescriptionPool;

    /**
     * @var array
     */
    private $testTopics = [
        'async.V1.test.topic1' => 'Test topic 1',
        'async.V1.test.topic2' => 'Test topic 2',
        'async.V1.test.topic3' => 'Test topic 3',
    ];

    protected function setUp()
    {
        $this->topicDescriptionPool = (new ObjectManager($this))->getObject(
            TopicDescriptionPool::class,
            [
                'descriptions' => $this->testTopics
            ]
        );
    }

    public function testGetDescriptionOnExistingValues()
    {
        foreach ($this->testTopics as $topic => $description) {
            self::assertEquals($description, $this->topicDescriptionPool->getDescription($topic));
        }
    }

    public function testGetDescriptionOnNonExistingValue()
    {
        self::assertNull($this->topicDescriptionPool->getDescription('non.existing.topic'));
    }
}
