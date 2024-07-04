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
        $contact = $request->only(['first_name', 'last_name', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'content']);
        
        // 電話番号を結合
        $contact['tell'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
        
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'email', 'tel1', 'tel2', 'tel3','address', 'building', 'content']);
        
        // 電話番号を結合
        $contact['tell'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
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
