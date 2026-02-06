<?php
declare(strict_types=1);

namespace MCEikens\T3Landscape\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Author extends AbstractEntity
{
    protected string $name = '';

    /** @var ObjectStorage<Landscape> */
    protected ObjectStorage $landscapes;

    public function __construct()
    {
        $this->landscapes = new ObjectStorage();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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