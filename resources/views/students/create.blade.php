@extends("layout.master")


@section("content")

  @if(session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      Swal.fire({
          title: 'success!',
          text: "{{ session('success') }}",
          icon: 'success',
          confirmButtonText: 'OK'
      });
  </script>
  @endif

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Add student</li>
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

<form method="post" action="{{ route('students.store') }}" class="card card-info mx-3">
  @csrf
    
              <div class="card-header bg-success">
                <h3 class="card-title">Add student</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                <label>Name</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="person-circle-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="name" value="" class="form-control" placeholder="name">
                </div>
                </div>
                <div class="form-group">
                <label>Address</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="map-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="address" value="" class="form-control" placeholder="address">
                </div>
                </div>
                <div class="form-group">
                <label>Age</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="calendar-number-outline"></ion-icon></span>
                  </div>
                  <input type="number" name="age" value="" class="form-control" placeholder="age">
                </div>
                </div>

                <div class="form-group mt-4">
                <div class="card card-success card-outline">
                <div class="card-header">
                <h5 class="card-title">Courses</h5>
                </div>
                <div class="card-tools d-flex flex-wrap">
                  @foreach ($courses as $course)
                      <div class="custom-control custom-checkbox m-3">
                          <input 
                              class="custom-control-input" 
                              type="checkbox" 
                              id="course_{{ $course->id }}"
                              name="courses[]" 
                              value="{{ $course->id }}">
                              
                          <label for="course_{{ $course->id }}" class="custom-control-label">
                              {{ $course->name }}
                          </label>
                      </div>
                  @endforeach
                </div>
                </div>

                <div class="form-group">
                  <label>Doctor</label>
                  <select name="doctor_id" class="form-control select2bs4" style="width: 100%;">
                    <option >select doctor</option>
                    @foreach ($doctors as  $doctor)
                    <option value="{{ $doctor->id }}" >{{ $doctor->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Gender</label>
                  <select name="gender" class="form-control select2bs4" style="width: 100%;">
                    <option >gender</option>
                    <option value="male" >Male</option>
                    <option value="female" >Female</option>
                  </select>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-success btn-lg" style="width: 150px;">Add</button>
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