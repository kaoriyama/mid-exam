<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'content' ]);
        
        // 電話番号を結合
        $contact['tell'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
        
        // カテゴリー名を取得
        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category ? $category->name : '';
        
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'content' ]);
        
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