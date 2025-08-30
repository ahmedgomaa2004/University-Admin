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
            <h1>Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Departments list</li>
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
                <div class="card-header bg-blue">
                <h3 class="card-title">Departments list</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 20px;">#</th>
                    <th>Name</th>
                    <th>Description</th>
                    @if ( Auth::user()->role == "admin" )
                    <th style="width: 220px;">Actions</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($departments as $obj => $department )
                  <tr>
                    <td>{{ $obj + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    @if ( Auth::user()->role == "admin" )
                    <td class="d-flex w-100">
                    <a href="{{ route('departments.edit',$department->id) }}" style="width: 54%;"
                      class="btn btn-block btn-outline-primary btn-sm mx-1" >
                      <ion-icon name="create" style="width: 15px;"></ion-icon> Edit
                    </a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="margin:0; width: 42%;">
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