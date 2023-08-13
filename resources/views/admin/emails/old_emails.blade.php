@extends('admin.layouts.app')
@section('content')
<style>
    .select2 {
        background-color: #5897fb !important;
        color: black;
    }

    .select-custom
    {
        height: 55px !important;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Emails</li>
                </ol>
            </div>
            <h4 class="page-title">Emails</h4>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                  <div class="card-body">
                    <form id="saveemailtemplate">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="filename">Enter email name (used to save email by name)</label>
                                <input type="text" name="filename" class="form-control" value="{{$filename ?? ''}}" id="filename" />
                                <input type="text" name="oldfilename" hidden value="{{$filename ?? ''}}" class="form-control" id="oldfilename" />

                                <div class="mt-3 mb-3">
                                    <label for="savedEmails">Load previously saved emails</label>
                                    <br />
                                    <select name="" id="savedEmails" class="savedEmails form-control select-custom" onchange="getemailbyname()">
                                        <option disabled selected="true"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom02">Enter New Email</label>
                                <textarea id="validationCustom02" name="email" class="form-control" id="textEmail" placeholder="Enter Short Description">@if(isset($fp)){{$fp}}@endif</textarea>
                                <script>
                                    CKEDITOR.replace("email");
                                </script>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Save</button>
                            </div>
                            
                        </div>
                    </form>
                  </div>
              </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title">Send Emails</h4>
                    <hr />

                    <form id="sendEmail">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">Select Email</label>
                                        <select name="email" id="" class="savedEmails select-custom"> </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Send To :</label>
                                        <select name="to[]" id="" class="selectUser select2 text-dark form-control" style="" multiple="multiple">
                                            @foreach($emails as $key=>$email){ @if($emails[$key]->emailaddress!=null)
                                            <option value="{{$emails[$key]}}">{{$emails[$key]->emailaddress}}</option>
                                            @endif } @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="sumbit" class="btn btn-danger mt-3 pl-4 pr-4">Send</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
      
  </div>
</div>









<script>
    $(document).ready(function() {
    $('.savedEmails').select2();
    $('.selectUser').select2({
        theme: "classic",
        tags: true,
        tokenSeparators: [','],
      //  closeOnSelect: false
    })
});
    $('#saveemailtemplate').on('submit',function(e){
        e.preventDefault();
        setTimeout(function(){
        if($('#filename').val()!=='')
        $.ajax({
            url:'{{url("admin/save-email-templates")}}',
            method:'POST',
            data: $('#saveemailtemplate').serialize(),
            success:function(){
                    alert('Email saved');
                    if($('#oldfilename').val()!==''&&$('#oldfilename').val()!==$('#filename').val()){
                            window.location.reload();
                    }
                    loadPreviousEmails();
                    
            },
            error:function(){
                 alert('Email not saved');
            }
        })
        else
        alert('Please Enter file name');
    },100);
    })
    loadPreviousEmails();
    function loadPreviousEmails(){
        $.get('{{url("admin/get-saved-email-templates")}}',function(data){
            for(var i=data.length-1;i=>0;i--)
            $('.savedEmails').append(
                '<option value='+data[i].filename+'>'+data[i].filename+'</option>'
            );
       // console.log(data);
         });
       
    }
    function getemailbyname(){
        var vals=$('#savedEmails').val();
        if (window.history.replaceState) {
   //prevents browser from storing history with each change:
   window.history.replaceState('sdf', 'title', 'http://localhost/topatlaw/admin/emails/'+vals);
}
    window.location.reload();   
    }

    $('#sendEmail').on('submit',function(e){
        e.preventDefault();
        $('button').prop('disabled',true);
        $.post('{{url("admin/send-emails")}}',$('#sendEmail').serialize(),function(data){
            alert(data);
            $('button').prop('disabled',false);
        })
    })
</script>
@endsection