@extends('layouts.app')

@php
  $status = session('status');
  $inputs = json_encode(session()->hasOldInput() ? session()->getOldInput() : new stdClass());
  $messages = json_encode($errors->isNotEmpty() ? $errors->getMessages(): new stdClass())
@endphp

@section('main')
  <router-view
    status="{{ $status }}"
    :errors="{{ $messages }}"
    :inputs="{{ $inputs }}"
  ></router-view>
@endsection
