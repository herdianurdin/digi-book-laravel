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
      <form class="mb-3">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" aria-label="" />
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">Search</button>
          </div>
        </div>
      </form>
      <a href={{ route('add_book') }} class="btn btn-primary w-100">Add Book</a>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      @include('admin.components.card_book_manage', [
      'title' => 'Title Book',
      'description' => 'Adipisci, quibusdam atque aperiam asperiores aliquam beatae repellat, perspiciatis iure officiis
      illum dolorum nostrum alias ratione praesentium distinctio enim doloribus ullam ab.',
      ])
      @include('admin.components.card_book_manage', [
      'title' => 'Title Book',
      'description' => 'Adipisci, quibusdam atque aperiam asperiores aliquam beatae repellat, perspiciatis iure officiis
      illum dolorum nostrum alias ratione praesentium distinctio enim doloribus ullam ab.',
      ])
    </div>
  </div>
</section>
@endsection