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
              <li class="breadcrumb-item active">Students list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header bg-success">
                <h3 class="card-title">Students list</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 20px;">#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Courses</th>
                    <th>hours</th>
                    <th>Doctor</th>
                    <th style="width: 220px;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $stu => $student )
                  <tr>
                    <td>{{ $stu + 1}}</td>
                    <td>{{ $student->sname }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->courses }}</td>
                    <td>{{ $student->total_hours }}</td>
                    <td>{{ $student->doctor_name }}</td>
                    <td  class="d-flex">
                        <a href="{{ route("students.edit",$student->s_id) }}" class="btn btn-outline-success btn-sm mx-2" style="width: 47%;"> <ion-icon name="create" style="width: 15px;"></ion-icon> Edit</a>
                        <form  action="{{ route('students.destroy', $student->s_id) }}" style="width: 38%;" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-outline-danger btn-sm w-100" > <ion-icon name="trash" ></ion-icon> Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
     </div>



@endsection