@extends('layouts.base')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Festivals') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="mb-4">
                    <a href="{{ route('festivals.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                        {{ __('Create New Festival') }}
                    </a>
                </div>

                @if ($festivals->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($festivals as $festival)
                            <div class="p-4 bg-white dark:bg-gray-900 rounded-lg shadow">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $festival->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $festival->location }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Date') }}: {{ $festival->date }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Start Time') }}: {{ $festival->start_time }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('End Time') }}: {{ $festival->end_time }}</p>

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('festivals.show', $festival) }}" class="text-blue-500 hover:underline">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('festivals.edit', $festival) }}" class="text-yellow-500 hover:underline">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('festivals.destroy', $festival) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400"> {{ __('No festivals found.') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
