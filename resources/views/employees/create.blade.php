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
            <h1>Employees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Add employees</li>
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

<form action="{{ route('employees.store')}}" method="post" class="card card-dark mx-3">
    @csrf
    
              <div class="card-header">
                <h3 class="card-title">Add Employees</h3>
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
                <label>Age</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="calendar-number-outline"></ion-icon></span>
                  </div>
                  <input type="number" name="age" value="" class="form-control" placeholder="age">
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
                <label>Gender</label>
                <div class="input-group mb-3">
                  
                  <select name="gender" class="form-control select2bs4" style="width: 100%;">
                      <option value="null" >select gender</option>
                      <option value="male"  >Male</option>
                      <option value="female" >Female</option>
                  </select>
                
                </div>

                <div class="form-group">
                <label>Manager</label>
                <select name="manager_id" class="form-control select2bs4" style="width: 100%;">
                      <option value="null" >select manager</option>
                    @foreach ($employees as $emp )
                    <option value="{{ $emp->id }}"  >{{ $emp->name }}</option>
                    @endforeach
                      
                      
                  </select>
                </div>

                <div class="form-group">
                <label>Department</label>
                <select name="department_id" class="form-control select2bs4" style="width: 100%;">
                      <option value="null" >select  department</option>
                      @foreach ($deparements as $depart )
                      <option value="{{ $depart->id }}"  >{{ $depart->name }}</option>
                      @endforeach
                      
                      
                  </select>
                </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-dark btn-lg" style="width: 150px;">Add</button>
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