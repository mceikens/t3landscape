<?php

namespace MCEikens\T3Landscape\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Dependency extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    protected string $version = '';
    protected string $package = '';

    /** @var ObjectStorage<Landscape> */
    protected ObjectStorage $landscapes;

    public function __construct() {
        $this->landscapes = new ObjectStorage();
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getPackage(): string
    {
        return $this->package;
    }

    public function setPackage(string $package): void
    {
        $this->package = $package;
    }

    public function getLandscapes(): ObjectStorage
    {
        return $this->landscapes;
    }

    public function setLandscapes(ObjectStorage $landscapes): void
    {
        $this->landscapes = $landscapes;
    }
}