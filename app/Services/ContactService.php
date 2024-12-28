<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyContactMail;
use App\Models\Contact;

class ContactService extends BaseServices
{
    protected $model;

    public function __construct()
    {
        $this->model = new Contact();
    }

    public function storeContact($data)
    {
        return $this->model->create([
            'name_en' => $data->name_en,
            'name_ar' => $data->name_ar,
            'link' => $data->link,
        ]);
    }

    public function reply($message_id, $answer)
    {
        $message = $this->model->findOrFail($message_id);
        $message->answer = $answer;
        if($message->isDirty()) {
            $message->save();
            Mail::to($message->email)->send(new ReplyContactMail($answer));
        }
    }

}
