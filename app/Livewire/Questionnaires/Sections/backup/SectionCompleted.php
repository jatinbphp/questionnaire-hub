<?php

namespace App\Livewire\Questionnaires\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionCompleted extends Component
{
    public function mount(){
    }

    public function render()
    {
        return view('livewire.questionnaires.sections.section-completed');
    }
}
