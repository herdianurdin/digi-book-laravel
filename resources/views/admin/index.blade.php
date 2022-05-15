@extends('admin.layout.master', ['app_title' => 'Dashboard'])
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12 col-sm-6 text-center">
        <div class="card">
          <div class="card-body">
            <h4>Books</h4>
            <h2>999</h2>
            <a href="{{ route('manage_books') }}">
              <h5 class="mb-0">Manage Books</h5>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 text-center">
        <div class="card">
          <div class="card-body">
            <h4>Categories</h4>
            <h2>999</h2>
            <a href="{{ route('manage_categories') }}">
              <h5 class="mb-0">Manage Categories</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h2 class="section-title">Book List</h2>

  <div class="section-body">
    <div class="row">
      @include('admin.components.card_book', [
      'title' => 'Title Book',
      'description' => 'Adipisci, quibusdam atque aperiam asperiores aliquam beatae repellat, perspiciatis iure officiis
      illum dolorum nostrum alias ratione praesentium distinctio enim doloribus ullam ab.',
      ])
      @include('admin.components.card_book', [
      'title' => 'Title Book',
      'description' => 'Adipisci, quibusdam atque aperiam asperiores aliquam beatae repellat, perspiciatis iure officiis
      illum dolorum nostrum alias ratione praesentium distinctio enim doloribus ullam ab.',
      ])
    </div>
  </div>
</section>
@endsection