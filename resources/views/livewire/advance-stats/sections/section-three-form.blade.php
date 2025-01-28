<form wire:submit.prevent="store">
    <input type="hidden" wire:model="submit_type">
    <div class="card card-info">
        <div class="card-header">
            <h6 class="text-bold mb-0">
                SECTION 3: EXPENDITURE AND FUNDING ASSOCIATED WITH THE TECHNOLOGY TRANSFER
                @include('common.questionnaires_status', ['completedStatus' => $completedStatus])
            </h6>
        </div>
        <div class="card-body"> 
            @php 
                $questionId = 59; 
                $greenTick = '<img src="' . URL::asset('assets/dist/img/check-mark-2-24.png') . '">';
            @endphp
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">3.1 Indicate the total institutional RESEARCH AND DEVELOPMENT EXPENDITURE per annum (*estimate total allowed)</h6>
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
                                @foreach($researchDevelopmentList as $key => $value)
                                    <tr>
                                        <th>{!! $value !!}</th>
                                        @foreach (getYears() as $year)
                                            <td class="text-center">
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
                    <h6 class="text-bold mb-0">3.2 Does your institution include:</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        <label for="medical_school" class="control-label w-100">3.2.1 : A Medical school?</label>

                        @if(isset($questions[$questionId]['medical_school']) && !empty($questions[$questionId]['medical_school'])) 
                            {{$yesNo[$questions[$questionId]['medical_school']]}}
                        @endif

                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group">
                        <label for="clinical_trials" class="control-label w-100">3.2.2 : Conduct CLINICAL TRIALS?</label>

                        @if(isset($questions[$questionId]['clinical_trials']) && !empty($questions[$questionId]['clinical_trials'])) 
                            {{$yesNo[$questions[$questionId]['clinical_trials']]}}
                        @endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['clinical_trials']) && $questions[$questionIdMain]['clinical_trials'] == 'Yes' ? '' : 'display: none;' }}">
                        
                        <label class="control-label w-100">3.2.2.1 : If yes, Please indicate institution’s expenditure on CLINICAL TRIALS</label>

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
                                @foreach($clinicalTrialsList as $key => $value)
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
                    <h6 class="text-bold mb-0">3.3 Indicate the expenditure on TECHNOLOGY TRANSFER ACTIVITIES</h6>
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
                                @foreach($technologyTransferActivitiesList as $key => $value)
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
                    <h6 class="text-bold mb-0">3.4 Indicate the amount received in any IP TRANSACTION, as an IP EXPENSE REIMBURSEMENT</h6>
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
                                @foreach($ipTransactionsList as $key => $value)
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
                    <h6 class="text-bold mb-0">3.5 Does your institution have access to SEED FUNDING?</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @if(isset($questions[$questionId]['seed_funding']) && !empty($questions[$questionId]['seed_funding'])) 
                            {{$yesNo[$questions[$questionId]['seed_funding']]}}
                        @endif

                        @php 
                            $questionIdMain = $questionId;
                            $questionId++; 
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain}}" style="{{ isset($questions[$questionIdMain]['seed_funding']) && $questions[$questionIdMain]['seed_funding'] == 'Yes' ? '' : 'display: none;' }}">

                        <label for="clinical_trials" class="control-label w-100">3.5.1 If yes, Please complete the table below on the amount and sources of SEED FUNDING awarded.</label>

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
                                @foreach($seedFundingList as $key => $value)
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

                                <tr>
                                    <th>3.5.1.4 Please list the source/s of other SEED FUNDING:</th>
                                    <td colspan="5">
                                        @if(isset($questions[$questionId]))
                                            {{$questions[$questionId]}}
                                        @endif
                                    </td>
                                    @php $questionId++; @endphp
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">3.6 Indicate in the table below whether your institution requires additional funding beyond the funds expected (i.e. from either anticipated internal budget allocation or external funder commitment) for the next two financial years (2025 and 2026 calendar years for HEIs and 2025/2026 and 2026/2027 for Schedule 1 institutions) for the listed funding types or categories.</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <ul style="padding-left:20px;">
                            <li>Select "Not Applicable" if this type of funding is not relevant to your institution`s current stage of technology transfer development or portfolio.</li>
                            <li>Select "No Gap" if no additional funding is required for this type of funding.</li>
                            <li>Select one of the four funding ranges in the table below to indicate the extent of the funding requirement if additional funding is needed</li>
                        </ul>
                        <table class="table table-bordered black-border">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center black-bottom black-right">Funding types or categories</th>
                                    <th rowspan="2" class="text-center black-bottom">Not applicable</th>
                                    <th rowspan="2" class="text-center black-bottom">No gap</th>
                                    <th colspan="4" class="text-center">Extent of additional funding required for 2025 and 2026</th>
                                </tr>
                                <tr>
                                    <th class="text-center black-bottom">R1 to R1 mil</th>
                                    <th class="text-center black-bottom">R1 mil to R5 mil</th>
                                    <th class="text-center black-bottom">R5 mil to R10 mil</th>
                                    <th class="text-center black-bottom">More than R10 mil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $rowId = 1; @endphp
                                @if(count($additionalFundingList) > 0)
                                    @foreach($additionalFundingList as $index => $value)
                                        <tr>
                                            <th class="black-right">{{$value}}</th>

                                            @for ($i = 1; $i <= 6; $i++)
                                                <td class="text-center">
                                                    @if(isset($questions[$questionId])) 
                                                        @if($questions[$questionId]==$i)
                                                            {!!$greenTick!!}
                                                        @endif 
                                                    @endif
                                                </td>
                                            @endfor
                                        </tr>
                                        @php
                                            $rowId++;
                                            $questionId++;
                                        @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>