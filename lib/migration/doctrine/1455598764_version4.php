<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version4 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('image', 'is_default', 'boolean', '25', array(
             'notnull' => '1',
             'default' => 'false',
             ));
    }

    public function down()
    {
        $this->removeColumn('image', 'is_default');
    }
}
