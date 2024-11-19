<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionThreeForm extends Component
{
    public $yesNo, $questions, $researchDevelopmentList, $clinicalTrialsList, $technologyTransferActivitiesList, $ipTransactionsList, $seedFundingList, $additionalFundingList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->yesNo = Common::$yes_no;
        $this->researchDevelopmentList = Common::getResearchDevelopment();
        $this->clinicalTrialsList = Common::getClinicalTrials();
        $this->technologyTransferActivitiesList = Common::getTechnologyTransferActivities();
        $this->ipTransactionsList = Common::getIpTransactions();
        $this->seedFundingList = Common::getSeedFunding();
        $this->additionalFundingList = Common::getAdditionalFunding();
        $this->questions = getSectionWiseFormData(3, $institutionId);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 3)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-three-form');
    }
}
