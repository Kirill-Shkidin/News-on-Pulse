@extends('layouts.app')

@section('title')
  @parent About
@endsection

@section('menu')
  @include('menu')
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
              <h1>О нас</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium autem commodi cupiditate distinctio,
                doloremque, doloribus eaque ipsum maxime modi nihil nulla placeat quaerat, quisquam quos rerum temporibus
                totam vero? Itaque.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

