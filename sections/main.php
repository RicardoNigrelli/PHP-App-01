<main>
    <section>
        <h2>La próxima película de Marvel</h2>

        <img src="<?= $data["poster_url"];?>" width="200" alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px"/>
    </section>

    <hgroup>
        <h3><?= $data["title"] ;?> <?= $until_message ?> </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ;?></p>
    </hgroup>
</main>
