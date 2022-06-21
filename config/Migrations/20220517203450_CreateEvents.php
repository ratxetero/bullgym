<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEvents extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('events');

        $table->addColumn("title", "string", [
            "limit" => 120,
            "null" => false
        ]);

        $table->addColumn("start", "date", [
            "null" => false
        ]);

        $table->addColumn("end", "date", [
            "null" => false
        ]);

        $table->create();
    }
}