<?php

namespace MCEikens\T3Landscape\Controller;

use MCEikens\T3Landscape\Manager\CacheManager;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class LandscapeController extends ActionController
{

    public function __construct(
        private readonly CacheManager $cacheManager,
    )
    {
    }

    public function indexAction(): ResponseInterface
    {
        $landscapeItemKeys = $this->cacheManager->getCache('landscape_items');
        $landscapes = [];

        foreach ($landscapeItemKeys as $landscapeItemKey) {
            $landscapes[] = $this->cacheManager->getCache($landscapeItemKey);
        }

        $this->view->assign('landscapes', $landscapes);
        return $this->htmlResponse();
    }
}