<div class="bg-gradient-to-r from-purple-500 to-pink-500 p-8 shadow-lg rounded-lg text-white">
    <h2 class="text-4xl font-bold mb-6">{{ $company->name }}</h2>

    <div class="flex flex-col">

        <div class="flex space-x-4 mb-2">
            <div class="flex items-center mb-4 md:mb-0">
                <p class="font-bold text-lg">Symbol:</p>
                <p class="ml-2">{{ $company->symbol }}</p>
            </div>

            <div class="flex items-center mb-4 md:mb-0">
                <p class="font-bold text-lg">Industry:</p>
                <p class="ml-2">{{ $company->industry }}</p>
            </div>

            <div class="flex items-center mb-4 md:mb-0">
                <p class="font-bold text-lg">Address:</p>
                <p class="ml-2">{{ $company->address }}</p>
            </div>
        </div>

        <div class="bg-blue-500 rounded-lg p-4">
            <div class="flex">
                <x-stocks class="block h-9 w-auto fill-current text-gray-800" />
                <h3 class="text-2xl pb-4 pl-2">Stock Info</h3>
            </div>
            @if($stockValue)
                <div class="flex space-x-4">
                    <div class="flex items-end">
                        <p class="font-bold text-lg">Closest Stock Price:</p>
                        <p class="ml-2">${{ $stockValue['c'] }}</p>
                    </div>      
                    <div class="flex items-end">
                        <p class="font-bold text-lg">Highest Stock Price:</p>
                        <p class="ml-2">${{ $stockValue['h'] }}</p>
                    </div>            
                    <div class="flex items-end">
                        <p class="font-bold text-lg">Trading Volume:</p>
                        <p class="ml-2">${{ $stockValue['v'] }}</p>
                    </div>           
                    <div class="flex items-end">
                        <p class="font-bold text-lg">Weighted Trading Volume:</p>
                        <p class="ml-2">${{ $stockValue['vw'] }}</p>
                    </div>
                </div>
            @else
                <p class="font-bold text-lg text-center">Sorry, data is not available at the moment...</p>
            @endif
    </div>

    </div>

    <div class="mt-8">
        <p class="text-lg">{{ $company->description }}</p>
    </div>
</div>

