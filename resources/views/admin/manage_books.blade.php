@extends('admin.layout.master', ['app_title' => 'Manage Books'])
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Books</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href={{ route('admin')}}>Dashboard</a></div>
      <div class="breadcrumb-item">Manage Books</div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ $message }}
        </div>
      </div>
      @endif
      <form action="{{ route('search_book_admin') }}" class="mb-2" method="GET">
        <div class="input-group">
          <input name="search" id="search" type="text" class="form-control" placeholder="Search book..." />
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
      <a href={{ route('add_book') }} class="btn btn-primary w-100">Add Book</a>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Book List</h2>
    @if ($books->isEmpty())
    <p class="section-lead">Books don't exist!</p>
    @endif

    <div class="row">
      @foreach ($books as $book)
      @include('admin.components.card_book_manage', $book)
      @endforeach
    </div>
  </div>

  <div class="pagination justify-content-center">
    {{ $books->onEachSide(0)->links() }}
  </div>
</section>
@endsection