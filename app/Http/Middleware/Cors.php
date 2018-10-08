<?php
namespace App\Http\Middleware;
use Closure;
/**
 * Class Cors
 * @package App\Http\Middleware
 */
class Cors
{
    /**
     * Handle an incoming request.
     *
     * Please add header('Access-Control-Allow-Origin: http://example.com');
     * & header('Access-Control-Allow-Credentials: true');
     * at the top of your route file.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        header("Access-Control-Allow-Origin: *");

        // ALLOW OPTIONS METHOD
		//'Access-Control-Allow-Origin' => '*',
        $headers = [  
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin,Accept,Authorization, X-Request-With'
        ];
        if($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return Response::make('OK', 200, $headers);
        }

        $response = $next($request);
        foreach($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }
}