<?php

namespace Sprint\Migration;

class CombinedMigration extends Version
{
    protected $description = "Combined migration";
    protected $moduleVersion = "4.2.4";

    public function up()
    {
        $infoBlockMigration = new InfoBlock20230827181521();
        $infoBlockMigration->up();

        $itemMigration = new ITEM20230827215032();
        $itemMigration->up();
    }

    public function down()
    {
        $itemMigration = new ITEM20230827215032();
        $itemMigration->down();

        $infoBlockMigration = new InfoBlock20230827181521();
        $infoBlockMigration->down();
    }
}
