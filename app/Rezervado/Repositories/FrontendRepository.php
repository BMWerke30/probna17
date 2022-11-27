<?php

namespace App\Rezervado\Repositories;

use App\{City, Comment, Reservation, Room, TouristObject, User};
use App\Rezervado\Interfaces\FrontendRepositoryInterface;

class FrontendRepository implements FrontendRepositoryInterface
{

    private $types = [
        'TouristObject' => TouristObject::class,
    ];

    public function getObjectsForMainPage()
    {
        return TouristObject::with(['city', 'photos'])->ordered()->paginate(8);
    }

    public function getObject($id)
    {
        return TouristObject::with(
            [
                'city',
                'photos',
                'address',
                'comments.user',
                'rooms.object.city',
                'rooms.photos',
                'user.photos',
            ]
        )
            ->find($id);
    }

    public function getSearchCities(string $term)
    {
        return City::where('name', 'LIKE', $term . '%')->get();
    }


    public function getSearchResults(string $city)
    {
        return City::with(['rooms.reservations', 'rooms.photos', 'rooms.object.photos'])->where('name', $city)->first(
        ) ?? false;
    }

    public function getRoom($id)
    {
        return Room::with(['object.address'])->find($id);
    }

    public function getReservationsByRoomId($id)
    {
        return Reservation::where('room_id', $id)->get();
    }

    public function getPerson($id)
    {
        return User::with(['comments.commentable', 'objects'])->find($id);
    }

    public function like($likeable_id, $type, $request)
    {
        $objectType = $this->types[$type];
        $likeable = $objectType::find($likeable_id);

        return $likeable->users()->attach($request->user()->id);
    }

    public function unlike($likeable_id, $type, $request)
    {
        $objectType = $this->types[$type];
        $likeable = $objectType::find($likeable_id);

        return $likeable->users()->detach($request->user()->id);
    }

    public function addComment($commentable_id, $type, $request)
    {
        $objectType = $this->types[$type];
        $commentable = $objectType::find($commentable_id);

        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->rating = $type == 'TouristObject' ? $request->input('rating') : 0;
        $comment->user_id = $request->user()->id;

        return $commentable->comments()->save($comment);
    }

    public function makeReservation($room_id, $city_id, $request)
    {
        return Reservation::create([
            'user_id' => $request->user()->id,
            'city_id' => $city_id,
            'room_id' => $room_id,
            'status' => Reservation::STATUS_NOT_CONFIRMED,
            'day_in' => $request->input('checkin'),
            'day_out' => $request->input('checkout'),
        ]);
    }

}
