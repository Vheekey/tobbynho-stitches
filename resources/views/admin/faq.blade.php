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
            <a class="nav-link" href="{{ url('/admin/products') }}">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/admin/customers') }}">
              <span data-feather="users"></span>
              Customers 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/admin/faq') }}">
              <span data-feather="bar-chart-2"></span>
              FAQ <span class="sr-only">(current)</span>
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
        <div class="row">
            <div class="col-md-4 ">
              <p> <strong>Create new FAQ </strong> </p>
                <form action="/admin/createFaq" method="post">
                    @csrf
                    <label for="">Question</label>
                    <input type="text" name="que" id=""><p></p>
                    <label for="">Answer</label>
                    <input type="text" name="ans" id=""><p></p>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="col-md-8">
                <?php  $x = 1; ?>
                <div class="table-responsive">
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($faq as $faqs)
                      <tr>
                        <td><?php echo $x ?></td>
                        <td><?php echo  $faqs->question ?></td>
                        <td><?php echo  $faqs->answer ?></td>
                        <td><a href="/admin/delete/faq/<?php echo $faqs->id; ?>"  class="btn btn-sm btn-danger">Delete</a> <a id="<?php echo $faqs->id; ?>" href="" class="edit btn btn-sm btn-info ml-2">Edit</a></td>
                      </tr>
                      <?php $x++; ?>
                     @endforeach
                    </tbody>
                  </table>
                </div>
                @if(isset($edits)) <?php print_r($edits); ?> @endif
            </div>
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

<script  type="text/javascript">
  $(document).on('click', '.edit ', function () {
          var id = this.id;
          alert(id);
          $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });         

          $.ajax({

              type:'GET',

              url:'/admin/edit/faq/11',

              data:{'id': id,'_token':'{{ csrf_token() }}' },
              dataType: 'JSON',

              success:function(data){
                alert(id);
  console.log('bad');
                alert(data);

              }

          });
          alert(id);


  });
</script>
</body>
</html>



