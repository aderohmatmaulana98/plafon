<?php

namespace App\Providers;

use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Adrianorosa\GeoLocation\GeoLocation;
use Stevebauman\Location\Facades\Location;

class Helper
{
    static public function apk()
    {
        $apk = DB::table('aplikasi')->first();
        // dd($apk);
        return $apk;
    }
    // static public function logs()
    // {
    //     $ip = request()->ip();
    //     $location = Location::get("'$ip'");
    //     if (auth()->user() == null) {
    //         $data = [
    //             'user_id' => 0,
    //             'ip_address' => request()->ip(),
    //             'user_agent' => request()->server('HTTP_USER_AGENT'),
    //             'url' => url()->previous(),
    //             'countryName' => $location->countryName,
    //             'countryCode' => $location->countryCode,
    //             'regionCode' => $location->regionCode,
    //             'cityName' => $location->cityName,
    //             'latitude' => $location->latitude,
    //             'longitude' => $location->longitude,
    //             'areaCode' => $location->areaCode,
    //             'created_at' => \Carbon\Carbon::now(),
    //         ];
    //     } else {
    //         $data = [
    //             'user_id' => auth()->user()->id,
    //             'ip_address' => request()->ip(),
    //             'user_agent' => request()->server('HTTP_USER_AGENT'),
    //             'url' => url()->previous(),
    //             'countryName' => $location->countryName,
    //             'countryCode' => $location->countryCode,
    //             'regionCode' => $location->regionCode,
    //             'cityName' => $location->cityName,
    //             'latitude' => $location->latitude,
    //             'longitude' => $location->longitude,
    //             'areaCode' => $location->areaCode,
    //             'created_at' => \Carbon\Carbon::now(),
    //         ];
    //     }
    //     DB::table('logs')->insert($data);
    // }
    // static public function comment()
    // {
    //     $comment = DB::select("select c.*, u.full_name, u.image, u.email_verified_at from comments c left join users u on c.user_id=u.id");
    //     return $comment;
    // }
    // static public function countComment()
    // {
    //     $count = DB::select("select count(c.id) as countComments from comments c left join users u on c.user_id=u.id where c.status = 2");
    //     return $count[0];
    // }
}
