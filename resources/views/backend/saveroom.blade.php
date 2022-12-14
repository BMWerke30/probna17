@extends('layouts.backend')

@section('content')


@if( $room ?? false )
<h2>Edytowanie pokoju w obiekcie {{ $room->object->name }}</h2>
@else
<h2>Dodawanie nowego pokoju w obiekcie</h2>
@endif

<form {{ $novalidate  }} action="{{ route('saveRoom',['id'=>$room->id ?? false]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label for="roomNumber" class="col-lg-2 control-label">Numer pokoju *</label>
            <div class="col-lg-10">
                <input name="room_number" value="{{ $room->room_number ?? old('room_number')  }}" required type="number" class="form-control" id="roomNumber" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="peopleNumber" class="col-lg-2 control-label">Rozmiar pokoju *</label>
            <div class="col-lg-10">
                <input name="room_size" value="{{ $room->room_size ?? old('room_size')  }}" required type="number" class="form-control" id="peopleNumber" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-lg-2 control-label">Cena *</label>
            <div class="col-lg-10">
                <input name="price" value="{{ $room->price ?? old('price') }}" required type="number" class="form-control" id="price" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="descr" class="col-lg-2 control-label">Opis pokoju *</label>
            <div class="col-lg-10">
                <textarea name="description" required class="form-control" rows="3" id="descr">{{ $room->description ?? old('description')  }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <label for="roomPictures">Galeria pokoju</label>
                <input type="file" name="roomPictures[]" id="roomPictures" multiple>
                <p class="help-block">Dodaj zdj??cia do galerii pokoju</p>
            </div>
        </div>

        @if( $room ?? false )
        <div class="col-lg-10 col-lg-offset-2">

            @foreach( $room->photos->chunk(4) as $chunked_photos )

                <div class="row">


                    @foreach( $chunked_photos as $photo )

                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail">
                                <img class="img-responsive" src="{{ $photo->storagePath ?? $placeholder }}" alt="...">
                                <div class="caption">
                                    <p><a href="{{ route('deletePhoto',['id'=>$photo->id])  }}" class="btn btn-primary btn-xs" role="button">Usu??</a></p>
                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>


             @endforeach


        </div>
        @endif


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Zapisz pok??j</button>
            </div>
        </div>

    </fieldset>
    <input type="hidden" name="object_id" value="{{ $object_id ?? null }}">
    {{ csrf_field()  }}
</form>
@endsection
