<?php

namespace MCEikens\T3Landscape\Renderer;

use MCEikens\T3Landscape\Manager\CacheManager;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;

class CacheHtmlRenderer
{
    public function __construct(
        private readonly CacheManager $cacheManager,
        private readonly ViewFactoryInterface $viewFactory,
    )
    {
    }

    public function render(string $templateName, string $cacheName, string $tag, mixed $data): void
    {
        $viewFactoryData = new ViewFactoryData(
            templateRootPaths: ['EXT:t3landscape/Resources/Private/Templates/Cache/Landscape/'],
            partialRootPaths: ['EXT:t3landscape/Resources/Private/Partials/Cache/Landscape/'],
            layoutRootPaths: ['EXT:t3landscape/Resources/Private/Layouts/Cache/Landscape/'],
        );

        $view = $this->viewFactory->create($viewFactoryData);
        $view->assign('data', $data);
        $rendered = $view->render($templateName);

        $this->cacheManager->setCache($cacheName, $rendered, [$tag]);
    }
}