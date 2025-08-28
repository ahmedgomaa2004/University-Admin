@extends("layout.master")


@section("content")
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Edit doctor</li>
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

<form action="{{ route('doctors.update', $doctors->id)}}" method="post" class="card card-info mx-3">
    @csrf
    @method("PUT")
              <div class="card-header">
                <h3 class="card-title">Edit Doctor</h3>
              </div>
              <div class="card-body">
                
                <div class="form-group">
                <label>Name</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="person-circle-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="name" value="{{ $doctors->name }}" class="form-control" placeholder="name">
                </div>
                </div>
                <div class="form-group">
                <label>Address</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="map-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="address" value="{{ $doctors->address }}" class="form-control" placeholder="address">
                </div>
                </div>
                <div class="form-group">
                <label>Age</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="calendar-number-outline"></ion-icon></span>
                  </div>
                  <input type="number" name="age" value="{{ $doctors->age }}" class="form-control" placeholder="age">
                </div>
                </div>

                <div class="form-group">
                <label>Salary</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="wallet-outline"></ion-icon></span>
                  </div>
                  <input type="number" name="salary" value="{{ $doctors->salary }}" class="form-control" placeholder="salary">
                </div>
                </div>
                
                <div class="form-group">
                  <label>Gender</label>
                  <select name="gender" class="form-control select2bs4" style="width: 100%;">
                    <option value="null" >gender</option>
                    <option value="male" {{ $doctors->gender == "male" ? "selected" : "" }} >Male</option>
                    <option value="female" {{ $doctors->gender == "female" ? "selected" : "" }} >Female</option>
                  </select>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-info btn-lg" style="width: 150px;">Update</button>
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