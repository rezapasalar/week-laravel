@extends('errors::minimal')

@section('title', __('errors.401'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('401') : 401)
@section('message', __('errors.401'))
