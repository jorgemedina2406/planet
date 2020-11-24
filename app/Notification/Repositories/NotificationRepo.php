<?php
namespace App\Notification\Repositories;

use App\Notification\Entities\Notification;

/**
 * Class NotificationRepo
 *
 * @package App\Notification\Repositories
 * @author  Jorge Medina
 */
class NotificationRepo
{
    public function createNotification($data)
    {
        $notification = Notification::create($data);

        return $notification;
    }
    
    public function getAll($sort)
    {
        
        if( $sort === 'desc' ) {
            return Notification::all()->sortByDesc('created_at');
        }else{
            return Notification::all()->sortBy('created_at');
        }
    }

}
