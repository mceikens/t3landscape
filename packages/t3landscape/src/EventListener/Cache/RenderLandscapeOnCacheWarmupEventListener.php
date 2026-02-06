<?php

namespace MCEikens\T3Landscape\EventListener\Cache;

use MCEikens\T3Landscape\Domain\Repository\LandscapeRepository;
use MCEikens\T3Landscape\Manager\CacheManager;
use MCEikens\T3Landscape\Renderer\CacheHtmlRenderer;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Cache\Event\CacheWarmupEvent;

#[AsEventListener(
    identifier: 'mceikens-t3landscape/render-landscapes-on-warmup',
    event: CacheWarmupEvent::class
)]
class RenderLandscapeOnCacheWarmupEventListener
{
    public function __construct(
        private readonly CacheHtmlRenderer $cacheHtmlRenderer,
        private readonly CacheManager $cacheManager,
        private readonly LandscapeRepository $landscapeRepository,
    ) {
    }

    public function __invoke(CacheWarmupEvent $event): void
    {
        $landscapesCacheKeys = [];

        $landscapes = $this->landscapeRepository->findAllIgnoringPid();
        foreach ($landscapes as $landscape) {

            $landscapeCacheKey = 'landscape_item_' . $landscape->getUid();
            $this->cacheHtmlRenderer->render('Item.html', $landscapeCacheKey, 't3landscape', $landscape);

            $landscapesCacheKeys[] = $landscapeCacheKey;
        }

        $this->cacheManager->setCache('landscape_items', $landscapesCacheKeys, ['t3landscape']);
    }
}