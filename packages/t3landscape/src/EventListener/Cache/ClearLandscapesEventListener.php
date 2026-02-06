<?php

namespace MCEikens\T3Landscape\EventListener\Cache;

use MCEikens\T3Landscape\Manager\CacheManager;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Cache\Event\CacheFlushEvent;

#[AsEventListener(
    identifier: 'mceikens-t3landscape/clear-landscapes',
    event: CacheFlushEvent::class
)]
class ClearLandscapesEventListener
{
    public function __construct(
        private readonly CacheManager $cacheManager,
    ) {
    }

    public function __invoke(CacheFlushEvent $event): void
    {
        $this->cacheManager->clearCacheByTag('t3landscape');
    }
}