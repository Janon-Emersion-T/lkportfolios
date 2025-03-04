<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Careerbreak;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Honors;
use App\Models\License;
use App\Models\Organization;
use App\Models\Patent;
use App\Models\Publication;
use App\Models\Recommendation;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Test;
use App\Models\User;
use App\Models\Volunteer;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $user = Auth::user();
            $usertype = $user->usertype;

            // Common data array for statistics
            $data = [
                'user' => $user
            ];

            switch($usertype) {
                case 'staff':
                    return view('portal.staff.index', $data);

                case 'admin':
                    return view('portal.admin.index', $data);

                case 'candidate':
                    $user_id = Auth::id();
                    $data['CareerbreakCount'] = Careerbreak::where('user_id', $user_id)->count();
                    $data['EducationCount'] = Education::where('user_id', $user_id)->count();
                    $data['ExperienceCount'] = Experience::where('user_id', $user_id)->count();
                    $data['HonorsCount'] = Honors::where('user_id', $user_id)->count();
                    $data['LicenseCount'] = License::where('user_id', $user_id)->count();
                    $data['OrganizationCount'] = Organization::where('user_id', $user_id)->count();
                    $data['CareerbreakCount'] = Careerbreak::where('user_id', $user_id)->count();
                    $data['PatentCount'] = Patent::where('user_id', $user_id)->count();
                    $data['PublicationCount'] = Publication::where('user_id', $user_id)->count();
                    $data['RecommendationCount'] = Recommendation::where('user_id', $user_id)->count();
                    $data['SkillCount'] = Skill::where('user_id', $user_id)->count();
                    $data['SocialCount'] = Social::where('user_id', $user_id)->count();
                    $data['TestCount'] = Test::where('user_id', $user_id)->count();
                    $data['VolunteerCount'] = Volunteer::where('user_id', $user_id)->count();
                        
                    return view('portal.candidate.index', $data);

                case 'company':
                    return view('portal.company.index', $data);

                case 'professionals':
                    return view('portal.professionals.index', $data);

                case 'superadmin':
                    return view('portal.superadmin.index', $data);

                default:
                    return redirect()->back();
            }
        }
        
        return redirect()->route('login');
    }
}