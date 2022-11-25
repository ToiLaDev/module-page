<?php

namespace ToiLaDev\Page\Repositories;

use ToiLaDev\Repositories\Repository;
use ToiLaDev\Page\Models\Page;

class PageRepository extends Repository implements PageRepositoryImpl
{
    public function __construct(Page $model) {
        $this->_model = $model;
    }
}