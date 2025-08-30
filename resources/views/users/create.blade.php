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
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active">Add user</li>
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

<form action="{{ route('users.store')}}" method="post" class="card card-primary mx-3">
    @csrf
    
              <div class="card-header">
                <h3 class="card-title">Add Users</h3>
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
                <label>Email</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="mail-outline"></ion-icon></span>
                  </div>
                  <input type="email" name="email" value="" class="form-control" placeholder="email">
                </div>
                </div>

                <div class="form-group">
                <label>Password</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><ion-icon style="width: 23px; height: 23px;" name="lock-closed-outline"></ion-icon></span>
                  </div>
                  <input type="text" name="password" value="" class="form-control" placeholder="password">
                </div>
                </div>

                
                <div class="form-group">
                <label>role</label>
                <select name="role" class="form-control select2bs4" style="width: 100%;">
                      <option value="null" >select role</option>
                      <option value="admin">Admin</option>
                      <option value="subadmin">Sub Admin</option>
                      
                  </select>
                </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary btn-lg" style="width: 150px;">Add</button>
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