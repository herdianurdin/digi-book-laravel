@extends('admin.layout.master', ['app_title' => 'Edit Book'])
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Book</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href={{ route('admin')}}>Dashboard</a></div>
      <div class="breadcrumb-item active"><a href={{ route('manage_books')}}>Manage Books</a></div>
      <div class="breadcrumb-item">Edit Book</div>
    </div>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <form id="edit-book" action="{{ route('update_book', $book->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="form-label">Title :</label>
            <input value="{{ $book->title }}"
              onkeydown="if (event.keyCode === 13) { document.querySelector('#btn-edit-book').click() }" type="text"
              name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label">Author :</label>
            <input value="{{ $book->author }}"
              onkeydown="if (event.keyCode ===13) { document.querySelector('#btn-edit-book').click() }" type="text"
              name="author" class="form-control @error('author') is-invalid @enderror" placeholder="Author">
            @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label">Category :</label>
            <select class="form-control form-control-lg" name="category">
              @foreach ($categories as $category)
              <option {{ $category->id === $book->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{
                $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Description :</label>
            <textarea onkeydown="return (event.keyCode!=13)"
              class="form-control @error('description') is-invalid @enderror" style="height:150px" name="description"
              placeholder="Description">{{ $book->description }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label">Cover :</label>
            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
            @error('cover')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label">File :</label>
            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
            @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </form>
        <div class="form-group">
          <button id="btn-edit-book" class="btn btn-primary form-control" data-toggle="modal"
            data-target="#modal-edit-book">Update
            Book</button>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-book">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Really?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to update the book data?</p>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();
        document.querySelector('#edit-book').submit();">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection