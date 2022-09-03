@extends('errors::minimal')

@section('title', __('errors.503'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('503') : 503)
@section('message', __('errors.503'))
