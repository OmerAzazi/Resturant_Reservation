<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Book;
use Illuminate\Http\Response;



class AdminController extends Controller
{
    public function Food(){
        $food = Menu::paginate(5);
        return view('Admin.Food', compact('food'));
    }
    public function AddFood(){
        return view('Admin.AddFood');
    }
    public function Add(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'featured' => 'required',
            'image' => 'image',
        ], [
            'name.required' => 'Please Enter an name',
            'price.required' => 'Please Enter Price.',
            'description.required' => 'Please enter a Description.',
            'category.required' => 'Please Select an Category',
            'featured.required' => 'Please Select an Featured.',
            'image.image' => 'The File Must be an Image.',

        ]);
        $foodName = $validatedData['name'];
        $foodPrice = $validatedData['price'];
        $foodDescription = $validatedData['description'];
        $foodCategory = $validatedData['category'];
        $weeklyFeatured = $validatedData['featured'];

        // Handle image upload
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('/Template/img'), $imageName);
        $imagePath = $imageName;

        // Create the menu record
        Menu::create([
        'Food_name' => $foodName,
        'Food_price' => $foodPrice,
        'Food_description' => $foodDescription,
        'Food_category' => $foodCategory,
        'Weekly_featured' => $weeklyFeatured,
        'Food_img' => $imagePath,
    ]);
    
        return response()->json(['message' => 'The Food Added Successfully'],Response::HTTP_CREATED);
    }

    public function foodDelete($id){
    // Find the food item by ID and delete it
    $food = Menu::findOrFail($id);
    $food->delete();

    return response()->json(['message' => 'Food deleted successfully.']);
    }

    public function editFood($id){
        $edit = Menu::findOrFail($id);
        return view('Admin.Edit',compact('edit'));
    }

    public function Edit(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'featured' => 'required',
            'image' => 'image',
        ], [
            'name.required' => 'Please Enter an name',
            'price.required' => 'Please Enter Price.',
            'description.required' => 'Please enter a Description.',
            'category.required' => 'Please Select an Category',
            'featured.required' => 'Please Select an Featured.',
            'image.image' => 'The File Must be an Image.',

        ]);
        $food = Menu::findOrFail($id);

        $food->Food_name = $validatedData['name'];
        $food->Food_price = $validatedData['price'];
        $food->Food_description = $validatedData['description'];
        $food->Food_category = $validatedData['category'];
        $food->Weekly_featured = $validatedData['featured'];

        // Handle image upload
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('/Template/img'), $imageName);
        $food->Food_img = $imageName;
    }

        $food->save();

    
        return response()->json(['message' => 'The Food Updated Successfully'],Response::HTTP_OK);
    }

    public function Reservation(){
        $data = Book::All();
        return view('Admin.Reservation',compact('data'));
    }

    public function Cancel(Request $request){
    $bookingId = $request->input('id');
    
    // Find the booking in the database and update the status
    $booking = Book::find($bookingId);
    if ($booking) {
        $booking->status = 'Canceled';
        $booking->save();
        return response()->json('Booking canceled successfully');
    } else {
        return response()->json('Booking not found', 404);
    }
    }

    public function Search(Request $request){
        $searchText=$request->search;
        $food=Menu::where('Food_name','LIKE',"%$searchText%")->orwhere('Food_category','LIKE',"%$searchText%")->paginate(50);
        return view('Admin.Food',compact('food'));
    }
}

    

