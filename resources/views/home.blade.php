@extends('layouts.apps')

@section('content')

<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <ul class="breadcrumb">
  <li>
    <a href="{{ url('home') }}">Album</a>
  </li>
  <li>
    <a class="active">Home</a>
  </li>
</ul>
              <div class="row">
              @foreach($album as $key)
              <a href="{{ route('edit', $key->id) }}">
              <div class="col-sm-3"> 
              <div class="gallery-item first">
                <!-- START PREVIEW -->
                <img width="300px" height="300px" src="{{asset('foto/'.$key->img)}}" class="image-responsive-height">
                <!-- END PREVIEW -->
                <!-- START ITEM OVERLAY DESCRIPTION -->
                <div class="overlayer bottom-left full-width">
                  <div class="overlayer-wrapper item-info ">
                    <div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
                      <div class="">
                        <p class="pull-left bold text-white fs-14 p-t-10">{{ $key->name }}</p>
                        <h5 class="pull-right semi-bold text-white font-montserrat bold">{{ $key->artist }}</h5>
                        <div class="clearfix"></div>
                      </div>
                      <div class="m-t-10">
                      
                        <div class="inline m-l-10">
                          <!-- <p class="no-margin text-white fs-12">{{ $key->genre_music }}</p> -->
                        </div>
                   
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PRODUCT OVERLAY DESCRIPTION -->
              </div>
              </div>
              </a>
              @endforeach
              <!-- END GALLERY ITEM -->
              </div>
            <!-- END CATEGORY -->
          </div>

@endsection
