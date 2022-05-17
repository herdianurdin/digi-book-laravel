@extends('public.layouts.master', ['app_title' => 'Home'])
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="hero text-white hero-bg-image hero-bg-parallax w-100"
        data-background="./assets/img/unsplash/andre-benz-1214056-unsplash.jpg">
        <div class="hero-inner">
          <h2>Welcome, Bro!</h2>
          <p class="lead">Let's find the best book for you!</p>
        </div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">List Book</h2>
      @if ($books->isEmpty())
      <p class="section-lead">Books don't exist!</p>
      @endif

      <div class="row">
        @foreach ($books as $book)
        @include('admin.components.card_book', $book)
        @endforeach
      </div>

      <div class="pagination justify-content-center">
        {{ $books->onEachSide(0)->links() }}
      </div>
    </div>
  </section>
</div>
@endsection