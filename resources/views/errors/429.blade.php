@extends('errors::minimal')

@section('title', __('errors.429'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('429') : 429)
@section('message', __('errors.429'))
