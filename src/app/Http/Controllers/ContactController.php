<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['firstname', 'lastname', 'email', 'tel1', 'tel2', 'tel3', 'content']);
        
        // 名前を結合
        $contact['name'] = $contact['lastname'] . $contact['firstname'];

        // 電話番号を結合
        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
        
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['firstname', 'lastname', 'email', 'tel1', 'tel2', 'tel3', 'content']);
        
        // 名前を結合
        $contact['name'] = $contact['lastname'] . $contact['firstname'];

        // 電話番号を結合
        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
        // 不要なキーを削除
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);
        
        Contact::create($contact);
        
        return view('thanks');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }
}