<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
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
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell-first', 'tell-second', 'tell-third', 'address', 'building', 'detail']);
        $category = Category::find($request->category_id);

        return view('confirm', compact('contact', 'category'));
    }
    public function store(Request $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('/')
            ->withInput();
        }
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
    public function admin()
    {
        $contacts = Contact::with('category')->Paginate(10);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
    public function search(Request $request)
    {
        $contacts = Contact::with('category')->DateSearch($request->created_at)->GenderSearch($request->gender)->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->Paginate(10);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
