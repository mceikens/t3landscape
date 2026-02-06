<?php
declare(strict_types=1);

namespace MCEikens\T3Landscape\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Link extends AbstractEntity
{
    protected string $name = '';
    protected string $url = '';
    protected int $type = 0;
    protected ?Landscape $landscape = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getLandscape(): ?Landscape
    {
        return $this->landscape;
    }

    public function setLandscape(?Landscape $landscape): void
    {
        $this->landscape = $landscape;
    }
}