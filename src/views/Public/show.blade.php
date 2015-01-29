@extends('core::Public/Base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>{{ $page->title }}</h2>
      <p><small><i class="fa fa-clock-o"></i> {{ $page->created_at->format('jS F Y') }}</small></p>
      <blockquote>{{ $page->excerpt }}</blockquote>
      {!! $page->content !!}
    </div>
  </div>
</div>
@stop