@extends('admin.layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box">
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">All Reviews</li>
                  </ol>
              </div>
              <h4 class="page-title">All Reviews</h4>
          </div>
      </div>
  </div>
  <!-- end page title -->
   @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                <table id="basic-datatable" class="table table-bordered">
                  <thead>
                    <tr>
                       <th>Name</th>
                       <th>Reviewer Name</th>
                       <th>Email</th>
                       <th>Status</th>
                       <th>Ratting</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $r)
                    <tr>
                        <td>@if(!empty($r->lawyers_id)) <?php echo DB::table('lawyers')->where('id', $r->lawyers_id)->first()->name; ?><br> <span class="badge badge-primary">Lawyer</span> @else <?php echo DB::table('nominations')->where('id', $r->nominatedlawyer)->first()->name; ?> <br><span class="badge badge-primary">Nominated Person</span>
                          @endif
                        </td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->email}}</td>
                        <td>@if($r->status == 1) Approved @else Not Approved @endif</td>
                        <td>{{$r->rattings}} Stars</td>
                        <td style="text-align: center;">
                          <button onclick="editreview({{$r->id}})" class="btn btn-sm btn-primary">Edit</button>
                          <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('admin/deletereview') }}/{{ $r->id }}">
                          <button class="btn btn-sm btn-danger">Delete</button>
                          </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end card-body-->
          </div> <!-- end card-->
      </div> <!-- end col-->
  </div>
  <!-- end row -->
</div> <!-- container -->
<div class="modal fade" id="editreview">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <!-- Modal body -->
      <div class="">
            <div class="card">
                <div class="card-header card-success">
                    Update Review
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('updatereview') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <input type="hidden" name="id" id="reviewid">
                      <div class="form-group">
                        <label>Lawyer</label>
                        <select class="form-control" id="lawyerid" name="lawyerid">
                            <option value="">Select Lawyer</option>
                            <?php foreach(DB::table('lawyers')->get() as $r){ ?>
                              <option value="{{ $r->id }}">{{ $r->name }}</option>
                            <?php }?>
                        </select> 
                      </div>
                      <div class="form-group">
                        <label>Rattings</label>
                        <select class="form-control" id="reviewrattings" name="rattings">
                            <option value="0">Select Rattings</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                            <option value="4">4 Star</option>
                            <option value="5">5 Star</option>
                        </select> 
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="reviewstatus" name="status">
                            <option value="">Select Status</option>
                            <option value="1">Approved</option>
                            <option value="0">Not Approved</option>
                        </select> 
                      </div>
                      <div class="form-group">
                        <label>Review</label>
                        <textarea rows="5" class="form-control" id="completereview" name="review"></textarea> 
                      </div>       
                      <div class="form-group">
                        <label>Reviewer Name</label>
                        <input type="text" class="form-control" id="reviewername" name="name">
                      </div>
                      <div class="form-group">
                        <label>Reviewer Email</label>
                        <input type="text" class="form-control" id="revieweremail" name="email">
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Update Review" class="btn btn-primary">
                      </div>
                    </form>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function editreview(id)
  {
    $.ajax({
      type:'GET',
      url:"{{ url('editreview') }}/"+id,
      datatype:'json',
      success: function(res)
      {
        $("#reviewername").val(res.name);
        $("#revieweremail").val(res.email);
        $("#completereview").val(res.review);
        $("#reviewrattings").val(res.rattings);
        $("#reviewstatus").val(res.status);
        $("#lawyerid").val(res.lawyers_id);
        $("#reviewid").val(res.id);
        $('#editreview').modal('show');
      }
     })
  }
</script>
@endsection