<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 4B: IP TRANSACTIONS (OUTSIDE SCOPE OF IPR ACT)
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 216; @endphp

			<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.13 Has your institution executed any <span data-toggle=tooltip data-placement=top title='A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP. '>IP TRANSACTIONS</span> and/or received any revenue between 2019 and 2023 for IP which falls outside the scope of the <span data-toggle=tooltip data-placement=top title='Falling outside the scope of the IPR ACT'>NON IPR ACT</span>?</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
                        {!! Form::select(
                            'questions['.$questionId.'][ip_transaction_4_12]', 
                            ['' => 'Please Select'] + $yesNo, 
                            null, 
                            [
                                'class' => 'form-control policy-select', 
                                'data-question-id' => $questionId,
                                'wire:model' => 'questions.'.$questionId.'.ip_transaction_4_12'
                            ]
                        ) !!}

                        @error("questions.{$questionId}.ip_transaction_4_12")
                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
                        @enderror

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>
	           	</div>
           	</div>

           	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transaction_4_12']) && $questions[$questionIdMain]['ip_transaction_4_12'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.13.1 <span data-toggle=tooltip data-placement=top title='Falling outside the scope of the IPR ACT'>NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title='A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.'>LICENCES</span> Executed</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }}</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach ($nonIprActActLicencesList as $key => $value)
			                        <tr>
			                            <th>{!! $value !!}</th>
			                            @foreach (getYears() as $year)
			                                <td>
			                                    <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
			                                    @error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
			                                </td>
			                            @endforeach
			                        </tr>
			                        @php $questionId++; @endphp
			                    @endforeach
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transaction_4_12']) && $questions[$questionIdMain]['ip_transaction_4_12'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.13.2 <span data-toggle=tooltip data-placement=top title="Falling outside the scope of the IPR ACT">NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title="A transaction whereby all rights, title and interest in and to IP, is transferred to another party.">ASSIGNMENTS</span> Executed</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }}</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach ($nonIprActActAssignmentsList as $key => $value)
			                        <tr>
			                            <th>{!! $value !!}</th>
			                            @foreach (getYears() as $year)
			                                <td>
			                                    <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
			                                    @error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
			                                </td>
			                            @endforeach
			                        </tr>
			                        @php $questionId++; @endphp
			                    @endforeach
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transaction_4_12']) && $questions[$questionIdMain]['ip_transaction_4_12'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.13.3 <span data-toggle=tooltip data-placement=top title="Falling outside the scope of the IPR ACT">NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title="Invoiced revenue (turnover) from the sale of products or services.">TRANSACTION REVENUE</span></h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{ $year }} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach ($nonIprActActTransactionList as $key => $value)
			                        <tr>
			                            <th>{!! $value !!}</th>
			                            @foreach (getYears() as $year)
			                                <td>
			                                    <input class="form-control" oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{ $year }}">
			                                    @error("questions.{$questionId}.{$year}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
			                                </td>
			                            @endforeach
			                        </tr>
			                        @php $questionId++; @endphp
			                    @endforeach
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transaction_4_12']) && $questions[$questionIdMain]['ip_transaction_4_12'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.13.4 Total Number of <span data-toggle=tooltip data-placement=top title="Falling outside the scope of the IPR ACT">NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title='A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP. '>IP TRANSACTIONS</span> yielding <span data-toggle=tooltip data-placement=top title="The gross revenue received that is due to your institution only as consideration in an IP TRANSACTION such as licence issue fees, payments under options or on assignment, milestones or minimum payments (also referred to as annual minimums), running royalties, termination payments.">IP TRANSACTION REVENUE</span>:</h6>
			    </div>
			    <div class="card-body"> 

			    	<ul class="list-unstyled">
                        <li>4.13.4.1 For each year, please provide the total number of IP transactions that fall into revenue categories indicated in the table.</li>
                        <li>4.13.4.2 For each year, please provide the number of IP transactions that fall into revenue categories indicated in table</li>
                    </ul>

			    	<div class="form-group">
			    		<small class="text-danger">Note : Please confirm the amount once you have typed it.</small>
			            <table class="table table-bordered full-borader text-center">
			                <tbody>
			                    <tr>
			                        <th>Year</th>
			                        <th>Total</th>
			                        <th>Less than <br> R100 000</th>
			                        <th>R100 000 <br> – R500 000</th>
			                        <th>R500 000 <br> – R1.5m</th>
			                        <th>R1.5m <br> – US$1m (PPP)</th>
			                        <th>Greater than <br> US$1m (PPP)</th>
			                        <th>Rand value of <br> US$1m</th>
			                    </tr>
			                    @foreach (getYears() as $key => $year)
						            <tr>
						            	<th>{{$year}}</th>
						            	@for ($i = 1; $i <= 6; $i++)
							            	<td>
	                                            <input class="form-control" @if($i==1) readonly @endif oninput="formatNumber(this)" type="text" wire:model="questions.{{ $questionId }}.{{$year}}.column_{{$i}}" wire:blur="updateTotal({{$questionId}}, {{$year}})">
								            	@error("questions.{$questionId}.{$year}.column_{$i}")
						                            <small class="text-danger w-100 d-block"><strong>{{ $message }}</strong></small>
						                        @enderror
					                       	</td>
                                        @endfor
                                        <th>{!!$randValuesIpTransaTwoList[$key]!!}</th>
						           	</tr>
						        @endforeach
						        @php $questionId++; @endphp
			                   
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>
	    </div>
	    <div class="card-footer">
	    	@include('common.footer-buttons', ['route' => route('user.list'), 'type' => 'create', 'is_hide_back' => 1])
	    </div>
	</div>
</form>