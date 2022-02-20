<?php
namespace App\Helpers;
use App\Models\RuleSetting;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AppHelper
{
     public function startQueryLog()
     {
           \DB::enableQueryLog();
     }

     public function showQueries()
     {
          dd(\DB::getQueryLog());
     }

     public function getpermision($permision_id=1000,$crud)
     {
          
               $rule_id=auth()->user()->rule_id;
               $data= RuleSetting::where('rule_id',$rule_id)->where('permision_id',$permision_id)->first();
               if ($data)
               {
                    if ($crud=="C")
                    {
                         return $data->update;
                    }
                    elseif($crud=="R")
                    {
                         return $data->read;
                    }
                    elseif($crud=="U")
                    {
                         return $data->update;
                    }
                    elseif($crud=="D")
                    {
                         return $data->delete;
                    }
               }
               else {
                    return false;
               }
               
       
         
     }

     public static function instance()
     {
         return new AppHelper();
     }
     
}