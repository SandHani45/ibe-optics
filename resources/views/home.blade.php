@extends('layouts.app')
@include('layouts.header')
@section('style')
<style>
  .smart-finder-pro{
    display: none;
  }
  .smart-finder-plus{
    display: none;
  }
</style>

@endsection
@section('content')
    <div class="container mt-5">
       <!-- Page Content -->
        <h4 class="mt-6 red text-center">Select an option to continue</h4> 
    </div>
    <!--  section two -->
    <div class="container">
          <div class="row mt-5">
            <div class="col-sm-5 col-md-5 col-lg-5 self-center offset-md-1">
              <div class="title-left text-center">
                <h2><a href="{{ route('smartfinder-plus') }}" class="font-weight-normal box-home highlite">SMARTFINDER PLUS</a></h2>
              </div>
            </div>
            <span class="boder-left"></span>
            <div class="col-sm-5 col-md-5 col-lg-5 self-center">
              <div class="title-right text-center">
                  <h2><a href="{{ route('smartfinder-pro') }}" class="font-weight-normal box-home highlite">SMARTFINDER PRO</a></h2>
              </div>
            </div>
          </div>
    </div>
@endsection
