<form wire:submit.prevent="store">
    <input type="hidden" wire:model="submit_type">
    <div class="card card-info">
        <div class="card-header">
            <h6 class="text-bold mb-0">
                SECTION 1: TECHNOLOGY TRANSFER INSTITUTIONAL LANDSCAPE
                @include('common.questionnaires_status', ['completedStatus' => $completedStatus])
            </h6>
        </div>
        <div class="card-body"> 
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.1 Factors of <span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TECHNOLOGY TRANSFER</span>: Please rate the importance, as well as the extent to which these factors are present and functioning within your institution and environment</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        <table class="table table-bordered black-border">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="black-bottom"></th>
                                    <th colspan="3" class="text-center black-bottom black-right black-left">Importance</th>
                                    <th colspan="3" class="text-center black-bottom">Present and Functioning</th>
                                </tr>
                                <tr>
                                    <th class="text-center black-bottom black-left">Not Important</th>
                                    <th class="text-center black-bottom">Moderately Important</th>
                                    <th class="text-center black-bottom">Very Important</th>
                                    <th class="text-center black-bottom black-left">Not Present</th>
                                    <th class="text-center black-bottom">Partially Functioning</th>
                                    <th class="text-center black-bottom">Functioning Effectively</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @php
                                    $rowId = 1;
                                    $questionId = 1;
                                    $greenTick = '<img src="' . URL::asset('assets/dist/img/check-mark-2-24.png') . '">';
                                    $redTick = '<img src="' . URL::asset('assets/dist/img/cancel-24.png') . '">';
                                @endphp

                                @foreach($factorsList as $key => $value)
                                    @if(count($value) > 0)
                                        <tr bgcolor="#f4f6f9">
                                            <th colspan="9" class="black-top black-bottom">{{$key}}</th>
                                        </tr>
                                        @foreach($value as $key_factor => $factor)

                                            <tr>
                                                <th class="black-right">
                                                    {!! $factor !!}<br>
                                                </th>

                                                @for ($i = 1; $i <= 3; $i++)
                                                    <td class="text-center @if($i==3) black-right @endif">
                                                        @if(!empty($questions[$questionId]['importance'])) 
                                                            @if($questions[$questionId]['importance']==$i)
                                                                {!!$greenTick!!}
                                                            @endif 
                                                        @endif
                                                    </td>
                                                @endfor

                                                @for ($i = 4; $i <= 6; $i++)
                                                    <td class="text-center">
                                                        @if(!empty($questions[$questionId]['present'])) 
                                                            @if($questions[$questionId]['present']==$i)
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.2 Does your institution have a policy or guideline that addresses the following aspects/ provisions?</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                        <ul class="list-unstyled">
                            <li>1.2.1 Please select in drop down box: Policy in place, Guideline in place, or No policy or guideline in place.</li>
                            <li>1.2.2 If Policy or Guideline is in place, please answer:</li>
                            <li>
                                <ul class="list-unstyled" style="padding-left: 20px;">
                                    <ll class="d-block">1.2.2.1 Is the relevant policy or guideline approved by the Board/Council?</ll>
                                    <ll class="d-block">1.2.2.2 Is the policy/ guideline broadly adopted and in use?</ll>
                                    <ll class="d-block">1.2.2.3 Is the policy/ guideline adequate or effective?</ll>
                                </ul>
                            </li>
                        </ul>

                        <p>Note: The listed aspects or provisions could all be within the same policy or guideline document</p>
                    
                        <table class="table table-bordered full-borader">
                            <thead>
                                <tr>
                                    <th class="text-center">Aspects/Provisions</th>
                                    <th class="text-center">1.2.1 Policy/Guideline in place or not</th>
                                    <th class="text-center">1.2.2.1 Approved by Board/Council</th>
                                    <th class="text-center">1.2.2.2 Broadly adopted and in use</th>
                                    <th class="text-center">1.2.2.3 Adequate/Effective</th>
                                </tr>
                            </thead>

                            @php
                                $textAspectsProvisions = [
                                    '1.2.1 IP ownership',
                                    '1.2.2 Calculation and distribution of BENEFIT SHARE',
                                    '1.2.3 Research Pricing/Costing',
                                    '1.2.4 Conflict of Interest',
                                    '1.2.5 Private work',
                                    '1.2.6 Commercialisation of IP',
                                    '1.2.7 Creation of START-UP/ SPIN OUT COMPANIES',
                                    '1.2.8 Investment in START-UP/ SPIN OUT COMPANIES',
                                    '1.2.9 Allocation of equity to founders and institution in START-UP/ SPIN OUT COMPANIES',
                                    '1.2.10 Research Data Management',
                                ];
                            @endphp
                            <tbody>
                                @if(count($textAspectsProvisions)>0)
                                    @foreach($textAspectsProvisions as $index_key => $item)
                                        @php $index = $index_key + 1; @endphp
                                        <tr>
                                            <th>
                                                {!! $item !!}
                                            </th>
                                            <td class="text-center">
                                                @if(!empty($questions[$questionId]['policy'])) 
                                                    {{$policy_guideline[$questions[$questionId]['policy']]}}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="additional-fields-{{$questionId}}" style="{{ !empty($questions[$questionId]['policy']) && in_array($questions[$questionId]['policy'], ['1', '2']) ? '' : 'display: none;' }}">

                                                    @if(!empty($questions[$questionId]['board'])) 
                                                        {{$yes_no[$questions[$questionId]['board']]}}
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="additional-fields-{{$questionId}}" style="{{ !empty($questions[$questionId]['policy']) && in_array($questions[$questionId]['policy'], ['1', '2']) ? '' : 'display: none;' }}">
                                                    
                                                    @if(!empty($questions[$questionId]['broadly'])) 
                                                        {{$yes_no[$questions[$questionId]['broadly']]}}
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="additional-fields-{{$questionId}}" style="{{ !empty($questions[$questionId]['policy']) && in_array($questions[$questionId]['policy'], ['1', '2']) ? '' : 'display: none;' }}">
                                                    
                                                    @if(!empty($questions[$questionId]['adequate'])) 
                                                        {{$yes_no[$questions[$questionId]['adequate']]}}
                                                    @endif
                                                </div>
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
                    <h6 class="text-bold mb-0">1.3 Does the policy of your institution provide more than the minimum BENEFIT SHARE to IP CREATORS, as prescribed by the IPR Act (20% of the gross revenue (up to R1 million) and 30% of the nett revenue thereafter)?</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group">

                        @if(!empty($questions[$questionId]['revenue'])) 
                            {{$yes_no[$questions[$questionId]['revenue']]}}
                        @endif

                        @php
                            $questionIdMain13 = $questionId;
                            $questionId++;
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain13}}" style="{{ !empty($questions[$questionIdMain13]['revenue']) && $questions[$questionIdMain13]['revenue'] == 'Yes' ? '' : 'display: none;' }}">
                        
                        <label for="gross_revenue" class="control-label w-100">1.3.1 what percentage of gross revenue is allocated to IP CREATORS?</label>

                        @if(!empty($questions[$questionId]['gross_revenue'])) 
                            {{$questions[$questionId]['gross_revenue']}}
                        @endif

                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain13}}" style="{{ !empty($questions[$questionIdMain13]['revenue']) && $questions[$questionIdMain13]['revenue'] == 'Yes' ? '' : 'display: none;' }}">
                        <label for="nett_revenue" class="control-label w-100">1.3.2 what percentage of nett revenue is allocated to IP CREATORS?</label>

                        @if(!empty($questions[$questionId]['nett_revenue'])) 
                            {{$questions[$questionId]['nett_revenue']}}
                        @endif

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.4 Does your institution’s policy or guideline provide for benefit sharing with IP ENABLERS?</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">

                        @if(!empty($questions[$questionId]['institution_policy_ip_enablers'])) 
                            {{$yes_no[$questions[$questionId]['institution_policy_ip_enablers']]}}
                        @endif

                        @php
                            $questionIdMain14 = $questionId;
                            $questionId++;
                        @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain14}}" style="{{ !empty($questions[$questionIdMain14]['institution_policy_ip_enablers']) && $questions[$questionIdMain14]['institution_policy_ip_enablers'] == 'Yes' ? '' : 'display: none;' }}">
                        <label for="provision" class="control-label w-100">1.4.1 Is the portion allocated to IP ENABLERS derived from the BENEFIT SHARE pool due to IP CREATORS or does the institution have a separate provision or category for IP ENABLERS?</label>

                        @if(!empty($questions[$questionId]['provision'])) 
                            {{$ip_enablers_share[$questions[$questionId]['provision']]}}
                        @endif

                        @php $questionId++; @endphp
                    </div>

                    <div class="form-group additional-fields-{{$questionIdMain14}}" style="{{ !empty($questions[$questionIdMain14]['institution_policy_ip_enablers']) && $questions[$questionIdMain14]['institution_policy_ip_enablers'] == 'Yes' ? '' : 'display: none;' }}">
                        <label for="portion_accruing" class="control-label w-100">1.4.2 Do the IP CREATORS decide on the portion accruing to the IP ENABLERS?</label>

                        @if(!empty($questions[$questionId]['portion_accruing'])) 
                            {{$yes_no[$questions[$questionId]['portion_accruing']]}}
                        @endif

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.5 Select the most appropriate description for the approval processes within your institution to form a START-UP/SPIN OUT COMPANY</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @foreach($appropriate as $value => $label)
                            <div class="mb-1">

                                @if(isset($questions[$questionId]['company']) && $value==$questions[$questionId]['company'])
                                    {!!$greenTick!!}
                                @else
                                    {!!$redTick!!}
                                @endif

                                {!! Form::label('company_' . $value, $label, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.6 Select the most appropriate description for the approval processes within your institution to conclude an IP TRANSACTION</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @foreach($appropriate as $value => $label)
                            <div class="mb-1">

                                @if(isset($questions[$questionId]['ip_transaction']) && $value==$questions[$questionId]['ip_transaction'])
                                    {!!$greenTick!!}
                                @else
                                    {!!$redTick!!}
                                @endif

                                {!! Form::label('ip_transaction_' . $value, $label, ['class' => 'form-check-label']) !!}
                            </div>
                        @endforeach

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>