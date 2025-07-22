<section class="grid grid-cols-2">
    <div>
        <img class="w-full h-full object-cover" src="../assets/images/bg-auth.png" alt="Imagem de fundo para tela de registro">
    </div>
    <div class="text-white">
        <div class="text-sm text-right mt-5 mr-40">
            Não tem uma conta? <a class="text-[#C4F120] font-semibold" href="/register">Criar conta</a>
        </div>
        <div class="min-h-screen flex items-center justify-center">
            <form action="/login" class="w-sm space-y-4" method="POST">
                <div class="mb-10">
                    <?php if ($message = flash()->get("message")) : ?>
                        <div role="alert" class="alert alert-success mb-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span><?= $message; ?></span>
                        </div>
                    <?php endif; ?>
                     <?php
                        $validations = flash()->get('validations');
                    ?> 
                    <h1 class="text-2xl font-bold">Acessar Conta</h1>
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="email">E-mail</label>
                    <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="email" name="email" id="email" placeholder="Digite o seu e-mail" value="<?= old("email"); ?>">
                    <span class="text-error">
                        <?= $validations['email'][0] ?? ''; ?>
                    </span>
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="password">Senha</label>
                    <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="password" name="password" id="password" placeholder="Insira a sua senha">
                    <span class="text-error">
                        <?= $validations['password'][0] ?? ''; ?>
                    </span>
                </div>
                <div class="flex justify-end">
                    <button class="bg-[#C4F120] p-2 rounded-xl text-black font-semibold" type="submit">Acessar conta</button>
                </div>
            </form>
        </div>
    </div>
</section>