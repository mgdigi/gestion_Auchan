    <div class="glass-effect rounded-3xl shadow-2xl p-8 w-full max-w-md hover-lift animate-fadeIn">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-light text-gray-800 mb-2">Connexion</h1>
            <p class="text-gray-600 text-lg">Accédez à votre compte</p>
        </div>

        <form id="loginForm" class="space-y-6" action="login" method="post">
            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2 uppercase tracking-wide">
                    Email
                </label>
                <input 
                    type="text" 
                    id="email" 
                    name="email" 
                    placeholder="votre@email.com"
                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:bg-white transition-all duration-300 text-gray-800 placeholder-gray-400"
                >
                <?php if(!empty($errors['email'])): ?>
                   <p class="text-sm color-red-500 text-black"><?= $errors['email']; ?> <p>
                <?php endif; ?>
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2 uppercase tracking-wide">
                    Mot de passe
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••"
                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:bg-white transition-all duration-300 text-gray-800 placeholder-gray-400"
                >
                <?php if(empty($errors['password'])): ?>
                   <p><?=  $errors['email']; ?><p>
                <?php endif; ?>
            </div>

            <button 
                type="submit" 
                class="w-full py-3 px-6 bg-gray-700 text-white font-semibold rounded-xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 uppercase tracking-widest"
            >
                Se connecter
            </button>
        </form>

        <div class="text-center mt-6">
            <a 
                href="#" 
                onclick="showForgotPassword()"
                class="text-indigo-600 hover:text-indigo-800 text-sm font-medium hover:underline transition-colors duration-300"
            >
                Mot de passe oublié ?
            </a>
        </div>

        <div class="flex items-center my-8">
            <div class="flex-1 border-t border-gray-300"></div>
            <span class="px-4 text-gray-500 text-sm">ou</span>
            <div class="flex-1 border-t border-gray-300"></div>
        </div>

        

        <div class="text-center mt-8 pt-6 border-t border-gray-200">
            <p class="text-gray-600">
                Pas encore de compte ? 
                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium hover:underline transition-colors duration-300">
                    Créer un compte
                </a>
            </p>
        </div>
    </div>

    
