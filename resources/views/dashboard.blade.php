@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
@if (session('success'))
<div id="message" class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
      </div>
    </div>
  </div>
</div>
@endsection
