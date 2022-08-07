
{{--    @foreach (\App\Models\Shop\Comment::query()->limit(10)->get() as $feed)--}}

{{--    <x-filament::widget>--}}
        <x-filament::card>
{{--            <h2 class="text-lg sm:text-xl font-bold tracking-tight mb-10 text-center justify-center items-center">--}}

{{--                <a--}}
{{--                    href="https://google.com"--}}
{{--                    target="_new"--}}
{{--                    @class([--}}
{{--                                'text-center flex items-end space-x-2 rtl:space-x-reverse text-gray-800 hover:text-primary-500 transition',--}}
{{--                                'dark:text-primary-500 dark:hover:text-primary-400' => config('filament.dark_mode'),--}}
{{--                            ])--}}
{{--                >{{$feed->title}}</a>--}}
{{--            </h2>--}}

{{--            <div class="overflow-y-auto relative dark:border-gray-700 border-t" x-bind:class="{--}}
{{--                        'rounded-t-xl': ! hasHeader,--}}
{{--                        'border-t': hasHeader,--}}
{{--                    }">--}}

                <div class="divide-y divide-dashed dark:divide-gray-700">
                    @foreach (\App\Models\Shop\Comment::query()->limit(10)->get() as $row)
                        <div class="px-2 py-3 filament-tables-text-column">

                            <a class="text-sm truncate" href="{{$row->title }}" target="_blank">
                                [{{$row->created_at }}] {{$row->title}}
{{--                                TODO блок для даты и мельче шрифт--}}
                            </a>
                        </div>
                    @endforeach
                </div>
{{--            </div>--}}
        </x-filament::card>
{{--    </x-filament::widget>--}}
{{--@endforeach--}}
