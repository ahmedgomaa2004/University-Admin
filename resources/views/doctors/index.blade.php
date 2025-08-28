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
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Add doctor</li>
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
                <div class="card-header bg-info">
                <h3 class="card-title">Doctors list</h3>
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
                    <th>Salary</th>
                    <th style="width: 220px;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($doctors as $obj => $doctor )
                  <tr>
                    <td>{{ $obj + 1 }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->address }}</td>
                    <td>{{ $doctor->age }}</td>
                    <td>{{ $doctor->gender }}</td>
                    <td>{{ $doctor->salary }}</td>
                    <td class="d-flex">
                        <a href="{{ route("doctors.edit",$doctor->id) }}" class="btn btn-outline-info btn-sm" style="width: 47%;"> <ion-icon name="create" style="width: 15px;"></ion-icon> Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="width: 38%;" class="mx-1">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-outline-danger btn-sm " style="width: 100%;"> <ion-icon name="trash" style="width: 15px;"></ion-icon> Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
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