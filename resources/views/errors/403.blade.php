@extends('errors::minimal')

@section('title', __('errors.403'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('403') : 403)
@section('message', __($exception->getMessage() ?: __('errors.403')))
