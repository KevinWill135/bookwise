<div class="mt-6 grid grid-cols-2 gap-2">
        <div class="border border-stone-700 rounded">
                <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
                <form class="p-4 space-y-4" method="post">
                        <div class="flex flex-col">
                                <label class="text-stone-400 ml-px mb-1">Email</label>
                                <input
                                        type="email"
                                        name="email"
                                        required
                                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                                        placeholder="Pesquisar..." />
                        </div>
                        <div class="flex flex-col">
                                <label class="text-stone-400 ml-px mb-1">Senha</label>
                                <input
                                        type="password"
                                        name="password"
                                        required
                                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                                        placeholder="Pesquisar..." />
                        </div>

                        <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">Logar</button>

                </form>
        </div>
        <div class="border border-stone-700 rounded">
                <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
                <form class="p-4 space-y-4" method="post" action="/registrar">

                        <?php if (strlen($mensagem) > 0): ?>
                                <div class="border-green-800 border-2 rounded-md bg-green-950 text-sm focus:outline-none px-2 py-1">
                                        <?= $mensagem ?>
                                </div>
                        <?php endif ?>

                        <div class="flex flex-col">
                                <label class="text-stone-400 ml-px mb-1">Nome</label>
                                <input
                                        type="nome"
                                        name="nome"
                                        required
                                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                                        placeholder="Pesquisar..." />
                        </div>
                        <div class="flex flex-col">
                                <label class="text-stone-400 ml-px mb-1">Email</label>
                                <input
                                        type="email"
                                        name="email"
                                        required
                                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                                        placeholder="Pesquisar..." />
                        </div>
                        <div class="flex flex-col">
                                <label class="text-stone-400 ml-px mb-1">Confirme seu email</label>
                                <input
                                        type="email"
                                        name="email_confirm"
                                        required
                                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                                        placeholder="Pesquisar..." />
                        </div>
                        <div class="flex flex-col">
                                <label class="text-stone-400 ml-px mb-1">Senha</label>
                                <input
                                        type="password"
                                        name="password"
                                        required
                                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                                        placeholder="Pesquisar..." />
                        </div>

                        <button type="reset" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">Cancelar</button>
                        <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">Registrar</button>

                </form>
        </div>
</div>