@extends('errors::minimal')

@section('title', __('errors.404'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('404') : 404)
@section('message', __('errors.404'))
