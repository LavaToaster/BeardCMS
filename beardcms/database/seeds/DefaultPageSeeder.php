<?php

class DefaultPageSeeder extends Seeder {
    public function run() {
        $data = [
            'title' => 'Home',
            'slug'   => 'index.html',
            'content' => '<div id="full-page">
    <div class="hero-unit">
        <h1>Hello World!</h1>
        <p>Welcome to the default BeardCMS page.</p>
    </div>
</div>'
        ];

        $page = new Page;
        $page->fill($data);
        $page->save();
    }
}