<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 4A: IP TRANSACTIONS (ONLY IPR ACT-RELATED IP TRANSACTIONS)
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php 
	    	$questionId = 181; 
	    	$greenTick = '<img src="' . URL::asset('assets/dist/img/check-mark-2-24.png') . '">';
            $redTick = '<img src="' . URL::asset('assets/dist/img/cancel-24.png') . '">';
	    	@endphp

			<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.1. Has your institution executed any IP TRANSACTIONS between 2019 and 2023?</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			    		@if(isset($questions[$questionId]['ip_transactions_4_1']) && !empty($questions[$questionId]['ip_transactions_4_1'])) 
						    {{$yesNo[$questions[$questionId]['ip_transactions_4_1']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>
	           	</div>
           	</div>

           	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_1']) && $questions[$questionIdMain]['ip_transactions_4_1'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.2. OPTIONS</h6>
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
			                    @foreach ($optionsList as $key => $value)
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

			                    <tr bgcolor="#f4f6f9">
							        <th>Of these, how many were:</th>
							        @foreach (getYears() as $year)
							            <td></td>
							        @endforeach
							    </tr>

							    @php
								$extQuestionId = 265;
								@endphp
								<tr>
		                            <th>4.2.1.1 OPTIONS to a SOUTH AFRICAN ENTITY/IES</th>
		                            @foreach (getYears() as $year)
		                                <td>
		                                	@if(isset($questions[$extQuestionId][$year]))
											    {{$questions[$extQuestionId][$year]}}
											@endif
		                                </td>
		                            @endforeach
		                        </tr>
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_1']) && $questions[$questionIdMain]['ip_transactions_4_1'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.3. LICENCES</h6>
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
			                    @foreach ($licencesList as $key => $value)
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

		            <div class="form-group">
		            	<label class="control-label w-100">South Africa</label>

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
			                    @foreach ($southAfricaList as $key => $value)
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

	            	<div class="form-group">
		            	<label class="control-label w-100">Foreign Jurisdiction</label>

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
			                    @foreach ($foreignJurisdictionList as $key => $value)
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

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_1']) && $questions[$questionIdMain]['ip_transactions_4_1'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.4 ASSIGNMENTS</h6>
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
								@foreach($assignmentsList as $key => $value)
									<tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if ($key != 1)
								            		@if(isset($questions[$questionId][$year]))
													    {{$questions[$questionId][$year]}}
													@endif
									            @endif
									        </td>
								        @endforeach
								    </tr>

								    @if($key!=1)
								    	@php $questionId++; @endphp
								    @endif
								@endforeach
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_1']) && $questions[$questionIdMain]['ip_transactions_4_1'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.5 IP TRANSACTIONS</h6>
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
								@foreach($ipTransationsList as $key => $value)
									<tr bgcolor="{{(in_array($key,[1,5])) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if(!in_array($key,[1,5]))
								            		@if(isset($questions[$questionId][$year]))
													    {{$questions[$questionId][$year]}}
													@endif
									            @endif
									        </td>
								        @endforeach
								    </tr>

								    @if(!in_array($key,[1,5]))
								    	@php $questionId++; @endphp
								    @endif
								@endforeach
			                </tbody>
			            </table>
		            </div>
	         	</div>
          	</div>

      		<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_1']) && $questions[$questionIdMain]['ip_transactions_4_1'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.6 Has your institution executed any IP TRANSACTIONS between 2010 to 2023?</h6>
			    </div>
			    <div class="card-body">
			    	<div class="form-group">
			    		@if(isset($questions[$questionId]['ip_transactions_4_5']) && !empty($questions[$questionId]['ip_transactions_4_5'])) 
						    {{$yesNo[$questions[$questionId]['ip_transactions_4_5']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>			    	
		    	</div>
          	</div>

          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_5']) && $questions[$questionIdMain]['ip_transactions_4_5'] == 'Yes' ? '' : 'display: none;' }}">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.7 For the period from 2010 to 2023, how many ACTIONABLE DISCLOSURES in your IP portfolio have resulted in:</h6>
			    </div>
			    <div class="card-body">
			    	<div class="form-group">
                        <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        <th>As at 31 March 2023 or 31 Dec 2023</th>
			                    </tr>
		                  	</thead>
		                  	<tbody>
			                    @foreach ($actionableDisclosuresIplist as $key => $value)
			                        <tr>
			                            <th>{!! $value !!}</th>
		                                <td>
		                                	@if(isset($questions[$questionId]))
											    {{$questions[$questionId]}}
											@endif
		                                </td>
			                        </tr>
			                        @php $questionId++; @endphp
			                    @endforeach
			                </tbody>
			            </table>
                    </div>			    	
		    	</div>

	      		<div class="card card-info card-outline">
				    <div class="card-header">
				        <h6 class="text-bold mb-0">4.8 What percentage of the total ACTIONABLE DISCLOSURES in your IP portfolio from 2010 to 2023 have ever been commercialised through a LICENSE or ASSIGNMENT?</h6>
				    </div>
				    <div class="card-body">
				    	@php 
				    	$questionId++; 
	                    $extQuestionId = 262;
	                    @endphp
	                    <div class="form-group">
	                    	<label>4.8.1 What percentage of the total ACTIONABLE DISCLOSURES in your IP portfolio from 2010 to 2023 have ever been commercialised through a LICENSE?</label>

		                	@foreach($licenseAssignmentList as $value => $label)
	                            <div class="form-check">

	                            	@if(isset($questions[$extQuestionId]['actionable_disclosures_4_7_1']) && $value==$questions[$extQuestionId]['actionable_disclosures_4_7_1'])
	                                    {!!$greenTick!!}
	                                @else
	                                    {!!$redTick!!}
	                                @endif

	                                {!! Form::label('actionable_disclosures_4_7_1' . $value, $label, ['class' => 'form-check-label mr-4']) !!}
	                            </div>
	                        @endforeach

	                        @php
	                            $extQuestionId++;
	                        @endphp
	                    </div>	 
	                    <hr>
	                    <div class="form-group">
	                    	<label>4.8.2 What percentage of the total ACTIONABLE DISCLOSURES in your IP portfolio from 2010 to 2023 have ever been commercialised through an ASSIGNMENT?</label>

		                	@foreach($licenseAssignmentList as $value => $label)
	                            <div class="form-check">

	                            	@if(isset($questions[$extQuestionId]['actionable_disclosures_4_7_2']) && $value==$questions[$extQuestionId]['actionable_disclosures_4_7_2'])
	                                    {!!$greenTick!!}
	                                @else
	                                    {!!$redTick!!}
	                                @endif
	                                
	                                {!! Form::label('actionable_disclosures_4_7_2' . $value, $label, ['class' => 'form-check-label mr-4']) !!}
	                            </div>
	                        @endforeach
	                    </div>		    	
			    	</div>
	          	</div>
          	</div>

          	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.9 Has your institution received revenue from any IP TRANSACTIONS between 2019 and 2023 that involved an ACTIONABLE DISCLOSURE?</h6>
			    </div>
			    <div class="card-body">
			    	<div class="form-group">
			    		@if(isset($questions[$questionId]['ip_transactions_4_8']) && !empty($questions[$questionId]['ip_transactions_4_8'])) 
						    {{$yesNo[$questions[$questionId]['ip_transactions_4_8']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>	
			    	<div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ip_transactions_4_8']) && $questions[$questionIdMain]['ip_transactions_4_8'] == 'Yes' ? '' : 'display: none;' }}">
                        <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{$year}} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($ipTransactionRevnueList as $key => $value)
									<tr bgcolor="{{($key == 1) ? '#f4f6f9' : ''}}">
								        <th>{!! $value !!}</th>
								        @foreach (getYears() as $year)
								            <td>
								            	@if ($key != 1)
								            		@if(isset($questions[$questionId][$year]))
													    {{$questions[$questionId][$year]}}
													@endif
									            @endif
									        </td>
								        @endforeach
								    </tr>

								    @if($key!=1)
								    	@php $questionId++; @endphp
								    @endif
								@endforeach
			                </tbody>
			            </table>
                    </div>			    	
		    	</div>
          	</div>

          	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.11. Total Number of IP TRANSACTIONS yielding IP TRANSACTION REVENUE:</h6>
			    </div>
			    <div class="card-body">
			    	<ul class="list-unstyled">
                        <li>4.11.1 Please provide the total number of IP transactions that generated revenue for each year</li>
                        <li>4.11.2 For each year, please provide the number of IP transactions that fall into revenue categories indicated in table</li>
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
							            		@if(isset($questions[$questionId][$year]['column_'.$i]))
												    {{$questions[$questionId][$year]['column_'.$i]}}
												@endif
					                       	</td>
                                        @endfor
                                        <th>{!!$randValuesList[$key]!!}</th>
						           	</tr>
						        @endforeach
						        @php $questionId++; @endphp
			                </tbody>
			            </table>
                    </div>			    	
		    	</div>
          	</div>

          	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">4.12 BENEFIT SHARE distribution to IP CREATORS and IP ENABLERS</h6>
			    </div>
			    <div class="card-body">
			    	<div class="form-group">
                        <table class="table table-bordered full-borader">
                        	<thead>
			                    <tr>
			                        <th></th>
			                        @foreach (getYears() as $year)
					                    <th>{{$year}} (R)</th>
					                @endforeach
			                    </tr>
			                </thead>
			                <tbody>
								@foreach($benefitShareList as $key => $value)
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
	    </div>
	</div>
</form>