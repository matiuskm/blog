<x-app-layout meta-title="About Me - Code Journey" meta-description="I am a Developer with 15+ years of experience.">

    <!-- Post Section -->
    <section class="w-full flex flex-col items-center px-3">

        <article class="flex w-full flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('storage/' . $widget->image) }}" class="object-cover w-full">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <div>
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $widget->title }}</h1>
                    <div>
                        {!! $widget->content !!}
                    </div>
                </div>
            </div>
        </article>

    </section>
</x-app-layout>
