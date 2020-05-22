@include('admin/adminheader')
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/admin/admin') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/orders') }}">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/admin/products') }}">
              <span data-feather="shopping-cart"></span>
              Products <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/admin/customers') }}">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/admin/faq') }}">
              <span data-feather="bar-chart-2"></span>
              FAQ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    @include('flashmessage')

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <?php $x = 1;  ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Material</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all as $item)
                    <tr>
                        <td>{{$x}}</td>
                        <td>{{$item->product}}</td>
                        <td>{{$item->material}}</td>
                        <td>{{$item->description}}</td>
                        <td>Price: {{$item->price}} <br> Discount: {{$item->discount}}</td>
                        <td>{{$item->status}}</td>
                        <td> <a href="/product/{{$item->id}}/details" class="btn btn-sm btn-dark">Details</a> @if($item->status == 'Pending' || $item->status == 'Declined')<a href="/admin/product/{{$item->id}}/approve" class="btn btn-sm btn-success">Approve</a>@endif
                            @if($item->status == 'Pending' || $item->status == 'Approved')<a href="/admin/product/{{$item->id}}/decline" class="btn btn-sm btn-danger">Decline</a> @endif
                        </td>
                    </tr>
                    <?php $x++; ?>
                    @endforeach

                  </tbody>
                </table>
        </div>

      </div>

    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>

</body>
</html>



