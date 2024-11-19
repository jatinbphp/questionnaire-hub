<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 3B: IP PORTFOLIO (OUTSIDE SCOPE OF IPR ACT)
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 130; @endphp

			<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.6. Does your institution have IP that falls outside the scope of the IPR Act but is still managed by the TTF?</h6>
			    </div>
			    <div class="card-body"> 
			    	<div class="form-group">
			    		@if(isset($questions[$questionId]['ipr_act']) && !empty($questions[$questionId]['ipr_act'])) 
						    {{$yesNo[$questions[$questionId]['ipr_act']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>
	           	</div>
           	</div>

           	<div class="additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ipr_act']) && $questions[$questionIdMain]['ipr_act'] == 'Yes' ? '' : 'display: none;' }}">
	           	<div class="card card-info card-outline">
				    <div class="card-header">
				        <h6 class="text-bold mb-0">3.7. NON-IPR ACT disclosures</h6>
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
									@foreach($nonIprActDisclosuresList as $key => $value)
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
				        <h6 class="text-bold mb-0">3.8. Does your institution have a NON-IPR ACT Patent Portfolio?</h6>
				    </div>
				    <div class="card-body">
				    	<div class="form-group">
				    		@if(isset($questions[$questionId]['non_patent_portfolio']) && !empty($questions[$questionId]['non_patent_portfolio'])) 
							    {{$yesNo[$questions[$questionId]['non_patent_portfolio']]}}
							@endif
	                    
	                        @php 
	                            $questionIdMain = $questionId;
	                            $questionId++; 
	                        @endphp
	                    </div>			    	
			    	</div>
	          	</div>
	          	<div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['non_patent_portfolio']) && $questions[$questionIdMain]['non_patent_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
		      		<div class="card card-info card-outline">
					    <div class="card-header">
					        <h6 class="text-bold mb-0">3.9. Did your institution file any NON-IPR ACT NEW PATENT APPLICATIONS during the period 2019 to 2023? </h6>
					    </div>
					    <div class="card-body">
		                    <div class="form-group">
		                    	@if(isset($questions[$questionId]['non_patent_applications']) && !empty($questions[$questionId]['non_patent_applications'])) 
								    {{$yesNo[$questions[$questionId]['non_patent_applications']]}}
								@endif

		                        @php 
		                            $questionIdMain = $questionId;
		                            $questionId++; 
		                        @endphp
		                    </div>

		                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['non_patent_applications']) && $questions[$questionIdMain]['non_patent_applications'] == 'Yes' ? '' : 'display: none;' }}">
		                        
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
										@foreach($nonIprActNewPatentList as $key => $value)
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

		                    <div class="form-group">
		                        <label class="control-label w-100">3.9.2. In the review period, 2019 to 2023, has your institution abandoned any NON-IPR ACT NEW PATENT APPLICATIONS?</label>

		                        @if(isset($questions[$questionId]['institution_abandoned']) && !empty($questions[$questionId]['institution_abandoned'])) 
								    {{$yesNo[$questions[$questionId]['institution_abandoned']]}}
								@endif

		                        @php 
		                            $questionIdMain = $questionId;
		                            $questionId++; 
		                        @endphp
		                    </div>

		                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['institution_abandoned']) && $questions[$questionIdMain]['institution_abandoned'] == 'Yes' ? '' : 'display: none;' }}">
		                    	
		                    	<label class="control-label w-100">3.9.2.1. If Yes , what was the reason for this:</label>

					            <table class="table table-bordered full-borader">
					                <thead>
					                    <tr>
					                        <th>Reason</th>
					                        <th>Number of NON-IPR ACT Number of NEW PATENT APPLICATIONS abandoned for this reason (Enter 0 if not applicable)</th>
					                    </tr>
					                </thead>
					                <tbody>
						                @if(count($patentApplicationsReasonsList) > 0)
						                    @foreach($patentApplicationsReasonsList as $index => $reasons)
						                        <tr>
							                        <th>{{$reasons}}</th>
					                                <td>
					                                	@if(isset($questions[$questionId]))
														    {{$questions[$questionId]}}
														@endif
					                                </td>
							                    </tr>
						                        @php $questionId++; @endphp
						                    @endforeach
						                @endif
					                </tbody>
					            </table>
		                    </div>
		                </div>
		          	</div>

		      		<div class="card card-info card-outline">
					    <div class="card-header">
					        <h6 class="text-bold mb-0">3.10. Did your institution have any NON-IPR ACT GRANTED PATENTS during the period 2019 to 2023? </h6>
					    </div>
					    <div class="card-body">
					    	<div class="form-group">
					    		@if(isset($questions[$questionId]['non_granted_patent_applications']) && !empty($questions[$questionId]['non_granted_patent_applications'])) 
								    {{$yesNo[$questions[$questionId]['non_granted_patent_applications']]}}
								@endif

		                        @php 
		                            $questionIdMain = $questionId;
		                            $questionId++; 
		                        @endphp
		                    </div>
		            	</div>
		            </div>

		            <div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['non_granted_patent_applications']) && $questions[$questionIdMain]['non_granted_patent_applications'] == 'Yes' ? '' : 'display: none;' }}">
					    <div class="card-header">
					        <h6 class="text-bold mb-0">3.10.1. If yes, indicate in the table below the total number of NON-IPR ACT GRANTED PATENTS for the period 2019 to 2023.</h6>
					    </div>
					    <div class="card-body">

		                    <div class="form-group">
				                <ul class="list-unstyled">
				                    <li>3.10.1. Of the total number of NON-IPR ACT GRANTED PATENTS, please specify the number granted in each region or country listed below. For each region, count each individual member state or country where a patent was granted or validated as a separate granted right.</li>
				                </ul>

				                <p><i>For example: ARIPO Member States: Count each individual ARIPO member state where a patent was granted as a separate granted right. This includes patents granted through ARIPO filings and also patents granted via direct filings in any ARIPO member state (e.g. Kenya).</i></p>           
					      
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
										@foreach($nonPatentsGrantedList as $key => $value)
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
					        <h6 class="text-bold mb-0">3.11. NON-IPR ACT - PATENT FAMILY(/IES)</h6>
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
					                    @foreach ($nonPatentFamilyList as $key => $value)
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

		      		<div class="card card-info card-outline">
					    <div class="card-header">
					        <h6 class="text-bold mb-0">3.12. Single-Jurisdiction Patents</h6>
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
					                    @foreach ($nonSingleJurisdictionPatents as $key => $value)
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

	           	<div class="card card-info card-outline">
				    <div class="card-header">
				        <h6 class="text-bold mb-0">3.13. Does your institution have a NON-IPR ACT TRADE MARK portfolio for products/services associated with IP for that falls outside the scope IPR Act?</h6>
				    </div>
				    <div class="card-body"> 
	                    <div class="form-group">
	                    	@if(isset($questions[$questionId]['ipr_act_trademark_portfolio']) && !empty($questions[$questionId]['ipr_act_trademark_portfolio'])) 
							    {{$yesNo[$questions[$questionId]['ipr_act_trademark_portfolio']]}}
							@endif

	                        @php 
	                            $questionIdMain = $questionId;
	                            $questionId++; 
	                        @endphp
	                    </div>

	                    <div class="card card-info card-outline additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ipr_act_trademark_portfolio']) && $questions[$questionIdMain]['ipr_act_trademark_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
	                        
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
				                    @foreach ($nonTradeMarkPortfolioList as $key => $value)
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
	            
	            <div class="card card-info card-outline">
				    <div class="card-header">
				        <h6 class="text-bold mb-0">3.14. Does your institution have NON-IPR ACT DESIGN portfolio?</h6>
				    </div>
				    <div class="card-body"> 
	                    <div class="form-group">
	                    	@if(isset($questions[$questionId]['ipr_act_design_portfolio']) && !empty($questions[$questionId]['ipr_act_design_portfolio'])) 
							    {{$yesNo[$questions[$questionId]['ipr_act_design_portfolio']]}}
							@endif

	                        @php 
	                            $questionIdMain = $questionId;
	                            $questionId++; 
	                        @endphp
	                    </div>

	                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ipr_act_design_portfolio']) && $questions[$questionIdMain]['ipr_act_design_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
	                        
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
				                    @foreach ($productServicesList as $key => $value)
				                    	@if($key!=2)
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
				                        @endif
				                        @php $questionId++; @endphp
				                    @endforeach
				                </tbody>
				            </table>
	                    </div>
	                </div>
	            </div>
  	
	  			<div class="card card-info card-outline">
				    <div class="card-header">
				        <h6 class="text-bold mb-0">3.15. Does your institution have a NON-IPR ACT PLANT BREEDERS RIGHTS portfolio?</h6>
				    </div>
				    <div class="card-body"> 
	                    <div class="form-group">
	                    	@if(isset($questions[$questionId]['ipr_act_rights_portfolio']) && !empty($questions[$questionId]['ipr_act_rights_portfolio'])) 
							    {{$yesNo[$questions[$questionId]['ipr_act_rights_portfolio']]}}
							@endif

	                        @php 
	                            $questionIdMain = $questionId;
	                            $questionId++; 
	                        @endphp
	                    </div>

	                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['ipr_act_rights_portfolio']) && $questions[$questionIdMain]['ipr_act_rights_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
	                        
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
				                    @foreach ($plantBreedersIprActList as $key => $value)
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
	</div>
</form>