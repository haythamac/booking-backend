<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $bookings = Booking::all();
        return $this->success(BookingResource::collection($bookings), 'bookings retrieved successfully');
    }
    

    public function store(StoreBookingRequest $request)
    {
        $booking = $request->validated();
        $booking = Booking::create($booking);

        return $this->success(new BookingResource($booking), 'booking created successfully', 201);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return $this->success(new BookingResource($booking), 'booking retrieved successfully');
    }

    public function update(UpdateBookingRequest $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->validated());
        return $this->success(new BookingResource($booking), 'booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return $this->success(null, 'booking deleted successfully');
    }

    public function search(Request $request)
    {
        // Search for bookings based on criteria
    }
}
