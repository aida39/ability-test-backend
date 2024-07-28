<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        $contact = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($contact);
        return response()->json([
            'data' => $contact
        ], 201);
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

    public function download()
    {
        $users = Contact::all();
        $csvHeader = [
            'id', 'category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'
        ];
        $csvData = $users->toArray();
        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);
            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);
        return $response;
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        return view('delete', compact('contact'));
    }

    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}
