<x-app-layout>
    <div class="container mx-auto mt-10" dir="rtl" style="margin: 0 2%">
        <h1 class="text-3xl font-bold mb-5">لیستی کارگێڕەکان</h1>
        <div class="flex justify-center">


            <x-add-button :route="route('administrator.create')" :name="'غیاباتی ئەمڕۆ '">
            </x-add-button>
            <x-add-button :route="route('administrator.Schedules')" :name="'جەدوەلی حەفتانەی'">
            </x-add-button>
        </div>






    </div>
</x-app-layout>
