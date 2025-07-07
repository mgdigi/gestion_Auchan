 <header class="bg-gray-800 border-b border-gray-700">
        <div class="px-6 py-4">
            <nav class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-green-500 rounded"></div>
                        <span class="text-lg font-medium">Ges Auchan</span>
                    </div>
                    <div class="hidden md:flex space-x-6">
                        <a href="lister" class="text-white font-medium">Commandes</a>
                    </div>
                </div>

                 <p class="text-x text-green-500">Bienvenue <?= $_SESSION['user']['nom']?> </p> 

                <p class="text-xl text-white"><?= $_SESSION['user']['typePerson'] ?></p>

                <div class="flex items-center space-x-4">
                    <a href="logout" class="text-white font-medium">
                    <button class="p-2 text-gray-400 hover:text-white transition-colors">
                        Deconnection
                    </button>
                    </a>


                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-white">V</span>
                    </div>
                </div>
            </nav>
        </div>
 </header>
