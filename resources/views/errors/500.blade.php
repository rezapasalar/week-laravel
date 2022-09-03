@extends('errors::minimal')

@section('title', __('errors.500'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('500') : 500)
@section('message', __('errors.500'))
