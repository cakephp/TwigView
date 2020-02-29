<?php
declare(strict_types=1);

/**
 * This file is part of TwigView.
 *
 ** (c) 2014 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cake\TwigView\Test\Event;

use Cake\TwigView\Event\EnvironmentConfigEvent;
use Cake\TwigView\Test\TestCase;

class EnvironmentConfigEventTest extends TestCase
{
    public function testCreate()
    {
        $config = [
            'foo' => 'bar',
        ];
        $event = EnvironmentConfigEvent::create($config);
        $this->assertEquals($config, $event->getConfig());
    }

    public function testSetConfig()
    {
        $event = EnvironmentConfigEvent::create([
            'foo' => 'bar',
            'beer' => 'crate',
            'baz' => [
                'oof' => 'rab',
                'foo' => 'bar',
            ],
        ]);
        $event->setConfig([
            'foo' => 'rab',
            'baz' => [
                'oof' => 'beer',
            ],
        ]);
        $this->assertEquals([
            'foo' => 'rab',
            'beer' => 'crate',
            'baz' => [
                'oof' => 'beer',
                'foo' => 'bar',
            ],
        ], $event->getConfig());
    }
}
