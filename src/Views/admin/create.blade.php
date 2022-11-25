@extends('Admin::layouts.card')
@section('title', __('Create Page'))
@section('card-body')
    @form([ \ToiLaDev\Page\Forms\PageForm::class, 'create'])
@endsection