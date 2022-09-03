@extends('errors::minimal')

@section('title', __('errors.419'))
@section('code', app()->currentLocale() == 'fa' ? enToFa('419') : 419)
@section('message', __('errors.419'))
