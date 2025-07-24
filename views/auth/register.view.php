<section class="grid grid-cols-2">
    <div>
        <img class="w-full h-full object-cover" src="../assets/images/bg-auth.png" alt="Imagem de fundo para tela de registro">
    </div>
    <div class="text-white">
        <div class="text-sm text-right mt-5 mr-40">
            Já tem uma conta? <a class="text-[#C4F120] font-semibold" href="/login">Acessar conta</a>
        </div>
        <div class="min-h-screen flex items-center justify-center">
            <form action="/register" class="w-sm space-y-4" method="POST">
                <div class="mb-10">
                     <?php
                        $validations = flash()->get('validations');
                    ?> 
                    <h1 class="text-2xl font-bold">Criar Conta</h1>
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="name">Nome</label>
                    <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="text" name="name" id="name" placeholder="Como você se chama?" value="<?= old("name"); ?>">
                    <span class="text-error">
                        <?= $validations['name'][0] ?? ''; ?>
                    </span>
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="email">E-mail</label>
                    <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="email" name="email" id="email" placeholder="Seu e-mail aqui" value="<?= old("email"); ?>">
                    <span class="text-error">
                        <?= $validations['email'][0] ?? ''; ?>
                    </span>
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="password">Senha</label>
                    <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="password" name="password" id="password" placeholder="Escolha uma senha segura">
                    <span class="text-error">
                        <?= $validations['password'][0] ?? ''; ?>
                    </span>
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="password">Confirme a senha</label>
                    <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="password" name="password_confirmed" id="password_confirmed" placeholder="Repita sua senha para confirmar">
                </div>

                <div class="flex justify-end">
                    <button class="bg-[#C4F120] p-2 rounded-xl text-black font-semibold" type="submit">Criar conta</button>
                </div>
            </form>
        </div>
    </div>
</section>