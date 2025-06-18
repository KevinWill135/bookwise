<div class="p-2 rounded bg-stone-900 border-stone-800 border-2">
        <div class="flex gap-2">
                <div class="w-1/3">

                        <img src="<?= $livro->imagem ?>" class="w-50 rounded" alt="Livro <?= $livro->titulo ?>">
                </div>
                <div class="flex flex-col gap-1">
                        <a href="livro?id=<?= $livro->id ?>" class="font-semibold hover:underline"><?= $livro->titulo ?></a>
                        <div class="text-xs italic"><?= $livro->autor ?></div>
                        <div class="text-xs italic"><?= str_repeat("⭐️", $livro->notaAvaliacao) ?>(<?= $livro->countAvaliacoes ?> Avaliações)</div>
                </div>
        </div>
        <div class="text-sm mt-2">
                <?= $livro->descricao ?>
        </div>
</div>