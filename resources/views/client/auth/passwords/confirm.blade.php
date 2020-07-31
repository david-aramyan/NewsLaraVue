@extends('layouts.app')

@php
  $messages = json_encode($errors->isNotEmpty() ? $errors->getMessages(): new stdClass())
@endphp

@section('main')
  <router-view
    :errors="{{ $messages }}"
  ></router-view>
@endsection
