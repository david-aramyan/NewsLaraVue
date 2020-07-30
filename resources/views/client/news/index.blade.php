@extends('layouts.app')

@section('appbar')
  <router-view name="appbar"></router-view>
@endsection

@section('main')
  <router-view :items="{{ $news }}"></router-view>
@endsection
