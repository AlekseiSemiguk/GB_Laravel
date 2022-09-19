<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\NewsSource;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {

        $urls = NewsSource::all()->pluck('url');
        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url));
        }
        /*$resultMessage = $parser->setLink("https://news.yandex.ru/music.rss")
            ->getParseData()->saveData();*/

        return "Parsing completed";
    }
}
