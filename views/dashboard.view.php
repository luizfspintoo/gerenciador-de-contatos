<section class="h-full grid grid-cols-[200px_1fr] text-white">
    <aside class="w-42 flex flex-col justify-between items-center py-12">
        <div>
            <img class="w-10" src="/assets/images/logo.svg" alt="Logo tipo aplicação">
        </div>
        <div>
            <ul class="menu space-y-3">
                <li class="bg-zinc-800 rounded-box">
                    <a href="/dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </a>
                </li>
                <li class="bg-zinc-800 rounded-box">
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </a>
                </li>
                <li class="bg-zinc-800 rounded-box">
                    <a href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>

                    </a>
                </li>
            </ul>
        </div>
        <div class="text-sm">
            <p class="text-zinc-400 font-semibold">Logado como:</p>
            <p>
                <?= auth()->email; ?>
            </p>
        </div>
    </aside>
    <main class="bg-zinc-800 m-8 rounded-lg py-4 px-8">
        <section class="flex justify-between itemns-cente">
            <h2 class="text-3xl font-bold">Lista de contatos</h2>
            <div class="flex gap-1">
                <form action="/dashboard" method="GET">
                    <input type="text" name="search" id="search" class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" placeholder="Pesquisar">
                </form>
                <button onclick="my_modal_3.showModal()" class="cursor-pointer bg-[#303030] p-2 rounded-xl text-white font-semibold">
                    Adicionar contato
                </button>
                <!-- Mostra e esconde botão -->
                <?php if (session()->get("show")) : ?>
                    <a href="/hide" class="cursor-pointer bg-[#303030] p-2 px-4 rounded-xl text-white font-semibold">
                        <img class="w-5" src="/assets/images/icon-close.svg" alt="Icone de cadeado fechado">
                    </a>
                <?php else: ?>
                    <button type="button" class="cursor-pointer bg-[#303030] p-2 px-4 rounded-xl text-white font-semibold" onclick="my_modal_4.showModal()">
                        <img class="w-5" src="/assets/images/icon-open.svg" alt="Icone de cadeado aberto">
                    </button>
                <?php endif; ?>

            </div>
        </section>
        <section class="h-full mt-8 flex">
            <aside class="h-100 w-16 rounded-lg bg-[#C4F120] p-4 overflow-y-auto scroll-thin">
                <?php
                $letras = range('A', 'Z');
                foreach ($letras as $letra) {
                    echo '<div class="text-center mb-2 font-bold text-zinc-700">' . $letra . '</div>';
                }
                ?>
            </aside>

            <div class="w-full h-100 flex-1 bg-zinc-800 p-6 overflow-y-auto text-white">
                <table class="w-full table-auto">
                    <thead class="text-left">
                        <tr>
                            <th class="py-3 px-4">Nome</th>
                            <th class="py-3 px-4">Telefone</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact) : ?>
                            <tr class="border-b border-zinc-700">
                                <td class="py-3 px-4 flex items-center gap-4">
                                    <img class="w-12 h-12 rounded-full" src="<?= $contact->image; ?>" alt="Avatar">
                                    <div>
                                        <h4 class="font-semibold"><?= $contact->showContent("name") ? $contact->showContent("name") :  $contact->name; ?></h4>

                                        <!-- <p class="text-sm text-zinc-300">Colega</p> -->
                                    </div>
                                </td>
                                <td class="py-3 px-4"><?= $contact->showContent("phone") ? $contact->showContent("phone") :  $contact->phone; ?></td>
                                <td class="py-3 px-4"><?= $contact->showContent("email") ? $contact->showContent("email") :  $contact->email; ?></td>
                                <td class="py-3 px-4 space-x-1">
                                    <a href="/contact/edit?id=<?= $contact->id; ?>" class="cursor-pointer bg-transparent border border-zinc-700 px-3 py-1 rounded text-sm hover:bg-zinc-600">
                                        Editar
                                    </a>
                                    <button form="formDelete" type="submit" class="cursor-pointer bg-transparent border border-zinc-700 px-3 py-1 rounded text-sm hover:bg-zinc-600">Deletar</button>
                                    <form id="formDelete" action="/contact/delete" method="POST">
                                        <input type="hidden" name="__method" value="DELETE">
                                        <input type="hidden" name="id" value="<?= $contact->id; ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- You can open the modal using ID.showModal() method -->
        <dialog id="my_modal_3" class="modal">
            <div class="modal-box bg-black w-sm">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold pb-3 border-b border-zinc-800">Adicionar contato</h3>

                <form action="/contact/create" class="space-y-4" method="POST">
                    <div class="mb-10">
                        <?php
                        $validations = flash()->get('validations');
                        ?>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="name">Nome</label>
                        <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="text" name="name" id="name" placeholder="Nome do contato" value="<?= old("name"); ?>">
                        <span class="text-error">
                            <?= $validations['name'][0] ?? ''; ?>
                        </span>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="email">E-mail</label>
                        <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="email" name="email" id="email" placeholder="E-mail do contato" value="<?= old("email"); ?>">
                        <span class="text-error">
                            <?= $validations['email'][0] ?? ''; ?>
                        </span>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="phone">Telefone</label>
                        <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="phone" name="phone" id="phone" placeholder="Telefone do contato" value="<?= old("phone"); ?>">
                        <span class="text-error">
                            <?= $validations['phone'][0] ?? ''; ?>
                        </span>
                    </div>
                    <div class="flex justify-end gap-1">
                        <button class="cursor-pointer bg-[#C4F120] p-2 rounded-xl text-black font-semibold" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </dialog>

        <!-- Formulário principal de senha -->
        <dialog id="my_modal_4" class="modal">
            <div class="modal-box bg-black w-sm">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold pb-3 border-b border-zinc-800">Visualizar informações</h3>
                <form action="/dashboard" class="space-y-4 mt-4" method="POST">
                    <?php
                        $validationsShow = flash()->get('validations_show');
                    ?>
                    <div>
                        <label class="block mb-1 font-semibold" for="password">Senha</label>
                        <input class="w-full bg-transparent p-2 border border-zinc-700 rounded-lg" type="password" name="password" id="password" placeholder="Informe sua senha">
                        <span class="text-error">
                            <?= $validationsShow['password'][0] ?? ''; ?>
                        </span>
                    </div>
                    <div class="flex justify-end gap-1">
                        <button class="cursor-pointer bg-[#C4F120] p-2 rounded-xl text-black font-semibold" type="submit">Ver informações</button>
                    </div>
                </form>
            </div>
        </dialog>

    </main>
</section>

<script>
    var validations = <?php echo json_encode($validations); ?>;
    var validationsShow = <?php echo json_encode($validationsShow); ?>;

    if (validations && Object.keys(validations).length > 0) {
        const modal = document.getElementById('my_modal_3');
        modal.showModal();
    }

    if (validationsShow && Object.keys(validationsShow).length > 0) {
        const modal4 = document.getElementById('my_modal_4');
        modal4.showModal();
    }
</script>