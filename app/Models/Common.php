<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;

    const USERTYPE_SUBMITTER = 'submitter';
    const USERTYPE_USER = 'user';

    public static $userTypes = [
        self::USERTYPE_SUBMITTER => 'Submitter',
        self::USERTYPE_USER => 'User',
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    public static $status = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

    const TITLE_MR = 'Mr.';
    const TITLE_MRS = 'Mrs.';
    const TITLE_MISS = 'Miss.';
    const TITLE_MS = 'Ms.';
    const TITLE_PROF = 'Prof.';
    const TITLE_DR = 'Dr.';
    const TITLE_OTHER = 'Other.';

    public static $titles = [
        self::TITLE_MR => 'Mr.',
        self::TITLE_MRS => 'Mrs.',
        self::TITLE_MISS => 'Miss.',
        self::TITLE_MS => 'Ms.',
        self::TITLE_PROF => 'Prof.',
        self::TITLE_DR => 'Dr.',
        self::TITLE_OTHER => 'Other.',
    ];

    const OPTION_YES = 'Yes';
    const OPTION_NO = 'No';

    public static $yes_no = [
        self::OPTION_YES => 'Yes',
        self::OPTION_NO => 'No',
    ];

    const POLiCY_GUIDELINE_OPTION1 = 1;
    const POLiCY_GUIDELINE_OPTION2 = 2;
    const POLiCY_GUIDELINE_OPTION3 = 3;

    public static $policy_guideline = [
        self::POLiCY_GUIDELINE_OPTION1 => 'Policy in place',
        self::POLiCY_GUIDELINE_OPTION2 => 'Guideline in place',
        self::POLiCY_GUIDELINE_OPTION3 => 'No policy or guideline in place',
    ];

    const IP_ENABLERS_OPTION1 = 1;
    const IP_ENABLERS_OPTION2 = 2;

    public static $ip_enablers_share = [
        self::IP_ENABLERS_OPTION1 => 'Share in IP Creators’ Pool',
        self::IP_ENABLERS_OPTION2 => 'Separate Provision',
    ];

    const APPROPRIATE_OPTION1 = 1;
    const APPROPRIATE_OPTION2 = 2;
    const APPROPRIATE_OPTION3 = 3;
    const APPROPRIATE_OPTION4 = 4;
    const APPROPRIATE_OPTION5 = 5;

    public static $appropriate = [
        self::APPROPRIATE_OPTION1 => 'Complex yet still efficient',
        self::APPROPRIATE_OPTION2 => 'Simple yet generally inefficient',
        self::APPROPRIATE_OPTION3 => 'No formal approval process in place',
        self::APPROPRIATE_OPTION4 => 'Complex and inefficient',
        self::APPROPRIATE_OPTION5 => 'Simple and efficient',
    ];

    const TTF_ACTIVITY1 = 1;
    const TTF_ACTIVITY2 = 2;
    const TTF_ACTIVITY3 = 3;
    const TTF_ACTIVITY4 = 4;

    public static $ttf_activities = [
        self::TTF_ACTIVITY1 => 'Undertaken by TTF',
        self::TTF_ACTIVITY2 => 'Outsourced by TTF',
        self::TTF_ACTIVITY3 => 'Done elsewhere in institution',
        self::TTF_ACTIVITY4 => 'Not done',
    ];

    //Section 1
    public static function getFactors(){
        return [
            "INTERNAL FACTORS" => [
                '1.1.1 Internal (institutional) individual relationships, for example relationships with innovative researchers',
                '1.1.2 Support from institution’s executive/management',
                '1.1.3 Awareness amongst research staff and students about the importance of disclosing and managing IP',
                '1.1.4 Externally focussed marketing for IP/Technologies channels such as websites, brochures, etc',
                '1.1.5 Internally focussed marketing for IP/Technologies channels, such as websites, bulk email, newsletters, guides, etc',
                '1.1.6 Calculation and distribution of <span data-toggle="tooltip" data-placement="top" title="An amount allocated and distributed by an institution to an IP CREATOR in terms of section 10 of the IPR Act and/or an IP ENABLER in terms of that institution’s policies.">BENEFIT SHARE</span>',
                '1.1.7 <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> permitted by the institution to appoint suitable and sufficient number of <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TT</span> staff',
                '1.1.8 <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> permitted by the institution to negotiate and recommend an <span data-toggle="tooltip" data-placement="top" title="A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP.">IP TRANSACTION</span>',
                '1.1.9 <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> permitted by the institution to establish <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>',
                '1.1.10 <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> permitted by the institution to establish an incubator',
                '1.1.11 Access to incubation space (either managed by <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> or available externally) albeit not established by <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span>',
            ],
            "EXTERNAL FACTORS" => [
                '1.1.12 A consultative engagement on national technology needs and challenges',
                '1.1.13 A national online platform to showcase technologies beside Innovation bridge',
                '1.1.14 A national technology showcasing event',
                '1.1.15 An international platform to showcase technologies',
                '1.1.16 <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> engagements with industry (formal and informal)',
            ]
        ];
    }

    //section 2
    public static function getIpManagementTasks(){
        return [
            "Administrative and IP Management" => [
                "Identifying and sourcing <span data-toggle=tooltip data-placement=top title='A written disclosure of potential IP that is reported to the TTF  for evaluation by the TTF and for which, if warranted IP protection will be sought.  If governed by the IPR Act these are referred to as ACTIONABLE DISCLOSURES.'>DISCLOSURES</span>",
                "Conducting novelty searches",
                "Managing process of IP registration, prosecution, and maintenance",
                "Statutory Compliance (IPR Act disclosures, referrals etc)",
                "Contract management for R&D",
                "Contract management for <span data-toggle=tooltip data-placement=top title='An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.'>TTA</span>",
                "Conducting institutional training/awareness workshops, seminars, etc. on IP and innovation",
                "Dealing with open source, open access or open educational resources",
                "Handling requests for publication of R&D outputs by institution or collaborators",
                "Management of student entrepreneurship programmes",
                "Engagement with industry – Building networks for collaboration",
                "Handling copyright matters"
            ],
            "Commercialisation" => [
                "Development of route-to-market/commercialisation strategy",
                "Marketing of technologies",
                "Deal structuring and negotiating an <span data-toggle=tooltip data-placement=top title='A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP. '>IP TRANSACTION</span>",
                "Establishing and supporting <span data-toggle=tooltip data-placement=top title='A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.'>START-UP/SPIN OUT COMPANIES</span>",
                "Fundraising for technology development and commercialisation",
                "Managing an institution incubator",
                "Managing proof-of-concept, pre-seed or seed funding",
                "Developing and managing social impact or community-based projects"
            ],
            "Enforcement" => [
                "Monitoring infringement of institution’s IP",
                "Ensuring institution’s freedom to operate (non-infringement of third-party IP)",
                "Enforcing institution’s IP in infringement litigation"
            ]
        ];
    }

    public static function getStaffingTtf(){
        return [
            "Staff member #",
            "(A) Employment contract",
            "Gender",
            "(B) Population group",
            "(C) Highest qualification",
            "(D) Undergraduate field",
            "(C) Highest qualification",
            "(D) Undergraduate field",
            "(E) Professional Qualification",
            "Years of <span data-toggle=tooltip data-placement=top title='An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.'>TT</span> experience",
            "<span data-toggle=tooltip data-placement=top title='An activity associated with the identification, documentation, evaluation, protection, marketing and commercialisation of technology, as well as IP management, in general.'>TT</span> <span data-toggle=tooltip data-placement=top title='A person or number of persons who collectively, fulfil a job function on a full-time basis for the period of a year.'>FTE</span>",
            "Other <span data-toggle=tooltip data-placement=top title='A person or number of persons who collectively, fulfil a job function on a full-time basis for the period of a year.'>FTE</span>",
            "Total <span data-toggle=tooltip data-placement=top title='A person or number of persons who collectively, fulfil a job function on a full-time basis for the period of a year.'>FTEs</span>",
        ];
    }

    //section 3
    public static function getResearchDevelopment(){
        return [
            "<span data-toggle=tooltip data-placement=top title='The expenditure incurred in performing research and development (R&D) activities, whether funded by the institution that conducts the R&D, external funders, customers, public funding agencies or any other source.'>RESEARCH AND DEVELOPMENT EXPENDITURE</span> (including <span data-toggle=tooltip data-placement=top title='A systematic test conducted on human volunteers before a new drug, vaccine, device or treatment can be introduced into the market to ensure that it is both safe and effective and which test is approved by the South African Health Products Regulatory Authority (SAHPRA), including four standard phases, three of which take place before permission to manufacture is granted.'>CLINICAL TRIAL</span> expenditure)",
        ];
    }
    
    public static function getClinicalTrials(){
        return [
            "<span data-toggle=tooltip data-placement=top title='A systematic test conducted on human volunteers before a new drug, vaccine, device or treatment can be introduced into the market to ensure that it is both safe and effective and which test is approved by the South African Health Products Regulatory Authority (SAHPRA), including four standard phases, three of which take place before permission to manufacture is granted.'>CLINICAL TRIAL</span> expenditure",
        ];
    }

    public static function getTechnologyTransferActivities(){
        return [
            "<span data-toggle=tooltip data-placement=top title='An amount spent by an institution in external legal fees for filing, prosecuting, obtaining, maintaining, renewing and commercialising its own IP, but excluding LITIGATION EXPENDITURE.'>IP EXPENDITURE</span>",
            "<span data-toggle=tooltip data-placement=top title='All litigation expenses associated with the enforcement or defence of an institution’s rights in a DISCLOSURE.'>LITIGATION EXPENDITURE</span>",
            "<span data-toggle=tooltip data-placement=top title='The expenses associated with the operation of the TTF, such as human resource costs, office infrastructure, internal consultants, marketing and OPERATIONAL ACTIVITIES and COMMERCIALISATION ACTIVITIES,  but excluding IP EXPENDITURE, LITIGATION EXPENDITURE, TIA SEED FUNDING and NON-TIA SEED FUNDING.'>TT OPERATIONS EXPENDITURE</span> (note that this includes expenditure on <span data-toggle=tooltip data-placement=top title='Operational activities include hosting IP awareness workshops / seminars, IP and TT related events, access to IP analysis or showcasing platforms, access to TT administration tools (databases, search tools IP databases), marketing/promotional materials to promote the TTF including design and printing cost.'>OPERATIONAL ACTIVITIES</span> and <span data-toggle=tooltip data-placement=top title='Commercialisation Activities include IP Audits, access to IP showcasing platforms, contract drafting, techno-economic feasibility analysis, market assessment, business plan development, technology marketing, short-term appointment of expert to assist with commercialisation, start-up or incubation-related activities'>COMMERCIALISATION ACTIVITIES</span>)",
        ];
    }

    public static function getIpTransactions(){
        return [
            "<span data-toggle=tooltip data-placement=top title='An amount recouped by or paid to an institution, from another party to an IP TRANSACTION, which amount is used or earmarked for use as IP EXPENDITURE'>IP EXPENSE REIMBURSEMENT</span>",
        ];
    }

    public static function getSeedFunding(){
        return [
            "2.7.1.1 Amount of <span data-toggle=tooltip data-placement=top title='SEED FUNDING received from the Technology Innovation Agency (TIA) '>TIA SEED FUNDING</span>  awarded",
            "2.7.1.2 Amount of <span data-toggle=tooltip data-placement=top title='Funding provided to support early-stage development of IP in the early-stages or post proof of concept (Technology Readiness Level (TRL) 3 to 5), to assist the recipient of the funds to achieve critical development milestones, to attract further funding.'>SEED FUNDING</span>  from own institution awarded",
            "2.7.1.3 Amount of other <span data-toggle=tooltip data-placement=top title='Funding provided to support early-stage development of IP in the early-stages or post proof of concept (Technology Readiness Level (TRL) 3 to 5), to assist the recipient of the funds to achieve critical development milestones, to attract further funding.'>SEED FUNDING</span>  from other sources awarded",
            "Total <span data-toggle=tooltip data-placement=top title='Funding provided to support early-stage development of IP in the early-stages or post proof of concept (Technology Readiness Level (TRL) 3 to 5), to assist the recipient of the funds to achieve critical development milestones, to attract further funding.'>SEED FUNDING</span> ",
        ];
    }

    public static function getAdditionalFunding(){
        return [
            'Strategic review funding (market research, technical due diligence, techno-economic feasibility analysis, business model analysis)',       
            'Business development funding (including marketing and excluding human capital development)',
            'To support <span data-toggle=tooltip data-placement=top title="The expenses associated with the operation of the TTF, such as human resource costs, office infrastructure, internal consultants, marketing and OPERATIONAL ACTIVITIES and COMMERCIALISATION ACTIVITIES,  but excluding IP EXPENDITURE, LITIGATION EXPENDITURE, TIA SEED FUNDING and NON-TIA SEED FUNDING.">TT OPERATIONS EXPENDITURE</span>', 
            'Funding to engage specialist resources, e.g. industry experts, mentors, etc',                    
            'Early-stage development and translation of research outputs into prototypes and fundable ideas for commercialisation (Seed Funding)',           
            'Further technology development and early commercialisation (Post Seed Funding)',
            'Early-stage venture capital/ commercialisation funding',
            'Support funding for incubation of start-up/spin-out companies',
            'Funding for the formation or incorporation of <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> ',
            'Scaling up of <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> (business strategy and customer track record established)',
            '<span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> expansion funding, product optimisation or development of alternative/ additional products, increasing market share',
            'Due diligence of licensee/assignee (pre-IP transaction)',                   
            'Audit of license (post IP transaction)',
        ];
    }

    public static function getStaffingOfTheTtf(){
        return [
            'Permanent',       
            'Fixed Term Employee',
            'Intern', 
        ];
    }

    public static function getStaffingOfTheTtfB(){
        return [
            'African',       
            'Coloured',
            'Indian/Asian', 
            'White',
        ];
    }

    public static function getStaffingOfTheTtfC(){
        return [
            'PhD/Doctorate',       
            'Masters',
            'Hons', 
            'Bachelors',
            'Diploma',
            'Other',
            'School Leavers Certificate such as Matric or international equivalent (e.g. A or O levels)',
            'Not Applicable',
        ];
    }

    public static function getStaffingOfTheTtfD(){
        return [
            'Physical Sciences', 
            'Life Sciences',
            'Engineering and Technology',
            'Medical and Health Sciences',
            'Agricultural Sciences',
            'Business/commerce',
            'Educational sciences',    
            'Law',
            'Social Sciences',
            'Humanities',
            'Other',
            'Not Applicable',
        ];
    }

    public static function getStaffingOfTheTtfE(){
        return [
            'Registered Technology Transfer Professional', 
            'Certified Licensing Professional)',
            'Both',
            'Other/none',
        ];
    }

    public static function getStaffingOfTheTtfGender(){
        return [
            'Male', 
            'Female',
        ];
    }

    // Section 3A
    public static function getActionableDisclosures(){
        return [
            '3.1.1 Indicate the total number of new <span data-toggle="tooltip" data-placement="top" title="A disclosure of IP which is reportable to NIPMO on an IP7 Form as described by NIPMO in Practice Note 5. ">ACTIONABLE DISCLOSURES</span> reported to <span data-toggle="tooltip" data-placement="top" title="National Intellectual Property Management Office">NIPMO</span>',
            '3.1.2 Total number of <span data-toggle="tooltip" data-placement="top" title="A disclosure of IP which is reportable to NIPMO on an IP7 Form as described by NIPMO in Practice Note 5. ">ACTIONABLE DISCLOSURES</span> within the portfolio managed by the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span>'
        ];
    }

    public static function getPatentPortfolio(){
        return [
            '3.2.1 Total number of <span data-toggle="tooltip" data-placement="top" title="A first application for a patent that does not claim priority from any other application.">NEW PATENT APPLICATIONS</span> filed <i>(auto summed for ease of reference)</i>',
            'How many <span data-toggle="tooltip" data-placement="top" title="A first application for a patent that does not claim priority from any other application.">NEW PATENT APPLICATIONS</span> filed were',
            '3.2.1.1 <span data-toggle="tooltip" data-placement="top" title="A provisional patent application filed in South Africa, filed at the CIPC in South Africa, establishing a priority date that can be claimed by later applications.">SA PROVISIONAL PATENT APPLICATIONS</span>',
            '3.2.1.2 <span data-toggle="tooltip" data-placement="top" title="A complete patent application filed at the CIPC in South Africa, which once granted will result in a South African patent.">SA COMPLETE PATENT APPLICATION</span> (as a <span data-toggle="tooltip" data-placement="top" title="This refers to the first patent application in a PATENT FAMILY that establishes a priority date which is claimed by the other applications in the PATENT FAMILY.">FIRST FILING</span>)',
            '3.2.1.3  All other <span data-toggle="tooltip" data-placement="top" title="A first application for a patent that does not claim priority from any other application.">NEW PATENT APPLICATIONS</span> filed (such as applications filed in a territory other than South Africa, as a <span data-toggle="tooltip" data-placement="top" title="This refers to the first patent application in a PATENT FAMILY that establishes a priority date which is claimed by the other applications in the PATENT FAMILY.">FIRST FILING</span>, provisional or complete patents,  or PCT, etc.)',
        ];
    }

    public static function getPatentApplicationsReasons(){
        return [
            'Supporting data unavailable (e.g. inventor not available, technical information incomplete, further R&D required)',
            'Lack of funding resources (including resources to appoint expertise to continue patent process)',
            'Novelty search revealed lack of novelty or inventiveness',
            'Assessment revealed lack of techno-economically viability',
            'Market research revealed insufficient commercial opportunity',
            'Other',
        ];
    }

    public static function getPatentsGranted(){
        return [
            'Total number of <span data-toggle="tooltip" data-placement="top" title="A patent in respect of an invention that has been granted in any territory.">GRANTED PATENTS</span>',
            'Of these, how many were',
            'ARIPO Member States (count each member state separately) <a target="_blank" href="https://www.aripo.org/public/member-states">Member States - The African Regional Intellectual Property Organization (ARIPO)</a>',
            'Australia',
            'Brazil',
            'Chile',
            'China',
            'European Members States (count each member state separately) <a target="_blank" href="https://www.epo.org/en/about-us/foundation/member-states">Member States European Patent Organisation</a>',
            'Gulf Cooperation Council (GCC) Member States (count each member state separately) <a target="_blank" href="https://www.britannica.com/topic/Gulf-Cooperation-Council">Gulf Cooperation Council (GCC) Member Countries</a>',
            'India',
            'Japan',
            'Russian Federation',
            'South Africa',
            'United Kingdom',
            'United States of America',
            'Other',
        ];
    }

    public static function getPatentFamily(){
        return [
            'Total number of <span data-toggle="tooltip" data-placement="top" title="A group comprising a number of corresponding patents and/or patent applications, filed in one or more territories in respect of the same invention, all claiming priority from the same NEW PATENT APPLICATION.">PATENT FAMILY(/IES)</span> in the portfolio with at least one jurisdiction granted',
        ];
    }

    public static function getSingleJurisdictionPatents(){
        return [
            'Total number of patents in the portfolio with only a <span data-toggle="tooltip" data-placement="top" title="A patent in respect of an invention that has been granted in any territory.">GRANTED PATENT</span> in South Africa (no other applications pending, relying on South African protection only)',
        ];
    }

    public static function getTradeMarkPortfolio(){
        return [
            '3.3.1 Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="An application for registration of a trade mark, which does not claim priority from any other application, regardless of the number of classes specified in the application.">NEW TRADE MARK APPLICATIONS</span> filed',
            '3.3.2. Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="A registration of a trade mark that has been granted in any territory, irrespective of the number of classes covered by that registration.">GRANTED TRADE MARK</span> registrations',
            '3.3.2.1. Of these, how many were granted in South Africa',
            '3.3.3. What is the total number of <span data-toggle="tooltip" data-placement="top" title="A registration of a trade mark that has been granted in any territory, irrespective of the number of classes covered by that registration.">GRANTED TRADE MARKS</span> within the portfolio managed by the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span>',
        ];
    }

    public static function getDesignPortfolio(){
        return [
            '3.4.1. Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="An application for registration of a functional/aesthetic design, which does not claim priority from any other application.">NEW DESIGN APPLICATIONS</span> filed',
            '3.4.2. Indicate total number of granted <span data-toggle="tooltip" data-placement="top" title="A design can be registered to protect the distinctive appearance of a product, including its shape, configuration, pattern or ornamentation, provided it is new and original. ">DESIGNS</span> registered',
            '3.4.2.1. Of these, how many were granted in South Africa',
        ];
    }

    public static function getPlantBreeders(){
        return [
            '3.5.1. Total number of <span data-toggle="tooltip" data-placement="top" title="An application for protection of a plant variety by registration of a plant breeders’ right, which does not claim priority from any other application.">NEW PBR APPLICATIONS</span> filed',
            '3.5.2. Total number of <span data-toggle="tooltip" data-placement="top" title="A registration of a plant breeders’ right that has been granted in any territory.">GRANTED PBR</span> registrations',
            '3.5.2.1. Of these, how many were granted in South Africa',
        ];
    }

    // Section 3B
    public static function getNonIprActDisclosures(){
        return [
            '3.7.1. Total number of new <span data-toggle="tooltip" data-placement="top" title="A DISCLOSURE of NON-IPR ACT IP, which does not need to be reported to NIPMO by the institution.">NON-IPR ACT DISCLOSURES</span> that the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span> would consider actionable if the disclosed IP were subject to the IPR Act <i>(auto summed for ease of reference)</i>',
            'Indicate how many are <span data-toggle="tooltip" data-placement="top" title="A DISCLOSURE of NON-IPR ACT IP, which does not need to be reported to NIPMO by the institution.">NON-IPR ACT DISCLOSURES</span> due to the following reasons',
            '3.7.1.1. IP was created before the IPR Act came into force (2 August 2010)',
            '3.7.1.2. IP was not as a result of an R&D activity',
            '3.7.1.3. R&D resulting in the IP was not publicly-funded (e.g. it was funded on a full cost basis, as defined in the IPR Act)',
            '3.7.1.4. Other',
        ];
    }

    public static function getNonIprActNewPatent(){
        return [
            '3.9.1 Total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A first application for a patent that does not claim priority from any other application.">NEW PATENT APPLICATIONS</span> filed <i>(auto summed for ease of reference)</i>',
            'How many <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A first application for a patent that does not claim priority from any other application.">NEW PATENT APPLICATIONS</span> filed were',
            '3.9.1.1. <span data-toggle="tooltip" data-placement="top" title="A provisional patent application filed in South Africa, filed at the CIPC in South Africa, establishing a priority date that can be claimed by later applications.">SA PROVISIONAL PATENT APPLICATIONS</span>',
            '3.9.1.2. <span data-toggle="tooltip" data-placement="top" title="A complete patent application filed at the CIPC in South Africa, which once granted will result in a South African patent.">SA COMPLETE PATENT APPLICATIONS</span> (as a <span data-toggle="tooltip" data-placement="top" title="This refers to the first patent application in a PATENT FAMILY that establishes a priority date which is claimed by the other applications in the PATENT FAMILY.">FIRST FILING</span>)',
            '3.9.1.3. All other new <span data-toggle="tooltip" data-placement="top" title="A first application for a patent that does not claim priority from any other application.">PATENT APPLICATIONS</span> filed as a <span data-toggle="tooltip" data-placement="top" title="This refers to the first patent application in a PATENT FAMILY that establishes a priority date which is claimed by the other applications in the PATENT FAMILY.">FIRST FILING</span> in a territory other South Africa, including PCT applications',
        ];
    }

    public static function getNonPatentsGranted(){
        return [
            'Total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A patent in respect of an invention that has been granted in any territory.">GRANTED PATENTS</span>',
            'Of these, how many were',
            'ARIPO Member States (count each member state separately) <a target="_blank" href="https://www.aripo.org/public/member-states">Member States - The African Regional Intellectual Property Organization (ARIPO)</a>',
            'Australia',
            'Brazil',
            'Chile',
            'China',
            'European Members States (count each member state separately) <a target="_blank" href="https://www.epo.org/en/about-us/foundation/member-states">Member States European Patent Organisation</a>',
            'Gulf Cooperation Council (GCC) Member States (count each member state separately) <a target="_blank" href="https://www.britannica.com/topic/Gulf-Cooperation-Council">Gulf Cooperation Council (GCC) Member Countries</a>',
            'India',
            'Japan',
            'Russian Federation',
            'South Africa',
            'United Kingdom',
            'United States of America',
            'Other',
        ];
    }

    public static function getNonPatentFamily(){
        return [
            'Total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A group comprising a number of corresponding patents and/or patent applications, filed in one or more territories in respect of the same invention, all claiming priority from the same NEW PATENT APPLICATION.">PATENT FAMILY(/IES)</span> in the portfolio with at least one jurisdiction granted',
        ];
    }

    public static function getNonSingleJurisdictionPatents(){
        return [
            'Total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> patents with only a <span data-toggle="tooltip" data-placement="top" title="A patent in respect of an invention that has been granted in any territory.">GRANTED PATENTS</span> in South Africa (no other applications pending, relying on South African protection only)',
        ];
    }

    public static function getNonTradeMarkPortfolio(){
        return [
            '3.13.1 Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <b>NEW</b> TRADE MARK APPLICATIONS filed',
            '3.13.2. Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="A registration of a trade mark that has been granted in any territory, irrespective of the number of classes covered by that registration.">GRANTED TRADE MARK</span> registrations',
            '3.13.2.1. Of these, how many were granted in South Africa',
            '3.13.3. What is the total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A registration of a trade mark that has been granted in any territory, irrespective of the number of classes covered by that registration.">GRANTED TRADE MARKS</span> within the portfolio managed by the <span data-toggle="tooltip" data-placement="top" title="The function (be it an individual(s), a dedicated office, a regional office etc.) that manages and performs the TECHNOLOGY TRANSFER ACTIVITIES at the institution.">TTF</span>',
        ];
    }

    public static function getProductServices(){
        return [
            '3.14.1. Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="An application for registration of a functional/aesthetic design, which does not claim priority from any other application.">NEW DESIGN APPLICATIONS</span> filed',
            '3.14.2. Indicate total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A registration for an aesthetic or functional design that has been granted in any territory.">GRANTED DESIGNS</span> registered',
            '3.14.2. Indicate total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A registration for an aesthetic or functional design that has been granted in any territory.">GRANTED DESIGNS</span> registered',
            '3.14.2.1. Of these, how many were granted in South Africa',
        ];
    }

    public static function getPlantBreedersIprAct(){
        return [
            '3.15.1. Total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="An application for protection of a plant variety by registration of a plant breeders’ right, which does not claim priority from any other application.">NEW PBR APPLICATIONS</span> filed',
            '3.15.2. Total number of <span data-toggle="tooltip" data-placement="top" title="Falling outside the scope of the IPR ACT.">NON-IPR ACT</span> <span data-toggle="tooltip" data-placement="top" title="A registration of a plant breeders’ right that has been granted in any territory.">GRANTED PBR</span> registrations',
            '3.15.2.1. Of these, how many were granted in South Africa',
        ];
    }

    // section 4A
    public static function getOptions(){
        return [
            '4.2.1. Total number of <span data-toggle="tooltip" data-placement="top" title=" A right or advantage granted to an entity by an institution, in terms of which that entity may elect to enter into an IP Transaction and should they elect to do so, will be preferred by the institution as a party to that IP TRANSACTION, over any other person also wishing to enter into the same IP TRANSACTION.">OPTIONS</span> granted',
        ];
    }

    public static function getLicences(){
        return [
            '4.3.1. Total number of <span data-toggle="tooltip" data-placement="top" title="A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.">LICENCE</span> agreements executed',
        ];
    }
    
    public static function getSouthAfricaData(){
        return [
            '4.3.2 Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.">LICENCES</span> granting rights in South Africa',
            '4.3.2.1 of the total number, how many where <span data-toggle="tooltip" data-placement="top" title="A licence that grants a right to a licensee to perform an activity designated as exclusive by field of use, territory, or otherwise and includes sole licences where a licensor retains some right to conduct activities in relation to the licensed IP (such as use for the conduct of further development, education or training) but does not retain a right to use the IP for commercial purposes.">EXCLUSIVE LICENSES</span>',
            '4.3.2.1.1 of the <span data-toggle="tooltip" data-placement="top" title="A licence that grants a right to a licensee to perform an activity designated as exclusive by field of use, territory, or otherwise and includes sole licences where a licensor retains some right to conduct activities in relation to the licensed IP (such as use for the conduct of further development, education or training) but does not retain a right to use the IP for commercial purposes.">EXCLUSIVE LICENSES</span>, how many were granted to <span data-toggle="tooltip" data-placement="top" title="An entity that is established according to the laws of South Africa or a natural person who is resident or domiciled in South Africa">SOUTH AFRICAN ENTITY/IES</span>',
            '4.3.2.2 of the total number, how many where <span data-toggle="tooltip" data-placement="top" title="A licence arrangement in which: (i) the licensor retains the licensed rights for itself but extends these to the licensee; and/or (ii) the licensor is entitled to grant to one or more third parties, the same rights as it grants to the licensee.">NON-EXCLUSIVE LICENSES</span>',
            '4.3.2.2.1 of the <span data-toggle="tooltip" data-placement="top" title="A licence arrangement in which: (i) the licensor retains the licensed rights for itself but extends these to the licensee; and/or (ii) the licensor is entitled to grant to one or more third parties, the same rights as it grants to the licensee.">NON-EXCLUSIVE LICENSES</span>, how many were granted to <span data-toggle="tooltip" data-placement="top" title="An entity that is established according to the laws of South Africa or a natural person who is resident or domiciled in South Africa">SOUTH AFRICAN ENTITY/IES</span>'
        ];
    }

    public static function getForeignJurisdiction(){
        return [
            '4.3.3. Indicate the total number of <span data-toggle="tooltip" data-placement="top" title="A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.">LICENCES</span> granting rights in foreign jurisdictions',
            '4.3.3.1 of this total number, how many where <span data-toggle="tooltip" data-placement="top" title="A licence that grants a right to a licensee to perform an activity designated as exclusive by field of use, territory, or otherwise and includes sole licences where a licensor retains some right to conduct activities in relation to the licensed IP (such as use for the conduct of further development, education or training) but does not retain a right to use the IP for commercial purposes.">EXCLUSIVE LICENSES</span>',
            '4.3.3.1.1 of the <span data-toggle="tooltip" data-placement="top" title="A licence that grants a right to a licensee to perform an activity designated as exclusive by field of use, territory, or otherwise and includes sole licences where a licensor retains some right to conduct activities in relation to the licensed IP (such as use for the conduct of further development, education or training) but does not retain a right to use the IP for commercial purposes.">EXCLUSIVE LICENSES</span>, how many were granted to <span data-toggle="tooltip" data-placement="top" title="An entity that is established according to the laws of South Africa or a natural person who is resident or domiciled in South Africa">SOUTH AFRICAN ENTITY/IES</span>',
            '4.3.3.2 of this total number, how many where <span data-toggle="tooltip" data-placement="top" title="A licence arrangement in which: (i) the licensor retains the licensed rights for itself but extends these to the licensee; and/or (ii) the licensor is entitled to grant to one or more third parties, the same rights as it grants to the licensee.">NON-EXCLUSIVE LICENSES</span>',
            '4.3.3.2.1 of the <span data-toggle="tooltip" data-placement="top" title="A licence arrangement in which: (i) the licensor retains the licensed rights for itself but extends these to the licensee; and/or (ii) the licensor is entitled to grant to one or more third parties, the same rights as it grants to the licensee.">NON-EXCLUSIVE LICENSES</span>, how many were granted to <span data-toggle="tooltip" data-placement="top" title="An entity that is established according to the laws of South Africa or a natural person who is resident or domiciled in South Africa">SOUTH AFRICAN ENTITY/IES</span>'
        ];
    }

    public static function getAssignments(){
        return [
            '4.4.1. Total number of <span data-toggle="tooltip" data-placement="top" title="A transaction whereby all rights, title and interest in and to IP, is transferred to another party.">ASSIGNMENTS</span> executed',
            'Of these, how many were:',
            '4.4.4.1 <span data-toggle="tooltip" data-placement="top" title="A transaction whereby all rights, title and interest in and to IP, is transferred to another party.">ASSIGNMENTS</span> to a <span data-toggle="tooltip" data-placement="top" title="An entity that is established according to the laws of South Africa or a natural person who is resident or domiciled in South Africa">SOUTH AFRICAN ENTITY/IES</span>',
        ];
    }
    
    public static function getIpTransations(){
        return [
            '4.5.1 Based on the total number of <span data-toggle="tooltip" data-placement="top" title="A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP.">IP TRANSACTIONS</span> executed with <span data-toggle="tooltip" data-placement="top" title="An entity that is established according to the laws of South Africa or a natural person who is resident or domiciled in South Africa">SOUTH AFRICAN ENTITY/IES</span><br> <i>(auto summed for ease of reference)</i>',
            'Of the total number, how many were to:',
            '4.5.1.1 <span data-toggle=tooltip data-placement=top title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>',
            '4.5.1.2 <span data-toggle="tooltip" data-placement="top" title="Small, medium and micro enterprises, each having less than 250 employees.">SMMEs</span> (other than <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span>)',
            '4.5.1.3 <span data-toggle="tooltip" data-placement="top" title="A company, corporation, organisation or other enterprise that has more than 250 employees.">LARGE COMPANIES</span>',
            'Of reported numbers in 4.5.1.1 to 4.5.1.3 above, how many were:',
            '4.5.1.4 <span data-toggle="tooltip" data-placement="top" title="Entities where at least 51% of shareholding is held by either black individuals or legal entities that have a shareholding of at least 51%.">BLACK-OWNED ENTITIES</span>',
        ];
    }

    public static function getActionableDisclosuresIp(){
        return [
            '4.7.1 <span data-toggle="tooltip" data-placement="top" title="A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.">LICENSES</span> (active, expired and terminated) as at 31 March 2023 for <span data-toggle="tooltip" data-placement="top" title="An entity as defined in the IPR Act, specifically: a)	any HEI contemplated in the definition of higher education institution’ contained in section 1 of the Higher Education Act, 1997 (Act 101 of 1997) b)	Any statutory institution listed in Schedule 1 of the IPR ACT and 
c)	Any institution identified as such by the Minister under section 3 (2) of the IPR Act.">S1 INSTITUTIONS</span> or 31 December 2023 for HEI’s?',
            '4.7.1.1 Of these, how many <span data-toggle="tooltip" data-placement="top" title="A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.">LICENSES</span> are still active (31 March 2023 for <span data-toggle="tooltip" data-placement="top" title="An entity as defined in the IPR Act, specifically: a)	any HEI contemplated in the definition of higher education institution’ contained in section 1 of the Higher Education Act, 1997 (Act 101 of 1997) b)	Any statutory institution listed in Schedule 1 of the IPR ACT and 
c)	Any institution identified as such by the Minister under section 3 (2) of the IPR Act.">S1 INSTITUTIONS</span>/ 31 Dec 2023 for HEI’s)?',
            '4.7.2 <span data-toggle="tooltip" data-placement="top" title="A transaction whereby all rights, title and interest in and to IP, is transferred to another party.">ASSIGNMENT</span> as at 31 March 2023 for <span data-toggle="tooltip" data-placement="top" title="An entity as defined in the IPR Act, specifically: a)	any HEI contemplated in the definition of higher education institution’ contained in section 1 of the Higher Education Act, 1997 (Act 101 of 1997) b)	Any statutory institution listed in Schedule 1 of the IPR ACT and 
c)	Any institution identified as such by the Minister under section 3 (2) of the IPR Act.">S1 INSTITUTIONS</span> or 31 December 2023 for HEI’s?',
        ];
    }

    public static function getLicenseAssignment(){
        return [
            'Less than 2%',
            '2% to 4%',
            '5% to 7%',
            '8% to 10%',
            '11% to 15%',
            '16% to 20%',
            'More than 20%',
        ];
    }

    public static function getIpTransactionRevnue(){
        return [
            '4.10 Total amount of IP transaction revenue <i>(auto summed for ease of reference)</i>',
            'Indicate how much IP transaction revenue can be attributed to',
            '4.10.1 RUNNING ROYALTIES',
            '4.10.2 REGULAR FIXED LICENCE FEES',
            '4.10.3 ONCE-OFF LICENCE FEES',
            '4.10.4 IP SALE/ ASSIGNMENT CONSIDERATION',
        ];
    }

    public static function getBenefitShare(){
        return [
            '4.12.1 Total number of IP CREATORS to whom <span data-toggle="tooltip" data-placement="top" title="An amount allocated and distributed by an institution to an IP CREATOR in terms of section 10 of the IPR Act and/or an IP ENABLER in terms of that institution’s policies.">BENEFIT SHARE</span> was paid',
            '4.12.2 Total number of IP ENABLERS to whom <span data-toggle="tooltip" data-placement="top" title="An amount allocated and distributed by an institution to an IP CREATOR in terms of section 10 of the IPR Act and/or an IP ENABLER in terms of that institution’s policies.">BENEFIT SHARE</span> was paid',
            '4.12.3 Total amount paid to IP CREATORS/ IP ENABLERS (Rand value)',
        ];
    }

    public static function getRandValues(){
        return [
            'R6.707m',
            'R6.969m',
            'R7.103m',
            'R6.952m',
            'R7.000m',
        ];
    }
    
    // Section 4B
    public static function getNonIprActActLicences(){
        return [
            'Total number of <span data-toggle=tooltip data-placement=top title="Falling outside the scope of the IPR ACT">NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title="A transaction whereby part or all of the rights to a DISCLOSURE, are granted to another party, whether on an EXCLUSIVE or NON-EXCLUSIVE basis, and that is executed with the purpose of that IP being commercialised.">LICENCES</span> executed',
        ];
    }

    public static function getNonIprActActAssignments(){
        return [
            'Total number of <span data-toggle=tooltip data-placement=top title="Falling outside the scope of the IPR ACT">NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title="A transaction whereby all rights, title and interest in and to IP, is transferred to another party.">ASSIGNMENTS</span> executed',
        ];
    }

    public static function getNonIprActActTransaction(){
        return [
            'Total <span data-toggle=tooltip data-placement=top title="Falling outside the scope of the IPR ACT">NON IPR ACT</span> <span data-toggle=tooltip data-placement=top title="Invoiced revenue (turnover) from the sale of products or services.">TRANSACTION REVENUE</span>',
        ];
    }

    public static function getRandValuesIpTransaTwo(){
        return [
            'R6.707m',
            'R6.969m',
            'R7.103m',
            'R6.952m',
            'R7.000m',
        ];
    }

    //Section 5
    public static function getNonActionableDisclosure(){
        return [
            '5.2. Total number of <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> incorporated',
            'Of these, how many does your institution:',
            '5.2.1. Hold only <span data-toggle="tooltip" data-placement="top" title="An ownership interest in a company (e.g. shares).">EQUITY</span> based on the <span data-toggle="tooltip" data-placement="top" title="A LICENCE, OPTION or ASSIGNMENT or combination of these as applicable that is executed with the purpose of commercialising IP.">IP TRANSACTION</span> (directly or through an institution subsidiary)',
            '5.2.2. Only receive (or potentially receive) <span data-toggle="tooltip" data-placement="top" title="The gross revenue received that is due to your institution only as consideration in an IP TRANSACTION such as licence issue fees, payments under options or on assignment, milestones or minimum payments - also referred to as annual minimums, running royalties, termination payments.">IP TRANSACTION REVENUE</span>',
            '5.2.3. Hold <span data-toggle="tooltip" data-placement="top" title="An ownership interest in a company (e.g. shares).">EQUITY</span> based on the IP transaction and receive (or potentially receive) <span data-toggle="tooltip" data-placement="top" title="The gross revenue received that is due to your institution only as consideration in an IP TRANSACTION such as licence issue fees, payments under options or on assignment, milestones or minimum payments - also referred to as annual minimums, running royalties, termination payments.">IP TRANSACTION REVENUE</span>',
            '5.2.4. Have their primary location in the province where your institution has its headquarters',
            '5.3. Total FTEs employed by all <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> <br> <i>(*estimate numbers acceptable)',
            '5.3.1. Of these, how many are <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>/<span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">ENABLERS</span>',
            '5.4. Number of <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>/<span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">ENABLERS</span> supporting (part-time) the <span data-toggle=tooltip data-placement=top title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> (e.g. advisory panel member, technical consultant, board member, shareholder, director etc) <br> <i>(*estimate numbers acceptable)</i>',
            '5.5. Number of <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>/<span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">ENABLERS</span> that are Directors within the <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> <br> <i>(*estimate numbers acceptable)</i>',
            '5.6. Number of <span data-toggle="tooltip" data-placement="top" title="A person as defined in the IPR Act, who is involved in the conception of intellectual property, specifically one who is identifiable as such for the purposes of obtaining statutory protection and enforcement of intellectual property rights, where applicable.">IP CREATORS</span>/<span data-toggle="tooltip" data-placement="top" title="A person who does not meet established legal requirements to qualify as an IP CREATOR but who is recognised by an institution as having contributed to the development and/or commercialisation of the IP.">ENABLERS</span> that received <span data-toggle="tooltip" data-placement="top" title="An ownership interest in a company (e.g. shares).">EQUITY</span> in the <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> <br> <i>(*estimate numbers acceptable)</i>',
        ];
    }

    public static function getRevenueData(){
        return [
            '5.7. Total annual REVENUE for all <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> <br> <i>(*estimate numbers acceptable) 5.7.1 Are these numbers actual or estimated?</i>',
        ];
    }

    public static function getRevenueReceived(){
        return [
            '5.8.1. attributed to  <span data-toggle="tooltip" data-placement="top" title="The amount received by a seller in consideration for the sale of some or all of its shares held in a company, less the amount paid by the seller (if any) to acquire that equity.">CASHED-IN EQUITY</span>',
            '5.8.2. attributed to <span data-toggle="tooltip" data-placement="top" title="An amount distributed from a portion of companies earnings (profits), in cash, to holders of shares entitled to receive dividends.">DIVIDENDS</span>'
        ];
    }
    
    public static function getNonIprActActionableDisclosuresFirst(){
        return [
            '5.10. How many <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> has your institution formed since 2008?',
            'Of the total number reported, how many:',
        ];
    }

    public static function getNonIprActActionableDisclosuresSecond(){
        return [
            '5.11. <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> were still <span data-toggle="tooltip" data-placement="top" title="An entity that operates to sell products or services.">OPERATIONAL</span> at financial year-end',
            '5.12. Of those still <span data-toggle="tooltip" data-placement="top" title="An entity that operates to sell products or services.">OPERATIONAL</span>, please indicate how long they have been active',
            '5.12.1. Less than 1 year',
            '5.12.2. 1 to 5 years',
            '5.12.3. 6 to 10 years',
            '5.12.4. More than 10 years',
            '5.13. <span data-toggle="tooltip" data-placement="top" title="A company that has been incorporated at CIPC for the initial purpose of commercialising a DISCLOSURE through rights granted to the company by the institution in an IP TRANSACTION, but excluding a company that has had other business interests who later enter into an IP TRANSACTION to also commercialise an ACTIONABLE DISCLOSURES.">START-UP/SPIN OUT COMPANIES</span> became <span data-toggle="tooltip" data-placement="top" title="An entity that does not operate to sell products and/or services.">NON-OPERATIONAL</span> during the year'
        ];
    }

    public static function getRunnningRoyalties(){
        return [
            '5.15. Total number of <span data-toggle="tooltip" data-placement="top" title="A written disclosure of potential IP that is reported to the TTF  for evaluation by the TTF and for which, if warranted IP protection will be sought.  If governed by the IPR Act these are referred to as ACTIONABLE DISCLOSURES.">DISCLOSURE</span> that have entered commercial use (evidenced by market research, <span data-toggle="tooltip" data-placement="top" title="Royalties earned on an ongoing basis, which are tied to the sale of products or services related to IP that forms the subject of a licence, before any allocations or distributions are made, for example, of BENEFIT SHARE paid to IP CREATORS, payments to funding partners, collaborators or upstream licensors.">RUNNING ROYALTIES</span> received, or licensee diligence reporting)',
            'Of the total number reported, how many:',
            '5.15.1. Are only commercially available in South Africa?',
            '5.15.2. Are commercially available in South Africa and other countries too?',
            '5.15.3. Have won international prizes or formal recognition – e.g. best new green technology?',
        ];
    }

    const OPTION_ACTUAL = 'Actual';
    const OPTION_ESTIMATED = 'Estimated';

    public static $getTotalAnnualRevenueType = [
        self::OPTION_ACTUAL => 'Actual',
        self::OPTION_ESTIMATED => 'Estimated',
    ];
}
