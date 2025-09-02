@extends("layout.master")

@section("content")
<div class="content-wrapper">
  <!-- Welcome Bar -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <div class="welcome-section">
            <h1 class="welcome-title">Welcome back, {{ Auth::user()->name }} 👋</h1>
            <p class="welcome-subtitle text-muted">
              
            </p>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Quick Actions -->
  <section class="content">
    <div class="container-fluid">
      

     
      <!-- Statistics Cards -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $counts['doctors'] }}</h3>
              <p>Doctors</p>
            </div>
            <div class="icon">
              <i class="ion"><ion-icon name="school-outline"></ion-icon></i>
            </div>
            <a href="{{route("doctors.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $counts['students'] }}</h3>
              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion"><ion-icon name="people-outline"></ion-icon></i>
            </div>
            <a href="{{route("students.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ $counts['departments'] }}</h3>
              <p>Department</p>
            </div>
            <div class="icon">
              <i class="fas fa-building mr-2"></i>
            </div>
            <a href="{{route("departments.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $counts['employees'] }}</h3>
              <p>Employees</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tie mr-2"></i>
            </div>
            <a href="{{ route("employees.index") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-6">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>{{ $counts['courses'] }}</h3>
              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="ion"><ion-icon name="book-outline"></ion-icon></i>
            </div>
            <a href="{{ route('courses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>


      <div class="row mb-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bolt mr-2"></i>
                Quick Actions
              </h3>
            </div>
            <div class="card-body">
              <div style="justify-content: space-between;" class="row">
                
                <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                  <a href="{{ route('students.create') }}" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus mr-2"></i>
                    Add Student
                  </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                  <a href="{{ route('courses.create') }}" class="btn btn-success btn-block">
                    <i class="fas fa-book-plus mr-2"><ion-icon name="book"></ion-icon></i>
                    Add Course
                  </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                  <a href="{{ route('employees.create') }}" class="btn btn-warning btn-block">
                    <i class="fas fa-user-tie mr-2"></i>
                    Add Employee
                  </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                  <a href="{{ route('doctors.create') }}" class="btn btn-info btn-block">
                    <i class="fas fa-user-md mr-2"></i>
                    Add Doctor
                  </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                  <a href="{{ route('departments.create') }}" class="btn btn-secondary btn-block">
                    <i class="fas fa-building mr-2"></i>
                    Add Department
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="row mb-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <ion-icon name="bar-chart"></ion-icon>
          Student & Course Stats
        </h3>
      </div>
      <div class="card-body">
        <div class="row">
          @foreach ($c_s_count as $count)
          
          <div class="col-md-4 col-sm-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                <ion-icon name="book"></ion-icon>
              </span>
              <div class="info-box-content">
                <span class="info-box-text " style="font-weight: bold;">{{ $count->name }}</span>
                <span class="info-box-number">{{ $count->student_count }} <small>students</small></span>
              </div>
            </div>
          </div>
           @endforeach


        </div>
      </div>
    </div>
  </div>
</div>

                
                
                
              </div>
            </div>
          </div>
        </div>
      </div>

      

      
    </div>
  </section>




@endsection

