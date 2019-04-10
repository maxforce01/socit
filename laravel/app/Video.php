<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Video extends Model
{
    public function video_path()
    {
        $original = $this->video;
        $path = "";
        $video = str_split($this->video);
        if($video[0]=='[')
            for($i = 0;$i<count($video);$i++)
            {
                if($video[$i]==':')
                {
                    $i++;
                    $i++;
                    while ($video[$i]!='"') {
                        $path.=$video[$i];
                        $i++;
                    }
                    break;
                }
            }
        else
        {
            return $original;
        }
        return $path;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
