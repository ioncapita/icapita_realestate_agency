<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view("properties.index", ["properties" => Property::all()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if (Auth::user()) {
      return view("properties.create");
    } else {
      return redirect()
        ->route("properties.index")
        ->withErrors("Access denied! Not allowed to create an announcement.");
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $input = $request->all();

    $home = new Property();
    $home->agent_id = $input["agent_id"];
    $home->name = $input["name"];
    $home->description = $input["description"];
    $home->location = $input["location"];
    $home->n_rooms = $input["n_rooms"];
    $home->price = $input["price"];
    $input["photo"] = $this->saveFoto($request, uniqid());
    $home->save();
    return redirect()->route("properties.index");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function show(Property $property)
  {
    return view("properties.show", ["property" => $property]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function edit(Property $property)
  {
    return view("properties.edit", ["property" => $property]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Property $property)
  {
    $input = $request->all();
    $input["photo"] = $this->saveFoto($request, uniqid());
    $validator = $this->validateInputs($input);

    if ($validator->fails()) {
      return redirect()
        ->route("properties.edit", $property->id)
        ->withErrors($validator->errors());
    }

    $property = $this->fillProperty($property, $input);
    try {
      $property->save();
    } catch (Exception $e) {
      return redirect()
        ->route("properties.index")
        ->withErrors("Ocorreu um erro!");
    }

    return redirect()
      ->route("properties.index")
      ->with("message", "Property $property->id editado com sucesso!");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function destroy(Property $property)
  {
    Property::destroy($property->id);
    return redirect()
      ->route("properties.index")
      ->with("message", "House successfully deleted!");
  }

  private function saveFoto($request, $name)
  {
    if ($request->hasFile("photo")) {
      if ($request->file("photo")->isValid()) {
        $file = $request->file("photo");
        $extension = $file->extension();
        $file->storeAs("public", $name . "." . $extension);
        return $name . "." . $extension;
      }
      //throw new Exception('Uploaded file not a valid image');
    }
    return null;
  }

  private function validateInputs($input)
  {
    $rules = [
      "name" => "required",
      "description" => "required",
      "location" => "required",
      "n_rooms" => "required",
      "price" => "required",
    ];

    return Validator::make($input, $rules);
  }

  private function fillProperty(Property $property, array $input): Property
  {
    $property->name = $input["name"];
    $property->description = $input["description"];
    $property->location = $input["location"];
    $property->n_rooms = $input["n_rooms"];
    $property->price = $input["price"];

    if (isset($input["photo"])) {
      $property->photo = $input["photo"];
    }

    return $property;
  }
}
