<?php
namespace App\Libs\Utils;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationEmail
{

    public static function notification($email, $import)
    {

        try {

            $arrayInformation = array(
                'email'       => $email,
                'observation' => $import->observation,
                'ref'         => $import->reference,
                'status'      => $import->status->name,
                'name'        => $import->importer->name
            );

            Mail::send('admin.emails.notification', $arrayInformation, function ($message) use ($arrayInformation) {
                $message->from('info@planet.com.mx', 'Nueva Notificacion');
                $message->to($arrayInformation['email'])->subject('Nueva Notificacion');
            });
        } catch(\Exception $ex) {
            Log::error('Ha ocurrido un error al momento de enviar el correo electrónico', [ 'result' => $ex->getMessage() ]);
        }
    }

    public static function notificationExport($email, $export)
    {

        try {

            $arrayInformation = array(
                'email'       => $email,
                'observation' => $export->observation,
                'ref'         => $export->reference,
                'status'      => $export->status->name,
                'name'        => $export->exporter->name
            );

            Mail::send('admin.emails.notification', $arrayInformation, function ($message) use ($arrayInformation) {
                $message->from('info@planet.com.mx', 'Nueva Notificacion');
                $message->to($arrayInformation['email'])->subject('Nueva Notificacion');
            });
        } catch(\Exception $ex) {
            Log::error('Ha ocurrido un error al momento de enviar el correo electrónico', [ 'result' => $ex->getMessage() ]);
        }
    }

}