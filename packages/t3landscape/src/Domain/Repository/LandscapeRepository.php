<?php

namespace MCEikens\T3Landscape\Domain\Repository;

use MCEikens\T3Landscape\Domain\Model\Landscape;
use TYPO3\CMS\Extbase\Persistence\Repository;

class LandscapeRepository extends Repository
{

    /**
     * @return array<Landscape>
     */
    public function findAllIgnoringPid(): array
    {
        $query = $this->createQuery();

        $querySettings = $query->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $query->setQuerySettings($querySettings);

        return $query->execute()->toArray();
    }
}