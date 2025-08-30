@extends("layout.master")


@section("content")
<div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Dashboard \</a></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $d_count[0]->COUNT }}</h3>

                <p>Doctors</p>
              </div>
              <div class="icon">
                <i class="ion"><ion-icon name="school-outline"></ion-icon></i>
              </div>
              <a href="{{route("doctors.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $s_count[0]->COUNT }}</h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion"><ion-icon name="people-outline"></ion-icon></i>
              </div>
              <a href="{{route("students.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>{{ $de_count[0]->COUNT }}</h3>

                <p>Department</p>
              </div>
              <div class="icon">
                <i class="ion"><ion-icon name="people-outline"></ion-icon></i>
              </div>
              <a href="{{route("departments.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $e_count[0]->COUNT }}</h3>

                <p>Employees</p>
              </div>
              <div class="icon">
                <i class="ion"><ion-icon name="grid-outline"></ion-icon></ion-icon></i>
              </div>
              <a href="{{ route("employees.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $c_count[0]->COUNT }}</h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="ion"><ion-icon name="book-outline"></ion-icon></ion-icon></i>
              </div>
              <a href="{{ route('courses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection