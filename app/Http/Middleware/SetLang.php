<?php
namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use DB;
use Config;
use Illuminate\Support\Facades\Storage;

class SetLang
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
        if (Session::has("lang")) {
            $lang = Session::get("lang");
        } else {
            // check browser lang - https://learninglaravel.net/detect-and-change-language-on-the-fly-with-laravel
            $lang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
 
            if ($lang != 'id' && $lang != 'en') {
                $lang = 'en';
            }
        }

        $query = DB::table('vocabularies')
            ->leftJoin('keywords', 'keywords.id', '=', 'vocabularies.keyword_id')
            ->leftJoin('languages', 'languages.id', '=', 'vocabularies.language_id')
            ->where('code', $lang)
            ->orderBy('keyword', 'asc')
            ->get();

        $langstr="<?php"."\n"."return"."\n"."["."\n";
        foreach ($query as $row){
            $langstr.= "\t"."'".$row->keyword."' => \"$row->description\","."\n";
        }
        $langstr.= "];";

        $file_path = 'resources/lang/'.$lang;

        if (!is_dir($file_path)) {
            mkdir($file_path, 0777, TRUE);
        }

        file_put_contents($file_path.'/general.php', $langstr);

        App::setLocale($lang);

        return $next($request);
    }
}
