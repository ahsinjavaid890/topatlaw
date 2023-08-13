@extends('admin.layouts.app')
@section('content')

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
  <form id="saveemailtemplate">
      @csrf
      <div class="row">
  <div class="form-group col-8 mb-3" >
    <label for="validationCustom02">Enter New Email</label>
    <textarea id="validationCustom02" name="email"  class="form-control" id="textEmail" placeholder="Enter Short Description" >@if(isset($fp)){{$fp}}@endif</textarea>
    <script>
            CKEDITOR.replace( 'email' );
    </script>
   
    </div>
    <div class="col-4">
        <label for="filename">Enter email name (used to save email by name)</label>
       <input type="text" name="filename" class="form-control" value="{{$filename ?? ''}}" id="filename">
       <input type="text"  name="oldfilename" hidden value="{{$filename ?? ''}}" class="form-control" id="oldfilename">
       
           <div class="mt-3">
               <label for="savedEmails">Load previously saved emails</label>
               <br>
               <select name="" id="savedEmails" class=" savedEmails form-control" onchange="getemailbyname()">
               <option disabled selected="true"></option>
               </select>
           </div>
           
       
        <button type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Save</button>
        @if(isset($filename))
        <button onclick="deleteMyTemplate('{{$filename}}')" type="button" class="btn btn-danger mt-4 pr-4 pl-4">Delete</button>

        @endif
    </div>
    </div>
   

    </div>
</form>
<hr>
<style>
    .select2{
   background-color: #5897fb !important;
   color: black;
}
</style>
<h4 class="page-title">Send Emails</h4>
<hr>
<div>
<input  id="selectAll" type="checkbox" onclick="selectAll()">
<label for="selectAll">Select All</label>

<br><br>
</div>
<form id="sendEmail">
    @csrf
    <div class="row">
        <div class="col-6">
            <label for="">Send To :</label>
           <select name="to[]" id="" class="selectUser select2 text-dark form-control"    multiple="multiple">
         
           @foreach($emails  as $key=>$email){
               @if($emails [$key]->emailaddress!=null)
               <option value="{{$emails [$key]->emailaddress}}">{{$emails[$key]->emailaddress}}</option>
               @endif
            }
            @endforeach
           </select>
        </div>
        <div class="col-6">
            <label for="">Select Email</label>
            <select name="email" id=""class=" savedEmails">
           
          
            </select>
        </div>
     
    </div>
    
        <div class="d-flex justify-content-center ">
           <button type="sumbit" class="btn btn-danger mt-3 pl-4 pr-4">Send</button>
        </div>
    
</form>

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
   window.history.replaceState('sdf', 'title', 'https://topatlaw.com/admin/emails/'+vals);
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
    var sa=1;
    function selectAll(){
        if(sa===1){
             sa=0;
        $('select.selectUser option').attr('selected', true).parent().trigger('change');
        }
        else {
            sa=1;
        $('select.selectUser option').attr('selected', false).parent().trigger('change');
    }
}

function deleteMyTemplate(name){
    $.ajax({
            url:'{{url("admin/delete-emails")}}',
            method:'POST',
            data: {name:name,_token:'{{csrf_token()}}'},
            success:function(){
                    // alert('Email saved');
                    // if($('#oldfilename').val()!==''&&$('#oldfilename').val()!==$('#filename').val()){
                            window.location.reload();
                  //  }
                    // loadPreviousEmails();
                    
            },
            error:function(){
                 alert('Email not Deleted');
            }
        })
}
</script>
@endsection