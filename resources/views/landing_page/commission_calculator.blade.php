@extends('layouts.landingpage')
@section('title', '100% Commission Calculator | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')


@section('content')
<div class="page-calculator">
    <section class="calculator">
        <div class="container" style="margin: 3em auto;">
            <div class="row">
                <div class="col-md-12">
                    <h1>Commission Calculator</h1>
                    <h4>Don't settle for less. Get more from your broker.</h4>
                    <p>Use the calculator below to see how much more you will make by joining Taylor Properties. Use that money to re-invest in your real estate business, put into retirement, or save it for a rainy day!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h5>Enter your sales numbers</h5>
                        <label for="numberSales">How many sales transactions did you have in the last 12 months?</label>
                        <input type="number" class="form-control" id="numberSales" placeholder="e.g., 12" required="required">
                    </div>
                    <div class="form-group">
                        <label for="averagePrice">What is your average sales price?</label>
                        <input type="number" class="form-control" id="averagePrice" placeholder="e.g., $100,000" required="required">
                    </div>
                    <div class="form-group">
                        <label for="commissionPercent">What is the typical commission percentage for your market?</label>
                        <input type="text" class="form-control" id="commissionPercent" placeholder="e.g., 3%" required="required">
                    </div>
                    <div class="form-group">
                        <label for="commissionSplit">What is your commission split on sales paid to your current broker?</label>
                        <input type="text" class="form-control" id="commissionSplit" placeholder="e.g., 50%" required="required">
                    </div>
                    <div class="form-group">
                        <label for="transactionFee">Does your broker charge a transaction fee per sale? (e.g., flat transaction fee or small E&O fee)</label>
                        <input type="text" class="form-control" id="transactionFee" placeholder="e.g., $500" required="required">
                    </div>
                    <div class="form-group">
                        <h5>Enter your brokerage fees</h5>
                        <label for="brokerFee">What is your current monthly brokerage fee (average is $100)</label>
                        <input type="number" class="form-control" id="brokerFee" placeholder="e.g., $100" required="required">
                    </div>
                    <div class="form-group">
                        <label for="officeRent">Do you pay for an office space? If so, how much per month?</label>
                        <input type="number" class="form-control" id="officeRent" placeholder="e.g., $300" required="required">
                    </div>
                    <div class="form-group" style="display: none;">
                        <p for="commissionCap">Do you have a commission cap?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="commissionCap" id="no" value="no" checked="checked">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="commissionCap" id="yes" value="yes" checked>
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                    </div>
                    <div class="form-group commissionCapHit" style="display: none;">
                        <p for="commissionCapHit">Did you hit your commission cap this year?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="commissionCapHit" id="no" value="no" checked="checked">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="commissionCapHit" id="yes" value="yes" checked>
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                    </div>
                    <div class="form-group commissionCapNumber" style="display: none;">
                        <label for="commissionCapNumber">How much is your commission cap?</label>
                        <input type="number" class="form-control" id="commissionCapNumber" placeholder="e.g., $300">
                    </div>
                    <div class="form-group commissionCapTransFee" style="display: none;">
                        <p for="commissionCapTransFee">Does your broker charge a fee per transaction after you reach your cap?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="commissionCapTransFee" id="no" value="no" checked="checked">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="commissionCapTransFee" id="yes" value="yes" checked>
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                    </div>
                    <div class="form-group commissionCapFee" style="display: none;">
                        <label for="commissionCapFee">How much is the fee after you've capped?</label>
                        <input type="number" class="form-control" id="commissionCapFee" placeholder="e.g., $100">
                    </div>
                    <button type="submit" class="btn btn-deep-orange waves-effect waves-light" id="calculate">Calculate</button>
                </div>
            </div>
        </div>
    </section>

    <section class="result" style="margin: 5em 0;">
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">100% Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">85% Plan</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 50%;">
                                    <p class="red-text text-center">Amount paid to current broker</p>
                                    <p class="red-text text-center">$<span class="paidToBroker">0</span></p>
                                </td>
                                <td style="width: 50%;">
                                    <p class="text-center">Amount paid to Taylor&nbsp;Properties</p>
                                    <p class="green-text text-center">$<span class="taylor100Fees">0</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">
                                    <p class="red-text text-center" class="text-center">Amount earned with current broker</p>
                                    <p class="red-text text-center">$<span class="earnedCurrentBroker">0</span></p>
                                </td>
                                <td style="width: 50%;">
                                    <p class="text-center">Amount Earned Taylor&nbsp;Properties</p>
                                    <p class="green-text text-center">$<span class="totalAmountEarned100">0</span></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 50%;">
                                    <p class="red-text text-center">Amount paid to current broker</p>
                                    <p class="red-text text-center">$<span class="paidToBroker">0</span></p>
                                </td>
                                <td style="width: 50%;">
                                    <p class="text-center">Amount paid to Taylor&nbsp;Properties</p>
                                    <p class="green-text text-center">$<span class="taylor85Fees">0</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">
                                    <p class="red-text text-center">Amount earned with current broker</p>
                                    <p class="red-text text-center">$<span class="earnedCurrentBroker">0</span></p>
                                </td>
                                <td style="width: 50%;">
                                    <p class="text-center">Amount Earned Taylor&nbsp;Properties</p>
                                    <p class="green-text text-center">$<span class="totalAmountEarned85">0</span></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <p><i>*Note that these figures are estimates only and based on yearly production.</i></p>
            </div>
        </div>
    </section>
