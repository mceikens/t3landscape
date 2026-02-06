<?php

namespace MCEikens\T3Landscape\Manager;

use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;

class CacheManager
{
    public function __construct(
        private readonly FrontendInterface $cache,
    )
    {
    }

    public function getCache(string $cacheKey): mixed
    {
        return $this->cache->get($cacheKey);
    }

    public function setCache(string $cacheKey, mixed $cacheData, array $tags): void
    {
        if ($this->cache->has($cacheKey) === false) {
            $this->cache->set($cacheKey, $cacheData, $tags);
        }
    }

    public function clearCacheByTag(string $tag): void
    {
        $this->cache->flushByTag($tag);
    }

    public function removeCache(string $cacheKey): void
    {
        if ($this->cache->has($cacheKey) === true) {
            $this->cache->remove($cacheKey);
        }
    }
}