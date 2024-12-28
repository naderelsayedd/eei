<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ReplyContactMessageRequest;
use App\Services\ContactService;
use App\Models\Contact;

class MessageController extends Controller
{
    protected $model;
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->model = new Contact();
        $this->contactService = $contactService;
    }

    // show messages list page
    public function index()
    {
        $messages = $this->contactService->retrieve($this->model);
        return $this->contactService->displayView('dashboard.messages.list', ['messages' => $messages]);
    }

    //Show the form for editing the specified message.
    public function show($message)
    {
        $message = $this->contactService->show($this->model, $message);
        return $this->contactService->displayView('dashboard.messages.show', ['message' => $message]);
    }

    // Update the specified message.
    public function reply(ReplyContactMessageRequest $request, $message)
    {
        try {
            DB::beginTransaction();
                $this->contactService->reply($message, $request->answer);
                Session::flash('success', 'Answer sent successfully');
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            Session::flash('error', __('messages.something_wrong').$e->getMessage());
        }

        return Redirect::back();
    }
}
