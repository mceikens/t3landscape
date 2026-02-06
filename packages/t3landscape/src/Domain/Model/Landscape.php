<?php
declare(strict_types=1);

namespace MCEikens\T3Landscape\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Landscape extends AbstractEntity
{
    protected string $title = '';
    protected string $description = '';
    protected ?Author $author = null;

    /** @var ObjectStorage<Category> */
    protected ObjectStorage $categories;

    /** @var ObjectStorage<Link> */
    protected ObjectStorage $links;

    /** @var ObjectStorage<Keyword> */
    protected ObjectStorage $keywords;

    /** @var ObjectStorage<Dependency> */
    protected ObjectStorage $dependencies;

    public function __construct()
    {
        $this->categories = new ObjectStorage();
        $this->links = new ObjectStorage();
        $this->keywords = new ObjectStorage();
        $this->dependencies = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): void
    {
        $this->author = $author;
    }

    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    public function setLinks(ObjectStorage $links): void
    {
        $this->links = $links;
    }

    public function getKeywords(): ObjectStorage
    {
        return $this->keywords;
    }

    public function setKeywords(ObjectStorage $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getDependencies(): ObjectStorage
    {
        return $this->dependencies;
    }

    public function setDependencies(ObjectStorage $dependencies): void
    {
        $this->dependencies = $dependencies;
    }
}