@extends('layouts.admin')

@section('navbar')
  <router-view name="navbar"></router-view>
@endsection

@section('appbar')
  <router-view name="appbar"></router-view>
@endsection

@section('main')
  <router-view :news="{{ $news }}"></router-view>
@endsection
