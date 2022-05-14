@extends('admin.layout.master', ['app_title' => 'Manage Categories'])
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Categories</h1>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="input-group mb-2">
        <input type="text" class="form-control" placeholder="" aria-label="" />
      </div>
      <a href="#" class="btn btn-primary w-100">Add Category</a>
    </div>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Category List</h4>
        <div class="card-header-form">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
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
              <tr>
                <td>1</td>
                <td>Novel</td>
                <td>999</td>
                <td>
                  <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Komik</td>
                <td>999</td>
                <td>
                  <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Cergam</td>
                <td>999</td>
                <td>
                  <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection