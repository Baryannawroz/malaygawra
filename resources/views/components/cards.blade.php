<div class="bg-gray-100 min-h-screen w-2/3 mx-auto mt-5 justify-center p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        <!-- Card 1 -->
        <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-lg shadow-lg p-6 ">
            <div class="flex items-center justify-between">
                <div>
                    <i class="bi bi-person text-5xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mt-4 font-vazirmatn"> ژمارەی خوێندکار </h2>
                    <p class="mt-2 text-2xl  text-gray-200">{{ $students }}</p>
                </div>
            </div>
        </div>

        
        <div class="bg-gradient-to-r from-pink-400 to-pink-600 text-white rounded-lg shadow-lg p-6">

          <div class="flex items-center justify-between">
            <div>
                <i class="bi bi-person text-5xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold mt-4 font-vazirmatn"> ژمارەی مامۆستاکان </h2>
                <p class="mt-2 text-2xl  text-gray-200">{{ $teachers }}</p>
            </div>
        </div>

        </div>

        <!-- Card 3 -->
        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-lg shadow-lg p-6">

            <div class="flex items-center justify-between">
                <div>
                    <i class="bi bi-book text-5xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mt-4 font-vazirmatn"> ژمارەی دەرسەکان </h2>
                    <p class="mt-2 text-2xl  text-gray-200">{{ $lessons }}</p>
                </div>
            </div>
        </div>


    </div>
</div>
