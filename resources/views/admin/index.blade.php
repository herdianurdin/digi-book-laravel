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
            <h2>{{ $books->total() }}</h2>
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
            <h2>{{ $categories->count() }}</h2>
            <a href="{{ route('manage_categories') }}">
              <h5 class="mb-0">Manage Categories</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h2 class="section-title">Book List</h2>
  @if ($books->isEmpty())
  <p class="section-lead">Books don't exist!</p>
  @endif

  <div class="section-body">
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
@endsection