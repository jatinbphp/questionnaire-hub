<form wire:submit.prevent="store">
    <input type="hidden" wire:model="submit_type">
    <div class="card card-info">
        <div class="card-header">
            <h6 class="text-bold mb-0">
                SECTION 1: TECHNOLOGY TRANSFER INSTITUTIONAL LANDSCAPE
            </h6>
        </div>
        <div class="card-body"> 
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.1 Factors of <span data-toggle="tooltip" data-placement="top" title="An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.">TECHNOLOGY TRANSFER</span>: Please rate the importance, as well as the extent to which these factors are present and functioning within your institution and environment</h6>
                </div>
                <div class="card-body"> 
                    <div class="form-group mb-0">
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
                                                      @php
                                                        $iPercentage = $percentageCountData[$questionId]['importance_percentages'][$i];
                                                      @endphp
                                                      @if($iPercentage > 0)
                                                        <span class="badge badge-dark data-percentage">
                                                          {{ $iPercentage.'%' }}
                                                        </span>
                                                      @endif
                                                    </td>
                                                @endfor

                                                @for ($i = 4; $i <= 6; $i++)
                                                    <td class="text-center">
                                                      @php
                                                        $prePercentage = $percentageCountData[$questionId]['present_percentages'][$i];
                                                      @endphp

                                                      @if($prePercentage > 0)
                                                        <span class="badge badge-dark data-percentage">
                                                          {{ $prePercentage.'%' }}
                                                        </span>
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
                    <div class="form-group mb-0">
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
                                    <th class="text-center" rowspan="2">Aspects/Provisions</th>
                                    <th class="text-center" colspan="3">1.2.1 Policy/Guideline in place or not</th>
                                    <th class="text-center" colspan="2">1.2.2.1 Approved by Board/Council</th>
                                    <th class="text-center" colspan="2">1.2.2.2 Broadly adopted and in use</th>
                                    <th class="text-center" colspan="2">1.2.2.3 Adequate/Effective</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Policy in place</th>
                                    <th class="text-center">Guideline in place</th>
                                    <th class="text-center">No policy or guideline in place</th>

                                    <th class="text-center">Yes</th>
                                    <th class="text-center">No</th>

                                    <th class="text-center">Yes</th>
                                    <th class="text-center">No</th>

                                    <th class="text-center">Yes</th>
                                    <th class="text-center">No</th>
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
                                            <!--1.2.1 Policy/Guideline in place or not-->
                                            @for($i=1; $i<=3; $i++)
                                                <td class="text-center">
                                                    @php
                                                      $policyPercentage = $percentageCountData[$questionId]['policy_percentages'][$i];
                                                    @endphp
                                                    @if($policyPercentage > 0)
                                                      <span class="badge badge-dark data-percentage">
                                                        {{ $policyPercentage.'%' }}
                                                      </span>
                                                    @endif
                                                </td>
                                            @endfor

                                            <!--1.2.2.1 Approved by Board/Council-->
                                            @for($i=1; $i<=2; $i++)
                                              @php $ans = $i==1 ? 'Yes':'No'; @endphp
                                                <td class="text-center">
                                                    <div class="additional-fields-{{$questionId}}">
                                                      @php
                                                        $boardPercentage = $percentageCountData[$questionId]['board_percentages'][$ans];
                                                      @endphp
                                                      @if($boardPercentage > 0)
                                                        <span class="badge badge-dark data-percentage">
                                                          {{ $boardPercentage.'%' }}
                                                        </span>
                                                      @endif
                                                    </div>
                                                </td>
                                            @endfor

                                            <!--1.2.2.2 Broadly adopted and in use-->
                                            @for($i=1; $i<=2; $i++)
                                              @php $ans = $i==1 ? 'Yes':'No'; @endphp
                                                <td class="text-center">
                                                    <div class="additional-fields-{{$questionId}}">
                                                        @php
                                                          $broadlyPercentage = $percentageCountData[$questionId]['broadly_percentages'][$ans];
                                                        @endphp
                                                        @if($broadlyPercentage > 0)
                                                          <span class="badge badge-dark data-percentage">
                                                            {{ $broadlyPercentage.'%' }}
                                                          </span>
                                                        @endif
                                                    </div>
                                                </td>
                                            @endfor

                                            <!--1.2.2.3 Adequate/Effective-->
                                            @for($i=1; $i<=2; $i++)
                                              @php $ans = $i==1 ? 'Yes':'No'; @endphp
                                                <td class="text-center">
                                                    <div class="additional-fields-{{$questionId}}">
                                                        @php
                                                          $adequatePercentage = $percentageCountData[$questionId]['adequate_percentages'][$ans];
                                                        @endphp
                                                        @if($adequatePercentage > 0)
                                                          <span class="badge badge-dark data-percentage">
                                                            {{ $adequatePercentage.'%' }}
                                                          </span>
                                                        @endif
                                                    </div>
                                                </td>
                                            @endfor
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
                    <div class="form-group mb-0">
                      <div class="additional-fields-{{$questionId}} float-left mr-2">
                        @php
                          $revenueYesPercentage = $percentageCountData[$questionId]['revenue_percentages']['Yes'];
                        @endphp
                        <span class="badge badge-dark data-percentage">
                          {{ 'Yes - '.$revenueYesPercentage.'%' }}
                        </span>
                      </div>

                      <div class="additional-fields-{{$questionId}}">
                        @php
                          $revenueNoPercentage = $percentageCountData[$questionId]['revenue_percentages']['No'];
                        @endphp
                        <span class="badge badge-dark data-percentage">
                          {{ 'No - '.$revenueNoPercentage.'%' }}
                        </span>
                      </div>
                    </div>
                </div>
            </div>
            
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.4 Does your institution’s policy or guideline provide for benefit sharing with IP ENABLERS?</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-0">
                      <div class="additional-fields-{{$questionId}} float-left mr-2">
                        @php
                          $ipYesPercentage = $percentageCountData[30]['ip_enablers_percentages']['Yes'];
                        @endphp
                        <span class="badge badge-dark data-percentage">
                          {{ 'Yes - '.$ipYesPercentage.'%' }}
                        </span>
                      </div>

                      <div class="additional-fields-{{$questionId}}">
                        @php
                          $ipNoPercentage = $percentageCountData[30]['ip_enablers_percentages']['No'];
                        @endphp
                        <span class="badge badge-dark data-percentage">
                          {{ 'No - '.$ipNoPercentage.'%' }}
                        </span>
                      </div>
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h6 class="text-bold mb-0">1.5 Select the most appropriate description for the approval processes within your institution to form a START-UP/SPIN OUT COMPANY</h6>
                </div>
                <div class="card-body question-percentage">
                    <div class="form-group mb-0">
                        @foreach($appropriate as $value => $label)
                          <div class="mb-1">
                            @php
                              $companyPercentage = $percentageCountData[33]['company_percentages'][$value];
                            @endphp

                            {!! Form::label('company_' . $value, $label, ['class' => 'form-check-label']) !!}

                            <span class="badge badge-dark data-percentage">
                              {{ $companyPercentage.'%' }}
                            </span>
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
                <div class="card-body question-percentage">
                    <div class="form-group mb-0">
                        @foreach($appropriate as $value => $label)
                          <div class="mb-1">
                            @php
                              $ipTransPercentage = $percentageCountData[34]['ip_transaction_percentages'][$value];
                            @endphp
                              
                            {!! Form::label('ip_transaction_' . $value, $label, ['class' => 'form-check-label']) !!}

                            <span class="badge badge-dark data-percentage">
                              {{ $ipTransPercentage.'%' }}
                            </span>
                          </div>
                        @endforeach

                        @php $questionId++; @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>