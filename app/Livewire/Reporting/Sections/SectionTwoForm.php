<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionTwoForm extends Component
{
    public $ttf_activities, $yesNo, $questions, $ipManagementTasksList, $staffingTtfList, $staffingOfTheTtf, $staffingOfTheTtfB, $staffingOfTheTtfC, $staffingOfTheTtfD, $staffingOfTheTtfE, $staffingOfTheTtfGender, $newRows, $researchDevelopmentList, $clinicalTrialsList, $technologyTransferActivitiesList, $ipTransactionsList, $seedFundingList, $additionalFundingList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->ttf_activities = Common::$ttf_activities;
        $this->yesNo = Common::$yes_no;
        $this->ipManagementTasksList = Common::getIpManagementTasks();
        $this->staffingTtfList = Common::getStaffingTtf();
        $this->staffingOfTheTtf = Common::getStaffingOfTheTtf();
        $this->staffingOfTheTtfB = Common::getStaffingOfTheTtfB();
        $this->staffingOfTheTtfC = Common::getStaffingOfTheTtfC();
        $this->staffingOfTheTtfD = Common::getStaffingOfTheTtfD();
        $this->staffingOfTheTtfE = Common::getStaffingOfTheTtfE();
        $this->staffingOfTheTtfGender = Common::getStaffingOfTheTtfGender();    
        $this->researchDevelopmentList = Common::getResearchDevelopment();
        $this->clinicalTrialsList = Common::getClinicalTrials();
        $this->technologyTransferActivitiesList = Common::getTechnologyTransferActivities();
        $this->ipTransactionsList = Common::getIpTransactions();
        $this->seedFundingList = Common::getSeedFunding();
        $this->additionalFundingList = Common::getAdditionalFunding();
        $this->questions = getSectionWiseFormData(2, $institutionId);

        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 2)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }   

    public function render(){
        return view('livewire.reporting.sections.section-two-form');
    }
}
