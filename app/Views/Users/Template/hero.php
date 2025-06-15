<style>
    .hero {
        background-image: url('<?= base_url('/upload/dev/hero/' . $hero['content']); ?>');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 200px 20px;
        text-align: center;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
    }
</style>

<section class="hero" id="hero">
    <h1><?= $hero['text']; ?></h1>
    <p><?= $hero['keterangan']; ?></p>
</section>