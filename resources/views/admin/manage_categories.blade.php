@extends('admin.layout.master', ['app_title' => 'Manage Categories'])
@section('content')

<section class="section">
  <div class="section-header">
    <h1>Manage Categories</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href={{ route('admin')}}>Dashboard</a></div>
      <div class="breadcrumb-item">Manage Categories</div>
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
      @if ($message = Session::get('failed'))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ $message }}
        </div>
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
      <form id="add-category" action="{{ route('store_category') }}" method="POST">
        @csrf
        <div class="input-group mb-2">
          <input onkeydown="return (event.keyCode!=13)" type="text" class="form-control" placeholder="Category name"
            id="name" name="name" />
        </div>
      </form>
      <button class="btn btn-primary w-100" data-toggle="modal" data-target="#modal-add-category">Add Category</button>
    </div>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Category List</h4>
        <div class="card-header-form">
          <form method="GET" action="{{ route('search_category') }}">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="search" id="search">
              <div class="input-group-btn">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Total Book</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $index => $category)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->books->count() }}</td>
                <td>
                  <form id="delete-category-{{ $category->id }}"
                    action="{{ route('destroy_category', $category->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>

                  <button data-toggle="modal" data-target="#modal-update-category-{{ $category->id }}"
                    class="btn btn-info"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger trigger--fire-modal-{{ $category->id }}"
                    data-confirm="Realy?|Are you sure you want to delete this category?"
                    data-confirm-yes="document.querySelector('#delete-category-{{ $category->id }}').submit();"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-category">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Really?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to add that data?</p>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();
        document.querySelector('#add-category').submit();">Save</button>
      </div>
    </div>
  </div>
</div>

@foreach ($categories as $category)
<div class="modal fade" tabindex="-1" role="dialog" id="modal-update-category-{{ $category->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Do you want to update category?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update-category-{{ $category->id }}" action="{{ route('update_category', $category->id) }}"
          method="POST">
          @csrf
          @method('PUT')
          <div class="input-group">
            <input onkeydown="return (event.keyCode!=13)" type="text" class="form-control" placeholder="Category name"
              id="name" name="name" value="{{ $category->name }}" />
          </div>
        </form>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();
        document.querySelector('#update-category-{{ $category->id }}').submit();">Save Change</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection