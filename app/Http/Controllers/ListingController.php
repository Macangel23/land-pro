<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
   public function __construct()
   {
      // this will prevent the guarding of index page and show details of page
      // $this->middleware('auth')->except(['index','show']);
   }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
      $filters =  $request->only([
         'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
      ]);

      // if(isset($filters['priceFrom'])){
      //    $query->where('price', '>=', $filters['priceFrom']);
      // }
      // if(isset($filters['priceTo'])){
      //    $query->where('price', '<=', $filters['priceTo']);
      // }
      // if(isset($filters['beds'])){
      //    $query->where('beds', $filters['beds']);
      // }
      // if(isset($filters['baths'])){
      //    $query->where('baths', $filters['baths']);
      // }
      // if(isset($filters['areaFrom'])){
      //    $query->where('area', '>=', $filters['areaFrom']);
      // }
      // if(isset($filters['areaTo'])){
      //    $query->where('are', '<=', $filters['areaTo']);
      // }

      return Inertia::render('Listing/Index',[
         'filters' => $filters,
         'listings' => Listing::mostRecent()
                  ->filter($filters)
                  ->paginate(5)
                  ->withQueryString()
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return Inertia::render('Listing/Create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $validated = $request->validate([
         'beds' => 'required|integer|min:1|max:4',
         'baths' => 'required|integer|min:1|max:2',
         'area' => 'required|integer|min:40|max:100',
         'city' => 'required|string',
         'code' => 'required|string|unique:listings,code',
         'street' => 'required|string',
         'street_number' => 'required|integer|max:100',
         'price' => 'required|integer|min:50000|max:2000000'
      ]);

      Listing::create($validated);

      return redirect()->route('listing.index')
         ->with('success', 'New Listing Created');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Listing  $listing
    * @return \Illuminate\Http\Response
    */
   public function show(Listing $listing)
   {
      return Inertia::render('Listing/Show',[
         'list' => $listing
      ]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Listing  $listing
    * @return \Illuminate\Http\Response
    */
   public function edit(Listing $listing)
   {
      return Inertia::render('Listing/Edit',[
         'list' => $listing
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Listing  $listing
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Listing $listing)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Listing  $listing
    * @return \Illuminate\Http\Response
    */
   public function destroy(Listing $listing)
   {
      $listing->delete();

      return redirect()->route('listing.index')
         ->with('success', 'Successfully removed listing');
   }
}
