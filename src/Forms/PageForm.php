<?php

namespace ToiLaDev\Page\Forms;

use Illuminate\Contracts\View\View;
use ToiLaDev\Forms\Base\Form;
use ToiLaDev\Forms\Base\Hide;
use ToiLaDev\Forms\Base\Image;
use ToiLaDev\Forms\Base\Quill;
use ToiLaDev\Forms\Base\Select;
use ToiLaDev\Forms\Base\Text;
use ToiLaDev\Forms\Base\Textarea;
use ToiLaDev\Page\Services\PageService;

class PageForm
{
    private PageService $pageService;

    public function __construct(PageService $pageService) {
        $this->pageService = $pageService;
    }

    public function create(): View
    {
        $form = new Form('add-page',
            route: 'admin.pages.store',
            wrap: 'col-12'
        );
        $form->add('Add New Page');
        $form->add(new Text('name', same: 'title', slug: 'slug'));
        $form->add(new Text('slug'));
        $form->add(new Text('title'));
        $form->add(new Textarea('excerpt'));
        $form->add(new Quill('body'));

        return $form->render();
    }

    public function edit($page): View
    {
        if (is_numeric($page)) {
            $page = $this->pageService->find($page);
        }
        if (empty($page)) {
            return '';
        } else {
            $form = new Form('add-post',
                action: route('admin.pages.update', $page->id),
                wrap: 'col-12',
                method: 'put'
            );
            $form->add('Edit Page');
            $form->add(new Hide('id', value: $page->id));
            $form->add(new Text('name', same: 'title', slug: 'slug', value: $page->name));
            $form->add(new Text('slug', value: $page->slug));
            $form->add(new Text('title', value: $page->title));
            $form->add(new Textarea('excerpt', value: $page->excerpt));
            $form->add(new Quill('body', value: $page->body));

            return $form->render();
        }
    }
}