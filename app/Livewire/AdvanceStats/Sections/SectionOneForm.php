<?php

namespace App\Livewire\AdvanceStats\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionOneForm extends Component
{

    public $policy_guideline, $yes_no, $ip_enablers_share, $appropriate, $questions, $factorsList, $institutionId, $percentageCountData;

    public function mount($institutionId){
        $this->policy_guideline = Common::$policy_guideline;
        $this->yes_no = Common::$yes_no;
        $this->ip_enablers_share = Common::$ip_enablers_share;
        $this->appropriate = Common::$appropriate;
        $this->factorsList = Common::getFactors();
        $this->questions = getSectionWiseData(1);

        $allInstitution = InstitutionsCompletedSection::groupBy('institution_id')
            ->havingRaw('COUNT(*) = 8')->pluck('institution_id');

        // Combined Query for question_id 1-21
        $sectionCompletedd = QuestionAnswer::whereIn('institution_id', $allInstitution)
            ->where('section_id', 1)
            ->where(function($query) {
                $query->whereBetween('question_id', [1, 27])
                      ->orWhereIn('question_id', [30,33,34]);
            })->get(['question_id', 'answers']);

        $results = [];

        // Step 1: Initialize and aggregate counts
        foreach ($sectionCompletedd as $record) {
            $question_id = $record->question_id;
            $answersJson = $record->answers;

            if (empty($answersJson)) {
                continue;
            }

            $answers = explode("\n", $answersJson); // Split each JSON line
            if (empty($answers)) {
                continue;
            }

            // Initialize structure for each question_id
            if (!isset($results[$question_id])) {
                $results[$question_id] = [
                    'importance' => [1 => 0, 2 => 0, 3 => 0], // For question_id 1-16
                    'present' => [4 => 0, 5 => 0, 6 => 0],    // For question_id 1-16
                    'policy' => [1 => 0, 2 => 0, 3 => 0],    // For question_id 17-21
                    'board' => ['Yes' => 0, 'No' => 0],      // For question_id 17-21
                    'broadly' => ['Yes' => 0, 'No' => 0],    // For question_id 17-21
                    'adequate' => ['Yes' => 0, 'No' => 0],   // For question_id 17-21
                    'revenue' => ['Yes' => 0, 'No' => 0],   // For question_id 27
                    'ip_enablers' => ['Yes' => 0, 'No' => 0],   // For question_id 30
                    'company' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],   // For question_id 33
                    'ip_transaction' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],   // For question_id 34
                    'total_responses' => 0
                ];
            }

            foreach ($answers as $answerJson) {
                $answerData = json_decode($answerJson, true);

                if ($answerData === null) {
                    continue; // Skip invalid JSON
                }

                // Increment total responses
                $results[$question_id]['total_responses']++;

                // For question_id 1-16: 'importance' and 'present' keys
                if ($question_id >= 1 && $question_id <= 16) {
                    if (isset($answerData['importance']) && array_key_exists($answerData['importance'], $results[$question_id]['importance'])) {
                        $results[$question_id]['importance'][$answerData['importance']]++;
                    }

                    if (isset($answerData['present']) && array_key_exists($answerData['present'], $results[$question_id]['present'])) {
                        $results[$question_id]['present'][$answerData['present']]++;
                    }
                }

                // For question_id 17-21: 'policy', 'board', 'broadly', and 'adequate' keys
                if ($question_id >= 17 && $question_id <= 26) {
                    if (isset($answerData['policy']) && array_key_exists($answerData['policy'], $results[$question_id]['policy'])) {
                        $results[$question_id]['policy'][$answerData['policy']]++;
                    }

                    if (isset($answerData['board']) && array_key_exists($answerData['board'], $results[$question_id]['board'])) {
                        $results[$question_id]['board'][$answerData['board']]++;
                    }

                    if (isset($answerData['broadly']) && array_key_exists($answerData['broadly'], $results[$question_id]['broadly'])) {
                        $results[$question_id]['broadly'][$answerData['broadly']]++;
                    }

                    if (isset($answerData['adequate']) && array_key_exists($answerData['adequate'], $results[$question_id]['adequate'])) {
                        $results[$question_id]['adequate'][$answerData['adequate']]++;
                    }
                }

                if ($question_id == 27) {
                    if (isset($answerData['revenue']) && array_key_exists($answerData['revenue'], $results[$question_id]['revenue'])) {
                        $results[$question_id]['revenue'][$answerData['revenue']]++;
                    }
                }

                if ($question_id == 30) {
                    if (isset($answerData['institution_policy_ip_enablers']) && array_key_exists($answerData['institution_policy_ip_enablers'], $results[$question_id]['ip_enablers'])) {
                        $results[$question_id]['ip_enablers'][$answerData['institution_policy_ip_enablers']]++;
                    }
                }

                // For question_id 33: 'company'
                if ($question_id == 33) {
                    if (isset($answerData['company']) && array_key_exists($answerData['company'], $results[$question_id]['company'])) {
                        $results[$question_id]['company'][$answerData['company']]++;
                    }
                }

                // For question_id 34: 'ip_transaction'
                if ($question_id == 34) {
                    if (isset($answerData['ip_transaction']) && array_key_exists($answerData['ip_transaction'], $results[$question_id]['ip_transaction'])) {
                        $results[$question_id]['ip_transaction'][$answerData['ip_transaction']]++;
                    }
                }
            }
        }

        // Step 2: Calculate percentages for all keys
        foreach ($results as $question_id => &$data) {
            $totalResponses = $data['total_responses'];

            // Percentages for 'importance' (question_id 1-16)
            foreach ($data['importance'] as $option => $count) {
                $data['importance_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
            }

            // Percentages for 'present' (question_id 1-16)
            foreach ($data['present'] as $option => $count) {
                $data['present_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
            }

            // Percentages for 'policy', 'board', 'broadly', 'adequate' (question_id 17-26)
            foreach (['policy', 'board', 'broadly', 'adequate'] as $key) {
                foreach ($data[$key] as $option => $count) {
                    $data[$key . '_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
                }
            }

            // Percentages for 'revenue' (question_id 27)
            foreach ($data['revenue'] as $option => $count) {
                $data['revenue_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
            }

            // Percentages for 'revenue' (question_id 30)
            foreach ($data['ip_enablers'] as $option => $count) {
                $data['ip_enablers_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
            }

            // Percentages for 'company' (question_id 33)
            foreach ($data['company'] as $option => $count) {
                $data['company_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
            }

            // Percentages for 'ip_transaction' (question_id 34)
            foreach ($data['ip_transaction'] as $option => $count) {
                $data['ip_transaction_percentages'][$option] = ($totalResponses > 0) ? round(($count / $totalResponses) * 100, 2) : 0;
            }
        }

        $this->percentageCountData  = $results;
       
    }

    public function render()
    {
        return view('livewire.advance-stats.sections.section-one-form');
    }
}
