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
			        <h6 class="text-bold mb-0">4.13 Has your institution executed any IP TRANSACTIONS and/or received any revenue between 2019 and 2023 for IP which falls outside the scope of the NON IPR ACT?</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			    		@if(isset($questions[$questionId]['ip_transaction_4_12']) && !empty($questions[$questionId]['ip_transaction_4_12'])) 
						    {{$yesNo[$questions[$questionId]['ip_transaction_4_12']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>
	           	</div>
           	</div>

           	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transaction_4_12']) && $questions[$questionIdMain]['ip_transaction_4_12'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.13.1 NON-IPR ACT LICENCES Executed</h6>
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
			                                	@if(isset($questions[$questionId][$year]))
												    {{$questions[$questionId][$year]}}
												@endif
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
			        <h6 class="text-bold mb-0">4.13.2 NON-IPR ACT ASSIGNMENTS Executed</h6>
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
			                                	@if(isset($questions[$questionId][$year]))
												    {{$questions[$questionId][$year]}}
												@endif
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
			        <h6 class="text-bold mb-0">4.13.3 NON-IPR ACT IP TRANSACTION REVENUE</h6>
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
			                                	@if(isset($questions[$questionId][$year]))
												    {{$questions[$questionId][$year]}}
												@endif
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
			        <h6 class="text-bold mb-0">4.13.4 Total Number of NON-IPR ACT IP TRANSACTIONS yielding IP TRANSACTION REVENUE:</h6>
			    </div>
			    <div class="card-body"> 

			    	<ul class="list-unstyled">
                        <li>4.13.4.1 For each year, please provide the total number of IP transactions that fall into revenue categories indicated in the table.</li>
                        <li>4.13.4.2 For each year, please provide the number of IP transactions that fall into revenue categories indicated in table</li>
                    </ul>

			    	<div class="form-group">
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
	                                            @if(isset($questions[$questionId][$year]))
												    {{ $questions[$questionId][$year]['column_'.$i] ?? '' }}
												@endif
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
	</div>
</form>