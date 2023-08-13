@extends('admin.layouts.header')
@section('content')

<div id="content-wrapper">

      <div class="container-fluid">
        <h4 style="margin-left:13px;">  Hi Noufel Zrig Welcome Back To Tamwilly Admin</h4>

        <section class="statistics">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="box">
                    <i class="fa fa-list fa-fw bg-box"></i>
                    <div class="info">
                      <h3>7</h3> <span class="light_font">Services</span>
                      <p>Your Parent Services</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box">
                    <i class="fa fa-file-code fa-fw bg-box"></i>
                    <div class="info">
                      <h3>1</h3> <span class="light_font">API's</span>
                      <p>Apis Store</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box">
                    <i class="fa fa-user fa-fw bg-box"></i>
                    <div class="info">
                      <h3>2</h3> <span class="light_font">Users</span>
                      <p>Registered clients</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box">
                    <i class="fa fa-users fa-fw bg-box"></i>
                    <div class="info">
                      <h3>0</h3> <span class="light_font">Vendors</span>
                      <p>Approved Vendors</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>

          <button onclick="sendmail('ahsinjavaid890@gmal.com' , 'Ahsin Javaid')" class="btn btn-primary">Send Mail</button>
      </div>
      <!-- /.container-fluid -->

    </div>
    <script>
        function sendmail(one , two){
        	var siteurl = 'http://localhost';
            $.ajax({
                url: siteurl + '/sendemail/index.php?email='+one+'&name='+two,
                type: 'POST',
                success: function(data){
                    //Do something with the result from server
                    if(data == 1){
                        alert('Contact request submited successfully');
                    }else{
                        alert('Error in submitting request, Please try again');
                    }
                }
            });
        }
    </script>
@endsection