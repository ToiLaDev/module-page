@extends('Admin::layouts.card')
@section('title', __('Edit Page'))
@section('card-body')
    @form([ \ToiLaDev\Page\Forms\PageForm::class, 'edit'], $page)
@endsection