<?php

it('can render', function () {
    $contents = $this->view('recto', [
        //
    ]);

    $contents->assertSee('');
});
