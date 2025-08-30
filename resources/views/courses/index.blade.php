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
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Courses list</li>
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
                <div class="card-header bg-dark">
                <h3 class="card-title">Courses list</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 20px;">#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>Hours</th>
                    @if ( Auth::user()->role == "admin" )
                    <th style="width: 220px;">Actions</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($courses as $obj => $course )
                  <tr>
                    <td>{{ $obj + 1 }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->cost }}</td>
                    <td>{{ $course->hours }}</td>
                    @if ( Auth::user()->role == "admin" )
                    <td class="d-flex w-100">
                    <a href="{{ route('courses.edit',$course->id) }}" style="width: 54%;"
                      class="btn btn-outline-dark btn-sm me-2 edit-btn mx-1" >
                      <ion-icon name="create" style="width: 15px;"></ion-icon> Edit
                    </a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="margin:0; width: 42%;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm delete-btn mx-1" style="width: 100%;">
                          <ion-icon name="trash" style="width: 15px;"></ion-icon> Delete
                      </button>
                    </form>
                    </td>
                    @endif
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