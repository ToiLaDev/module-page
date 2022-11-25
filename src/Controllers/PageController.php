<?php

namespace ToiLaDev\Page\Controllers;

use ToiLaDev\Controllers\Controller;
use ToiLaDev\Page\Models\Page;

class PageController extends Controller
{
    public function displayView(Page $page) {
        return moduleView('page' , [
            'page' => $page,
            'breadcrumbs' => [123]
        ]);
    }
}
