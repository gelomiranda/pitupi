@extends('layout.master')
@section('content')  
<div class="row">
  <div class="col-md-12">
    <h4>Select Loan Category</h4>
    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs ">
      @foreach ($loans as $loan)
        <li class=" with-border @if($loop->iteration == 1) {{ 'active' }} @endif">
          <a data-toggle="tab" href="#{{ $loan->loan_id }}"> {{ $loan->description }}</a>
        </li>
      @endforeach
    </ul>
    <div class="tab-content" >
      @foreach ($loans as $loan)
        <div id="{{ $loan->loan_id }}"  style="background-color:#fff;" class="tab-pane fade in  @if($loop->iteration == 1) {{ 'active' }} @endif ">
          <h3>{{ $loan->description }} Loan</h3>
          <p>Exclusively available to employees of accredited companies.</p>
          <p>Borrow between 
             @foreach(explode('-', $loan->min_max) as $min_max) 
               <span class="label label-warning">{{ number_format($min_max,0) }} P</span>
               @if($loop->iteration == 1)
                 @php
                   $min = $min_max
                 @endphp
               @endif
               @if($loop->iteration == 2)
                 @php
                   $max = $min_max
                 @endphp
               @endif
             @endforeach     
          </p>
          <p>As low as <span class="label label-primary">{{ $loan->interest }}%</span> interest per month</p>
          <p>Monthly Payments: <span  class="label label-success" id="{{ $loan->description }}_estimated_monthly">0.00</span></p>
          <p>Monthly Income: <span  class="label label-danger" id="{{ $loan->description }}_estimated_income">0.00</span></p>
          
          {{ Form::open(array('url' => 'application', 'method' => 'post')) }}
              <div class="form-group">
                <input type="hidden" name="hd_description" value="{{ $loan->description }}" />
                <input type="hidden" id="{{$loan->description}}_hd_interest" name="hd_interest" value="{{ $loan->interest }}" />
                <select class="form-control" name="terms" required="required" data-id="{{$loan->description}}"  id="{{$loan->description}}_terms" class="terms">
                  <option disabled="disabled" selected="selected">Select Terms Of Payment</option>  
                  @foreach(explode(',', $loan->terms) as $term) 
                    <option value='{{$term}}'>{{$term}} 
                            @if($loop->iteration != 1) {{'Months'}} @endif
                            @if($loop->iteration == 1) {{'Month'}} @endif
                    </option>
                  @endforeach
                </select>
              </div>  
              <div>
                <select class="form-control" name="amount" required="required" data-id="{{$loan->description}}" id="{{$loan->description}}_loan_amount" class="loan_amount">
                  <option disabled="disabled" selected="selected">Select Loan Amount</option>
                  @while ($min <= $max) 
                  <option value="{{$min}}">P{{number_format($min,0)}}</option>
                    @php $min+=10000; @endphp
                  @endwhile  
                </select>
              </div>
              <br>
              <div class="form-group">
                <div class="text-center"><button type="submit" class="btn btn-block btn-success">Apply</button></div>
              </div>
          </form>
        </div>
      @endforeach
    </div>
  </div>
  </div>      
</div>     
<script type="text/javascript">
  $(document).ready(function(){
    // $(".loan_amount").on('change',function(){
    //   alert(1);
    //  // monthly_computation();
    // });

    // $(".terms").on('change',function(){
    //   //monthly_computation();
    // })


    $("select").change(function(){
      var id = $(this).data("id");
      var amount = $("#"+id+"_loan_amount").val();
      var term   = $("#"+id+"_terms").val();
      var interest = $("#"+id+"_hd_interest").val();
      monthly_computation(id,amount,term,interest);
    })

  
    function monthly_computation(id,amount,term,interest){
      var monthly = 0;
      var admin = 0;
      var monthly_income = 0;
      var MONTHLY_INT = 6.6666;
      if(amount && term){
        monthly = ((amount) * (1 + interest / 100 * term / 12) / term);
        
        admin =(monthly * (0.029319692) * term);
        monthly = monthly + admin;
        //console.log(interest);
        monthly_income = (monthly * MONTHLY_INT);
        
        $('#'+id+'_estimated_monthly').text(monthly.toFixed(2));
        $('#'+id+'_estimated_income').text(monthly_income.toFixed(2));
      }    
    }
  });
</script>
@endsection       