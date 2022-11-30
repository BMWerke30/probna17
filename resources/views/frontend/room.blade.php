@extends('layouts.frontend')

@section('content')
<div class="container places">
    <h1 class="text-center">Zamieszkaj w <a href="{{ route('object',['id'=>$room->object_id]) }}">{{ $room->object->name }}</a> obiekcie</h1>

    @foreach( $room->photos->chunk(3) as $chunked_photos)

        <div class="row top-buffer">

            @foreach($chunked_photos as $photo)
            <div class="col-md-4">
                <img class="img-responsive" src="{{ $photo->storagePath ?? $placeholder }}" alt="">
            </div>
          @endforeach

        </div>

    @endforeach


    <section>

        <ul class="list-group">
            <li class="list-group-item">
                <span class="bolded">Opis:</span> {{ $room->description }}
            </li>
            <li class="list-group-item">
                <span class="bolded">Liczba osób:</span> {{ $room->room_size }}
            </li>
            <li class="list-group-item">
                <span class="bolded">Cena za noc:</span> {{ $room->price }} zł
            </li>
            <li class="list-group-item">
                <span class="bolded">Adres:</span> {{ $room->object->city->name }} ul.{{ $room->object->address->street }} {{ $room->object->address->number }}
            </li>
        </ul>
    </section>

    <section id="reservation">

        <h3>Rezerwacja</h3>

        <div class="row">
            <div class="col-md-6">
                <form {{ $novalidate }} action="{{ route('makeReservation',['room_id'=>$room->id,'city_id'=>$room->object->city->id]) }}" method="POST">
                    <div class="form-group">
                        <label for="checkin">Przyjazd</label>
                        <input required name="checkin" type="text" class="form-control datepicker" id="checkin" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Wyjazd</label>
                        <input required name="checkout" type="text" class="form-control datepicker" id="checkout" placeholder="">
                    </div>


                    @if(Auth::guest())
                    <p><a href="{{ route('login') }}">Zaloguj się aby zarezerwować pokój</a></p>
                    @else
                    <button type="submit" class="btn btn-primary">Rezerwuj</button>
                    @endif

                    <p class="text-danger">{{ Session::get('reservationMsg') }}</p>
                    {{ csrf_field() }}
                </form>
            </div><br>
            <div class="col-md-6">
                <div id="avaiability_calendar"></div>
            </div>
        </div>


    </section>

</div>

@endsection

@push('scripts')


<script>


function datesBetween(startDt, endDt) {
    var between = [];
    var currentDate = new Date(startDt);
    var end = new Date(endDt);
    while (currentDate <= end)
    {
        between.push( $.datepicker.formatDate('yy-mm-dd',new Date(currentDate)) );
        currentDate.setDate(currentDate.getDate() + 1);
    }

        return between;
}

$.ajax({

    cache: false,
    url: base_url + '/ajaxGetRoomReservations/' + {{ $room->id }},
    type: "GET",
    success: function(response){


        var eventDates = {};
        var dates = [];


        for(var i = 0; i <= response.reservations.length - 1; i++)
        {
            dates.push(datesBetween(new Date(response.reservations[i].day_in), new Date(response.reservations[i].day_out))); // array of arrays
        }


        /*  a = [1];
            b = [2];
            x = a.concat(b);
            x = [1,2];
            [ [1],[2],[3] ] => [1,2,3]  */
        dates = [].concat.apply([], dates);    // flattened array

        for (var i = 0; i <= dates.length - 1; i++)
        {
            eventDates[dates[i]] = dates[i];
        }


        $(function () {
            $("#avaiability_calendar").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function (data) {
                    if ($('#checkin').val() == '')
                    {
                        $('#checkin').val(data);
                    } else if ($('#checkout').val() == '')
                    {
                        $('#checkout').val(data);
                    } else if ($('#checkout').val() != '')
                    {
                        $('#checkin').val(data);
                        $('#checkout').val('');
                    }

                },
                beforeShowDay: function (date)
                {
                    var tmp =  eventDates[$.datepicker.formatDate('yy-mm-dd', date)];
                    if (tmp)
                        return [false, 'unavaiable_date'];
                    else
                        return [true, ''];
                }


            });
        });


    }


});



</script>

@endpush
