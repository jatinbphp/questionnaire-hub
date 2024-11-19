<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionFourAForm extends Component
{
    public $yesNo, $questions, $optionsList, $licencesList, $southAfricaList, $foreignJurisdictionList, $assignmentsList, $ipTransationsList, $actionableDisclosuresIplist, $licenseAssignmentList, $ipTransactionRevnueList, $benefitShareList, $randValuesList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->yesNo = Common::$yes_no;
        $this->optionsList = Common::getOptions();
        $this->licencesList = Common::getLicences();
        $this->southAfricaList = Common::getSouthAfricaData();
        $this->foreignJurisdictionList = Common::getForeignJurisdiction();
        $this->assignmentsList = Common::getAssignments();
        $this->ipTransationsList = Common::getIpTransations();
        $this->actionableDisclosuresIplist = Common::getActionableDisclosuresIp();
        $this->licenseAssignmentList = Common::getLicenseAssignment();
        $this->ipTransactionRevnueList = Common::getIpTransactionRevnue();
        $this->benefitShareList = Common::getBenefitShare();
        $this->randValuesList = Common::getRandValues();
        $this->questions = getSectionWiseFormData(5, $institutionId);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 5)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-four-a-form');
    }
}
