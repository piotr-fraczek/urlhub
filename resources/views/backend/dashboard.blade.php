@extends('layouts.backend')

@section('title', __('Dashboard'))

@section('content')
<main>
  <div class="mb-4 bg-white p-4 shadow sm:rounded-md">
  @role('admin')
    <div class="flex flex-wrap">
      <div class="w-full sm:w-1/4">
        <span class="text-cyan-600"> @svg('fas-square', 'mr-2') {{__('All')}}</span>
        <span class="text-teal-600 ml-5"> @svg('fas-square', 'mr-2') {{__('Me')}}</span>
        <span class="text-orange-600 ml-5"> @svg('fas-square', 'mr-2') {{__('Guests')}}</span>
      </div>
      <div class="mt-8 sm:mt-0 text-uh-1 ">
        <b>@svg('gmdi-storage', 'mr-1.5') {{__('Free Space')}}:</b>
        <span class="font-light">{{numberToAmountShort($keyRemaining)}} {{__('of')}} {{numberToAmountShort($keyCapacity)}} ({{$keyRemaining_Percent}})</span>
      </div>
    </div>

    <div class="flex flex-wrap sm:mt-8">
      <div class="w-full sm:w-1/4">
        <div class="block">
          <b class="text-uh-1">@svg('fas-link', 'mr-1.5') {{__('URLs')}}:</b>
          <span class="text-cyan-600">{{numberToAmountShort($totalUrl)}}</span> -
          <span class="text-teal-600">{{numberToAmountShort($urlCount_Me)}}</span> -
          <span class="text-orange-600">{{numberToAmountShort($urlCount_Guest)}}</span>
        </div>
        <div class="block">
          <b class="text-uh-1">@svg('gmdi-bar-chart', 'mr-1.5') {{__('Clicks')}}:</b>
          <span class="text-cyan-600">{{numberToAmountShort($totalClick)}}</span> -
          <span class="text-teal-600">{{numberToAmountShort($clickCount_Me)}}</span> -
          <span class="text-orange-600">{{numberToAmountShort($clickCount_Guest)}}</span>
        </div>
      </div>
      <div class="text-uh-1 w-full sm:w-1/4 mt-4 sm:mt-0">
        <div class="block">
          <b>@svg('fas-user', 'mr-1.5') {{__('Users')}}:</b>
          <span class="font-light">{{numberToAmountShort($userCount)}}</span>
        </div>
        <div class="block">
          <b>@svg('fas-user', 'mr-1.5') {{__('Guests')}}:</b>
          <span class="font-light">{{numberToAmountShort($guestCount)}}</span>
        </div>
      </div>
    </div>
  @else
    <div class="flex flex-wrap">
      <div class="w-full sm:w-1/4">
        <span class="font-semibold text-md sm:text-2xl">@svg('fas-link', 'mr-1.5') {{__('URLs')}}:</span>
        <span class="font-light text-lg sm:text-2xl">{{numberToAmountShort($urlCount_Me)}}</span>
      </div>
      <div class="w-full sm:w-1/4">
        <span class="font-semibold text-lg sm:text-2xl">@svg('far-eye', 'mr-1.5') {{__('Clicks')}}:</span>
        <span class="font-light text-lg sm:text-2xl">{{numberToAmountShort($clickCount_Me)}}</span>
      </div>
    </div>
  @endrole
  </div>

  <div class="bg-white p-4 shadow sm:rounded-md">
    <div class="flex mb-8">
      <div class="w-1/2">
        <span class="text-2xl text-uh-1">{{__('My URLs')}}</span>
      </div>
      <div class="w-1/2 text-right">
        <a href="{{ url('./') }}" target="_blank" title="{{__('Add URL')}}"
          class="btn"
        >
          @svg('gmdi-add-link', '!h-[1.5em] mr-1')
          {{__('Add URL')}}
        </a>
      </div>
    </div>

    @include('partials/messages')

    @livewire('my-url-table')
  </div>
</main>
@endsection
