<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                        <defs>
                            <filter id="svgSpinnersGooeyBalls10">
                                <feGaussianBlur in="SourceGraphic" result="y" stdDeviation="1.5" />
                                <feColorMatrix in="y" result="z" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 18 -7" />
                                <feBlend in="SourceGraphic" in2="z" />
                            </filter>
                        </defs>
                        <g fill="white" filter="url(#svgSpinnersGooeyBalls10)">
                            <circle cx="4" cy="12" r="3">
                                <animate attributeName="cx" calcMode="spline" dur="0.75s" keySplines=".56,.52,.17,.98;.56,.52,.17,.98" repeatCount="indefinite" values="4;9;4" />
                                <animate attributeName="r" calcMode="spline" dur="0.75s" keySplines=".56,.52,.17,.98;.56,.52,.17,.98" repeatCount="indefinite" values="3;8;3" />
                            </circle>
                            <circle cx="15" cy="12" r="8">
                                <animate attributeName="cx" calcMode="spline" dur="0.75s" keySplines=".56,.52,.17,.98;.56,.52,.17,.98" repeatCount="indefinite" values="15;20;15" />
                                <animate attributeName="r" calcMode="spline" dur="0.75s" keySplines=".56,.52,.17,.98;.56,.52,.17,.98" repeatCount="indefinite" values="8;3;8" />
                            </circle>
                        </g>
                    </svg>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @foreach ($links as $link)
                        @php
                        [$uri, $text, $active] = $link;
                        @endphp
                        <a href="{{ $uri }}" class="rounded-md text-sm font-medium px-3 py-2 {{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            {{ $text }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            @if($attributes->has('active'))

            <a href="/incomes" {{($attributes->get('active')=='incomes')? $attributes->merge(['class'=>"rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"]) : $attributes->merge(['class'=> "rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"]) }}aria-current="page">My Incomes</a>

            <a href='/spending' {{($attributes->get('active')=='spending')? $attributes->merge(['class'=>"rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"]) : $attributes->merge(['class'=> "rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"]) }}aria-current="page">My Spendings</a>
            @endif
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base/5 font-medium text-white">Pablo Gonzalez</div>
                    <div class="text-sm font-medium text-gray-400">pgongar@g.educaand.es</div>
                </div>

            </div>

        </div>
    </div>
</nav>