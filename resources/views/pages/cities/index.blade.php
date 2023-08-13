@extends('layouts.app')
@section('title')
<title>Best {{ $servicename->tittle }} Lawers</title>
@endsection
@section('content')
<div class="our-service-area pt-100 pb-70 mt-5">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
				    <li class="breadcrumb-item"><a href="">{{ $servicename->tittle }}</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Cities</li>
				  </ol>
				</nav>
    		</div>
    	</div>

    	
        <div class="card mt-2">
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-md-8">
                        <h4>{{ $servicename->tittle }}</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <input type="text" id="searchcity" class="form-control" placeholder="Search City.." name="">
                        <input type="hidden" id="serviceid" value="{{ $servicename->id }}" name="">
                    </div>
                </div>
                
                @php
            
            use Illuminate\Support\Str;
                
            $firstList = [];
            $secondList = [];
            $thirdList = [];
            $fourthList = [];
            
            foreach ($data as $r) {
                $firstLetter = strtoupper(substr($r->tittle , 0, 1));
            
                if (in_array($firstLetter, ['A', 'B', 'C', 'D', 'E'])) {
                    $firstList[] = $r;
                } elseif (in_array($firstLetter, ['F', 'G', 'H', 'I','J','K'])) {
                    $secondList[] = $r;
                } elseif (in_array($firstLetter, ['L', 'M', 'N', 'O','P'])) {
                    $thirdList[] = $r;
                } else {
                    $fourthList[] = $r;
                }
            }
               @endphp
                <div id="hideactualcity" class="row mt-5">
               <div class="col-md-3">
                       
                        <ul>
                            @foreach ($firstList as $r)
                                <li><h6> <a href="{{ url('lawyers') }}/{{ $servicename->url }}/{{ $r->url }}">{{ $r->tittle }}</a></h6></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                       
                        <ul>
                            @foreach ($secondList as $r)
                                <li><h6> <a href="{{ url('lawyers') }}/{{ $servicename->url }}/{{ $r->url }}">{{ $r->tittle }}</a></h6></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        
                        <ul>
                            @foreach ($thirdList as $r)
                                <li><h6> <a href="{{ url('lawyers') }}/{{ $servicename->url }}/{{ $r->url }}">{{ $r->tittle }}</a></h6></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                       
                        <ul>
                            @foreach ($fourthList as $r)
                                <li><h6> <a href="{{ url('lawyers') }}/{{ $servicename->url }}/{{ $r->url }}">{{ $r->tittle }}</a></h6></li>
                            @endforeach
                        </ul>
                    </div>
    </div>
    </div>

                <!-- Search Results -->

                <div id="showsearchcity" class="row mt-3">

                </div>
                <div style="display: none;" id="noresult" class="row mt-3">
                    <h1>No Cites Found</h1>
                </div>

            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $("#searchcity").keyup(function(){
        $('#hideactualcity').hide();
        var value = $('#searchcity').val();
        var serviceid = $('#serviceid').val();
        var url = $('#url').val();
            $.ajax({
                type: "GET",
                url: url+'/searchcity/'+value+'/'+serviceid,
                success: function(resp) {
                    if (resp == "noresult") {
                         $('#noresult').fadeIn();
                    } else {
                         $('#noresult').hide();
                        $('#showsearchcity').html(resp);
                    }
                }
            });
      });
    });
</script>
@endsection