<!doctype html>
<html lang="en">

<head>
  <title>BUMI MAS</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
         BUMI MAS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="javascript:void(0)">
              <i class="material-icons">dashboard</i>
              <p>Tabel Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
              <i class="material-icons">dashboard</i>
              <p>Tabel Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
              <i class="material-icons">dashboard</i>
              <p>Tabel Gallery New Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
              <i class="material-icons">dashboard</i>
              <p>Tabel User</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
              <div class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user mr-3"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> Log Out</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </div>
                     </div>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('alert-success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                    </div>
                  @endif
                <a href="/product_create" class="btn btn-danger btn-round">
                <i class="material-icons">add</i>
                Add New Data</a>
                <p>&nbsp</p>
              <div class="card">
                <div class="card-header card-header-rose">
                  <p class="card-category"> Berisi data tabel product </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                         <tr>
                            <th>ID</th>
                            <th>Category Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Weight</th>
                            <th>Product Store</th>
                            <th>Product Description</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $datas)
                            <tr>
                                <td>{{ $datas->product_id }}</td>
                                <td>{{ $datas->category_id }}</td>
                                <td>{{$datas->product_name}}</td>
                                <td>{{ $datas->product_price }}</td>
                                <td>{{$datas->product_weight}}</td>
                                <td>{{$datas->product_store}}</td>
                                <td>{{ $datas->product_description }}</td>
                                <td><img width="150px" src="{{ url('/assets/img/'.$datas->product_image) }}"></td>
                                <td>
                                  <form action="{{ route('product.destroy', $datas->product_id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('product.edit',$datas->product_id) }}" class=" btn btn-sm btn-info">
                                      <i class="material-icons">edit</i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure Want To Delete This Data?')">
                                      <i class="material-icons">delete</i> </a>
                                    </button>
                                  </form>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>     
                    </table>
                  </div>
                </div>
              </div>
            </div>

    </div>
  </div>
  <!--   Core JS Files   -->

</body>

</html>