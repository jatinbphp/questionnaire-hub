<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionThreeBForm extends Component
{

    public $yesNo, $questions, $nonIprActDisclosuresList, $nonIprActNewPatentList, $patentApplicationsReasonsList, $nonPatentsGrantedList, $nonPatentFamilyList, $nonSingleJurisdictionPatents, $nonTradeMarkPortfolioList, $productServicesList, $plantBreedersIprActList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->yesNo = Common::$yes_no;
        $this->nonIprActDisclosuresList = Common::getNonIprActDisclosures();
        $this->nonIprActNewPatentList = Common::getNonIprActNewPatent();
        $this->patentApplicationsReasonsList = Common::getPatentApplicationsReasons();
        $this->nonPatentsGrantedList = Common::getNonPatentsGranted();
        $this->nonPatentFamilyList = Common::getNonPatentFamily();
        $this->nonSingleJurisdictionPatents = Common::getNonSingleJurisdictionPatents();
        $this->nonTradeMarkPortfolioList = Common::getNonTradeMarkPortfolio();
        $this->productServicesList = Common::getProductServices();
        $this->plantBreedersIprActList = Common::getPlantBreedersIprAct();
        $this->questions = getSectionWiseFormData(4, $institutionId);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 4)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-three-b-form');
    }
}
