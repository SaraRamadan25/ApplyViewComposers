<?php

namespace App\Http\View\composers;

use App\Models\Channel;
use Illuminate\View\View;

class ChannelsComposer
{
public function compose(View $view){
    $view->with('channels',Channel::orderBy('name')->get());
}
}
