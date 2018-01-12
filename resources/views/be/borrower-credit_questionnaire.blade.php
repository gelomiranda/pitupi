@extends('layout.master')
@section('content')      
    <div class="row">
        <div class="col-md-6">
          <div class="">
            <div class="box-header with-border">
              <h3 class="box-title">Credit Questionnaire</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>What is the status of your current residence?</label>
                  <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label>How long have you been living in your current address? (In Years)</label>
                  <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label>What is your highest educational attainment?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Which college/university did you graduate from?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Please select from the list your type of employment</label>
                  <select class="form-control">
                    <option>Single</option>
                    <option>Married</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>What position do you currently hold?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>What is the full name of the Company you are employed with?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>How long have you been employed in your company?</label>
                  <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label>How much do you earn in a monthly basis?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>How much of your monthly income goes to savings?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Do you pay your bills on time regularly?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Do you have other loans that you are paying for now?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Have you availed of and completed paying off a loan before?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>If renting or mortgaged, how much are you paying on a monthly basis for rent and/or mortgage? (input "0.00" if none)</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>How much are you currently paying on a MONTHLY basis for all your other existing loans if any? (input "0.00" if none)</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Do you have a credit card?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Do you have a checking account?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>How many dependents do you have?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>What is your SPOUSE's salary?</label>
                  <input type="text" class="form-control">k
                </div>
                <div class="form-group">
                  <label>Do you have a co-maker for this loan?</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>If collateralized, By how much does the collateral cover your loan? (collateral appraised value ÷ loan amount)</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>How many times have you availed a loan through FundKo?</label>
                  <input type="text" class="form-control">
                </div>

              </form>
            </div>
        </div>
      </div>
    </div>
@endsection     