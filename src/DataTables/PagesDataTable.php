<?php

namespace ToiLaDev\Page\DataTables;

use Illuminate\Database\Eloquent\Builder;
use ToiLaDev\DataTables\Base\Acast;
use ToiLaDev\DataTables\Base\Date;
use ToiLaDev\DataTables\Base\Id;
use ToiLaDev\DataTables\Base\Normal;
use ToiLaDev\Page\Repositories\PageRepository;
use ToiLaDev\DataTables\Base\BaseDataTable;

class PagesDataTable extends BaseDataTable
{

    protected function columns(): array
    {
        return [
            new Id(),
            new Normal('name'),
            new Date('created_at'),
            new Acast()
        ];
    }

    public function query(PageRepository $repository): Builder
    {
        return $repository->datatable();
    }
}
