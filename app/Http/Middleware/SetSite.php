<?php

namespace App\Http\Middleware;
use App\Models\SiteTranslation;
use Closure;
use Response;
use Request;

class SetSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $host = preg_replace('/^www\./i', '', $request->getHost());
     
        if(SiteTranslation::where([['host', '=', $host], ['is_enabled','=',true]])->get()->isEmpty()) {
            //if host doesn't exist let's check if it is a subdomain
            $subdomain = explode('.', $host)[0];
            $domain = preg_replace('/^'.$subdomain.'\./i', '', $request->getHost());
            if(SiteTranslation::where('host', $domain)->get()->isEmpty()) {
                //it is not a subdomain, site doesn't exist
                echo('Site you are looking for doesn\'t exist');
                die();
            } else {
                //site exists, let's check if language exists
                $language = SiteTranslation::where([
                        ['host', '=', $domain],
                        ['language_code','=',$subdomain],
                        ['language_type','=','subdomain'],
                        ['is_enabled','=',true]
                    ])->get();
                
                if($language->isEmpty()) {
                    return redirect()->to((Request::secure()?'https://':'http://').$domain);
                } else {
                    //language exists let's set up site data
                    // dd($language->first()->toArray());
                    // dd('exists');
                    
                    $request->attributes->add([
                            'siteData' => $language->first()->toArray()
                        ]);
                }
            }
            
        } else {
            //site exists, let's check if it is a host language or default host
            $host_language = SiteTranslation::where([
                        ['host', '=', $host],
                        ['language_type','=','host'],
                        ['is_default','=',false]
                    ])->get();
                    
            if($host_language->isEmpty()) {
                //it is a default host
                $dupRequest = $request->duplicate();
                $selectedLang = $dupRequest->segment(1);
                
                $language = SiteTranslation::where([
                            ['host', '=', $host],
                            ['language_code','=',$selectedLang],
                            ['language_type','=','path']
                        ])->get();
                    
                if($language->isEmpty()) {
                    //language doesn't exist let's use default
                    $siteData = SiteTranslation::where([
                        ['host', '=', $host],
                        ['is_default','=',true]
                    ])->first();
                    
                    // dd($siteData->toArray());
                    
                    // dd('default host. no lang on existing domain - using default');
                    
                    
                    
                } else {
                    //language exists let's set up site data
                }
                
            } else {
                //it is a host language, let's set up site data
            }


 
        }
        // dd($host);
        
        return $next($request);
    }
}
