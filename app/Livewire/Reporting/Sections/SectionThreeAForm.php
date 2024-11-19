<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionThreeAForm extends Component
{
    public $yesNo, $questions, $actionableDisclosuresList, $patentPortfolioList, $patentApplicationsReasonsList, $patentsGrantedList, $patentFamilyList, $singleJurisdictionPatentsList, $tradeMarkPortfolioList, $designPortfolioList, $plantBreedersList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->yesNo = Common::$yes_no;
        $this->actionableDisclosuresList = Common::getActionableDisclosures();
        $this->patentPortfolioList = Common::getPatentPortfolio();
        $this->patentApplicationsReasonsList = Common::getPatentApplicationsReasons();
        $this->patentsGrantedList = Common::getPatentsGranted();
        $this->patentFamilyList = Common::getPatentFamily();
        $this->singleJurisdictionPatentsList = Common::getSingleJurisdictionPatents();
        $this->tradeMarkPortfolioList = Common::getTradeMarkPortfolio();
        $this->designPortfolioList = Common::getDesignPortfolio();
        $this->plantBreedersList = Common::getPlantBreeders();
        $this->questions = getSectionWiseFormData(3, $institutionId);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 3)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-three-a-form');
    }
}
