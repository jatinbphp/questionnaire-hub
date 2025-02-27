<form wire:submit.prevent="store">
	<input type="hidden" wire:model="submit_type">
	<div class="card card-info">
	    <div class="card-header">
	        <h6 class="text-bold mb-0">
	        	SECTION 3A: IP PORTFOLIO (ONLY IPR ACT RELATED IP)
	        	@include('common.questionnaires_status', ['completedStatus' => $completedStatus])
	        </h6>
	    </div>
	    <div class="card-body"> 
	    	@php $questionId = 86; @endphp

           	<div class="card card-info card-outline">
			    <div class="card-header">
			        <h6 class="text-bold mb-0">3.1 ACTIONABLE DISCLOSURES</h6>
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
			                    @foreach ($actionableDisclosuresList as $key => $value)
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
			        <h6 class="text-bold mb-0">3.2 Does your institution have a Patent Portfolio?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">

                    	@if(isset($questions[$questionId]['patent_portfolio']) && !empty($questions[$questionId]['patent_portfolio'])) 
                            {{$yesNo[$questions[$questionId]['patent_portfolio']]}}
                        @endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['patent_portfolio']) && $questions[$questionIdMain]['patent_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
								@foreach($patentPortfolioList as $key => $value)
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
                        <label class="control-label w-100">3.2.2 In the review period, 2019 to 2023, has your institution abandoned any NEW PATENT APPLICATIONS?</label>

                        @if(isset($questions[$questionId]['patent_applications']) && !empty($questions[$questionId]['patent_applications'])) 
						    {{$yesNo[$questions[$questionId]['patent_applications']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['patent_applications']) && $questions[$questionIdMain]['patent_applications'] == 'Yes' ? '' : 'display: none;' }}">
                        
			            <table class="table table-bordered full-borader">
			                <thead>
			                    <tr>
			                        <th>Reason</th>
			                        <th>Number of NEW PATENT APPLICATIONS abandoned for this reason (Enter 0 if not applicable)</th>
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

                    <div class="form-group">
		            	<label for="patent_applications" class="control-label w-100">3.2.3 Indicate in the table below the total number of GRANTED PATENTS for the period 2019 to 2023.</label>
		                <ul>
		                    <li>3.2.3.1 Of the total number of GRANTED PATENTS, please specify the number granted in each region or country listed below. For each region, count each individual member state or country where a patent was granted or validated as a separate granted right.</li>
		                </ul>

		                <label for="patent_applications" class="control-label w-100"> <i>For example: ARIPO Member States: Count each individual ARIPO member state where a patent was granted as a separate granted right. This includes patents granted through ARIPO filings and also patents granted via direct filings in any ARIPO member state (e.g. Kenya).</i></label>           
			      
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
								@foreach($patentsGrantedList as $key => $value)
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
		            	<label class="control-label w-100">3.2.4 PATENT FAMILY(/IES)</label>
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
			                    @foreach ($patentFamilyList as $key => $value)
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
		            	<label class="control-label w-100">3.2.5 Single-Jurisdiction Patents</label>
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
			                    @foreach ($singleJurisdictionPatentsList as $key => $value)
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
			        <h6 class="text-bold mb-0">3.3 Does your institution have a TRADE MARK Portfolio for products/services associated with IP?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                    	@if(isset($questions[$questionId]['trademark_portfolio']) && !empty($questions[$questionId]['trademark_portfolio'])) 
						    {{$yesNo[$questions[$questionId]['trademark_portfolio']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['trademark_portfolio']) && $questions[$questionIdMain]['trademark_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
			                    @foreach ($tradeMarkPortfolioList as $key => $value)
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
			        <h6 class="text-bold mb-0">3.4 Does your institution have a DESIGN Portfolio?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                    	@if(isset($questions[$questionId]['design_portfolio']) && !empty($questions[$questionId]['design_portfolio'])) 
						    {{$yesNo[$questions[$questionId]['design_portfolio']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['design_portfolio']) && $questions[$questionIdMain]['design_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
			                    @foreach ($designPortfolioList as $key => $value)
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
			        <h6 class="text-bold mb-0">3.5 Does your institution have a PLANT BREEDERS RIGHTS Portfolio?</h6>
			    </div>
			    <div class="card-body"> 
                    <div class="form-group">
                    	@if(isset($questions[$questionId]['rights_portfolio']) && !empty($questions[$questionId]['rights_portfolio'])) 
						    {{$yesNo[$questions[$questionId]['rights_portfolio']]}}
						@endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['rights_portfolio']) && $questions[$questionIdMain]['rights_portfolio'] == 'Yes' ? '' : 'display: none;' }}">
                        
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
			                    @foreach ($plantBreedersList as $key => $value)
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