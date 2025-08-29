@extends("layout.master")


@section("content")
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Edit course</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

<form action="{{ route('courses.update', $courses->id)}}" method="post" class="card card-dark mx-3">
    @csrf
    @method("PUT")
    
              <div class="card-header">
                <h3 class="card-title">Edit Course</h3>
              </div>
              <div class="card-body">
                
                <div class="form-group">
                <label>Name</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="book-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="name" value="{{ $courses->name }}" class="form-control" placeholder="name">
                </div>
                </div>
                <div class="form-group">
                <label>Description</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="reader-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="description" value="{{ $courses->description }}" class="form-control" placeholder="description">
                </div>
                </div>
                <div class="form-group">
                <label>Cost</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="card-outline"></ion-icon></span>
                  </div>
                  <input type="number" name="cost" value="{{ $courses->cost }}" class="form-control" placeholder="cost">
                </div>
                </div>

                <div class="form-group">
                <label>Hours</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="time-outline"></ion-icon></span>
                  </div>
                  <input type="number" name="hours" value="{{ $courses->hours }}" class="form-control" placeholder="hours">
                </div>
                </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-dark btn-lg" style="width: 150px;">Update</button>
                </div>

              </div>
              <!-- /.card-body -->
</form>
            </div>
            </div>
            </div>
            </section>
            </div>


@endsection