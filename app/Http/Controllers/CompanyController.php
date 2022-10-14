<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companyModel;
use Validator;
use Illuminate\Support\Facades\Http;
class CompanyController extends Controller
{
    //
    public function getCompanyList(Request $request){
        $url="https://demo.tradeinsur.com/api/v2/companies/filter";
        $userAgent=$request->header('User-Agent');
        $data = Http::withUserAgent($userAgent)->get($url);
        return $data;
    }

    

    public function registerCompany(Request $request){
        $validation = array(
            'name'=>'required',
            'siren'=>'required|numeric',
            'siret'=>'required|numeric|unique:company_models,siret'
        );
        $validator=Validator::make($request->all(),$validation);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
        $company = new companyModel();
        $company->name = $request->name;
        $company->siren = $request->siren;
        $company->siret = $request->siret; 
        $res  = $company->save();

        if($res){
            return ['result'=>'Data has been saved successfully.'];
        }
        else{
            return ['result'=>'Operation failed to save data.'];
                }
        }
    }


    public function searchCompany(Request $request){
        $userAgent=$request->header('User-Agent');
        $name=$request->query('search');
        $response=Http::withUserAgent($userAgent)->get("https://demo.tradeinsur.com/api/v2/companies/filter/?search=$name")->json()['payload'];
 
        $collection = collect($response)->map(function ($data) {
            if(companyModel::whereName($data['company_name'])->exists()){
               $data['inDB'] = true;
            }
            else{
                $data['inDB'] = false; 
            }
                        return $data;
           
        });
        
        return view('data')->with(compact('collection'));
    }


  
}
