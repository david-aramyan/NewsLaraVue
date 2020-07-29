@extends('layouts.admin')

@php
  $inputs = json_encode(session()->hasOldInput() ? session()->getOldInput() : new stdClass());
  $messages = json_encode($errors->isNotEmpty() ? $errors->getMessages(): new stdClass())
@endphp

@section('main')
  <router-view
    :errors="{{ $messages }}"
    :inputs="{{ $inputs }}"
  ></router-view>
@endsection