</div>
@include('includes.getmore')

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
		$('input[type=radio][name=commissionCap][id=no]').click();
		$('input[type=radio][name=commissionCapHit][id=no]').click();
		$('input[type=radio][name=commissionCapTransFee][id=no]').click();

		$('input[type=radio][name=commissionCap]').change(function() {
            if (this.value == 'yes') {
                $('.commissionCapHit').css('display','block');
            }
            else {
                $('.commissionCapHit').css('display','none');
                $('.commissionCapNumber').css('display','none');
                $('.commissionCapTransFee').css('display','none');
                $('.commissionCapFee').css('display','none');
            }
		});

		$('input[type=radio][name=commissionCapHit]').change(function() {
            if (this.value == 'yes') {
                $('.commissionCapNumber').css('display','block');
                $('.commissionCapTransFee').css('display','block');
            }
            else {
                $('.commissionCapNumber').css('display','none');
                $('.commissionCapTransFee').css('display','none');
                $('.commissionCapFee').css('display','none');
            }
        });

        $('input[type=radio][name=commissionCapTransFee]').change(function() {
            if (this.value == 'yes') {
                $('.commissionCapFee').css('display','block');
            }
            else {
                $('.commissionCapFee').css('display','none');
            }
		});

		$('#calculate').click(function(){
			var numberSales = $('#numberSales').val();
			var averagePrice = $('#averagePrice').val();
			var totalSalesRevenue = numberSales * averagePrice;

			var commissionPercent = $('#commissionPercent').val();
			var	commissionPercent = commissionPercent / 100;
			var commissionSplit = $('#commissionSplit').val();
			var	commissionSplit = commissionSplit / 100;

			var transactionFee = $('#transactionFee').val();
			var totalTransactionFees = transactionFee * numberSales;

			var brokerFee = $('#brokerFee').val();
			var totalBrokerFee = brokerFee * 12;
			var taylor100Fees = 588; // 49/month for 100%
			var taylor85Fees = 0; // 0/mo for 85%

			var officeRent = $('#officeRent').val();
			var totalOfficeRent = officeRent * 12;

			var revenueAfterCommPercent = totalSalesRevenue * commissionPercent;
			var revenueAfterCommSplit = revenueAfterCommPercent * commissionSplit;
			var revenueAfterTransFees = revenueAfterCommSplit - totalTransactionFees;

			// amount paid to current broker
			var paidToBroker = (revenueAfterCommPercent * (1-commissionSplit)) + totalTransactionFees + totalBrokerFee + totalOfficeRent;
			$('.paidToBroker').html(paidToBroker);

			//amount earned with current broker
			var earnedCurrentBroker = revenueAfterCommPercent - paidToBroker;
			var savedWithTaylor85 = (revenueAfterCommPercent * .85) - paidToBroker;
			$('.earnedCurrentBroker').html(earnedCurrentBroker);
			$('.earnedCurrentBroker').html(earnedCurrentBroker);

			//amount paid to Taylor Properties
            var paidToTP85 = revenueAfterCommPercent * .15;
			$('.taylor100Fees').html(taylor100Fees);
            $('.taylor85Fees').html(paidToTP85);

			//amount earned with TP
			var totalAmountEarned100 = revenueAfterCommPercent - taylor100Fees;//total price of 100% commission plan/year
			var totalAmountEarned85 = revenueAfterCommPercent * .85;
			$('.totalAmountEarned100').html(totalAmountEarned100);
			$('.totalAmountEarned85').html(totalAmountEarned85);

	    });

	});
</script>
@endsection