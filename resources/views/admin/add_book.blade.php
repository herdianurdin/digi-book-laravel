@extends('admin.layout.master', ['app_title' => 'Add Book'])
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Add Book</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href={{ route('admin')}}>Dashboard</a></div>
      <div class="breadcrumb-item active"><a href={{ route('manage_books')}}>Manage Books</a></div>
      <div class="breadcrumb-item">Add Book</div>
    </div>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label">Title :</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
              placeholder="Title">
          </div>
          <div class="form-group">
            <label class="form-label">Author :</label>
            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
              placeholder="Author">
          </div>
          <div class="form-group">
            <label class="form-label">Category :</label>
            <select class="form-control form-control-lg">
              <option value="1">Novel</option>
              <option value="2">Cergam </option>
              <option value="3">Komik</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Description :</label>
            <textarea class="form-control @error('description') is-invalid @enderror" style="height:150px"
              name="description" placeholder="Description"></textarea>
          </div>
          <div class="form-group">
            <label class="form-label">Cover :</label>
            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
          </div>
          <div class="form-group">
            <label class="form-label">File :</label>
            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Add Book</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection