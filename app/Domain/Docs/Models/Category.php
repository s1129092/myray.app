<?php

namespace App\Domain\Docs\Models;

use App\Domain\Docs\Sheets\DocsPage;
use Illuminate\Support\Collection;

class Category
{
    // @var Collection<string, Category>
    public Collection $subCategories;

    public Collection $pages;

    public int $weight = 99;

    public string $title = '<no title>';

    public function __construct() {
        $this->subCategories = new Collection();
        $this->pages = new Collection();
    }

    public function childCategory(string $key): Category
    {
        if (! $this->subCategories->has($key)) {
            $this->subCategories->put($key, new Category());
        }

        return $this->subCategories->get($key);
    }

    public function sortCategories(): void
    {
        $this->subCategories = $this->subCategories->sortBy('weight');
        $this->pages = $this->pages->sortBy('weight');

        foreach ($this->subCategories as $subCategory) {
            $subCategory->sortCategories();
        }
    }

    public function firstPage(): ?DocsPage
    {
        if ($this->pages->count() > 0) {
            return $this->pages->first();
        }

        /** @var Category $subCategory */
        $subCategory = $this->subCategories->first();

        return $subCategory->firstPage();
    }
}
