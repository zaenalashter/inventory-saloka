<?php

namespace App\Http\Controllers\OpenFunction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class webInfo extends Controller
{
    public static function webInformation($area) {
        $result = [];
        if ($area == 'all') {
            $generalInfo = DB::table('web_general_info')
                ->select('web_general_info.section', 'web_general_info.area', 'web_general_info.type', 'web_general_info.data', 'web_image.filename')
                ->leftJoin('web_image','web_general_info.section','=','web_image.section')
                ->get();
            foreach ($generalInfo as $c) {
                if ($c->section == 'contact-us') {
                    $result['contact-us'][$c->area] = $c->data;
                } else {
                    $result[$c->section] = [
                        'area' => $c->area,
                        'type' => $c->type,
                        'data' => $c->data,
                        'filename' => $c->filename,
                    ];
                }
            }
        }
        return $result;
    }
}
