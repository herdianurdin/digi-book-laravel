@extends('public.layouts.master', ['app_title' => 'Category'])
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('filter_by_category') }}" class="mb-2" method="GET">
          <div class="input-group">
            <select id="category" class="form-control form-control-lg" name="category" required>
              <option value {{ $currentCategory===null ? 'selected' : '' }} disabled>Select category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $currentCategory==$category->id ? 'selected' : ''}}>{{
                $category->name }}</option>
              @endforeach
            </select>
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Filter</button>
            </div>
          </div>
        </form>
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