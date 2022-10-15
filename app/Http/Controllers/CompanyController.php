<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companyModel;
use Validator;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Auth;
class CompanyController extends Controller
{
    //function to get the companylist fromthe thirdparty api.....
    public function getCompanyList(Request $request){
        $url="https://demo.tradeinsur.com/api/v2/companies/filter";
        $userAgent=$request->header('User-Agent');
        $data = Http::withUserAgent($userAgent)->get($url);
        return $data;
    }

    // functionm to show the registration formfor the company
    public function showregisterCompany(){

        return view('registerCompany');
    }
    // function to register the company in the database....
    public function registerCompany(Request $request){
        // validating the data 
        $validation = array(
            'name'=>'required',
            'siren'=>'required|numeric',
            'siret'=>'required|numeric|unique:company_models,siret'
        );
        $validator=Validator::make($request->all(),$validation);
        // throwing the errors if
        if($validator->fails()){
            return $validator->errors();
        }
        // registering the company
        else{
            $company = new companyModel();
            $company->name = $request->name;
            $company->siren = $request->siren;
            $company->siret = $request->siret; 
            $res  = $company->save();
        //returnig the message
        if($res){
            return ['result'=>'Data has been saved successfully.'];
        }
        else{
            return ['result'=>'Operation failed to save data.'];
                }
        }
    }

// functionto search the company
    public function searchCompany(Request $request){
        $userAgent=$request->header('User-Agent');
        $name=$request->query('name');
        $response=Http::withUserAgent($userAgent)->get("https://demo.tradeinsur.com/api/v2/companies/filter/?search=$name")->json()['payload'];
        // mapping the data and chceking it in the database and injecting the information
        $collection = collect($response)->map(function ($data) {
            if(companyModel::whereSiret($data['siret'])->exists()){
               $data['inDB'] = true;
            }
            else{
                $data['inDB'] = false; 
            }
                        return $data;
        });
        
        return view('searchCompany')->with(compact('collection'));
    }


  
}
